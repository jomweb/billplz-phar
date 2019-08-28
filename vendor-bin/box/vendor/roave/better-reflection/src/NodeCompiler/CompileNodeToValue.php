<?php

declare(strict_types=1);

namespace Roave\BetterReflection\NodeCompiler;

use PhpParser\ConstExprEvaluator;
use PhpParser\Node;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflector\Exception\IdentifierNotFound;
use Roave\BetterReflection\Util\FileHelper;
use function constant;
use function defined;
use function dirname;
use function realpath;
use function reset;

class CompileNodeToValue
{
    /**
     * Compile an expression from a node into a value.
     *
     * @param Node\Stmt\Expression|Node\Expr $node Node has to be processed by the PhpParser\NodeVisitor\NameResolver
     *
     * @return mixed
     *
     * @throws Exception\UnableToCompileNode
     */
    public function __invoke(Node $node, CompilerContext $context)
    {
        if ($node instanceof Node\Stmt\Expression) {
            return $this($node->expr, $context);
        }

        $constExprEvaluator = new ConstExprEvaluator(function (Node\Expr $node) use ($context) {
            if ($node instanceof Node\Expr\ConstFetch) {
                return $this->compileConstFetch($node, $context);
            }

            if ($node instanceof Node\Expr\ClassConstFetch) {
                return $this->compileClassConstFetch($node, $context);
            }

            if ($node instanceof Node\Scalar\MagicConst\Dir) {
                return $this->compileDirConstant($context);
            }

            if ($node instanceof Node\Scalar\MagicConst\Class_) {
                return $this->compileClassConstant($context);
            }

            throw Exception\UnableToCompileNode::forUnRecognizedExpressionInContext($node, $context);
        });

        return $constExprEvaluator->evaluateDirectly($node);
    }

    /**
     * Compile constant expressions
     *
     * @return bool|mixed|null
     *
     * @throws Exception\UnableToCompileNode
     */
    private function compileConstFetch(Node\Expr\ConstFetch $constNode, CompilerContext $context)
    {
        $firstName = reset($constNode->name->parts);
        switch ($firstName) {
            case 'null':
                return null;
            case 'false':
                return false;
            case 'true':
                return true;
            default:
                if (! defined($firstName)) {
                    throw Exception\UnableToCompileNode::becauseOfNotFoundConstantReference($context, $constNode);
                }

                return constant($firstName);
        }
    }

    /**
     * Compile class constants
     *
     * @return string|int|float|bool|mixed[]|null
     *
     * @throws IdentifierNotFound
     * @throws Exception\UnableToCompileNode If a referenced constant could not be located on the expected referenced class.
     */
    private function compileClassConstFetch(Node\Expr\ClassConstFetch $node, CompilerContext $context)
    {
        /** @var Node\Identifier $node->name */
        $nodeName = $node->name->name;
        /** @var Node\Name $node->class */
        $className = $node->class->toString();

        if ($nodeName === 'class') {
            return $this->resolveClassNameForClassNameConstant($className, $context);
        }

        /** @var ReflectionClass|null $classInfo */
        $classInfo = null;

        if ($className === 'self' || $className === 'static') {
            $classInfo = $context->getSelf()->hasConstant($nodeName) ? $context->getSelf() : null;
        } elseif ($className === 'parent') {
            $classInfo = $context->getSelf()->getParentClass();
        }

        if ($classInfo === null) {
            /** @var ReflectionClass $classInfo */
            $classInfo = $context->getReflector()->reflect($className);
        }

        $reflectionConstant = $classInfo->getReflectionConstant($nodeName);

        if (! $reflectionConstant instanceof ReflectionClassConstant) {
            throw Exception\UnableToCompileNode::becauseOfNotFoundClassConstantReference($context, $classInfo, $node);
        }

        return $this->__invoke(
            $reflectionConstant->getAst()->consts[$reflectionConstant->getPositionInAst()]->value,
            new CompilerContext($context->getReflector(), $classInfo)
        );
    }

    /**
     * Compile a __DIR__ node
     */
    private function compileDirConstant(CompilerContext $context) : string
    {
        return FileHelper::normalizeWindowsPath(dirname(realpath($context->getFileName())));
    }

    /**
     * Compiles magic constant __CLASS__
     */
    private function compileClassConstant(CompilerContext $context) : string
    {
        return $context->hasSelf() ? $context->getSelf()->getName() : '';
    }

    private function resolveClassNameForClassNameConstant(string $className, CompilerContext $context) : string
    {
        if ($className === 'self' || $className === 'static') {
            return $context->getSelf()->getName();
        }

        if ($className === 'parent') {
            /** @var ReflectionClass $parentClass */
            $parentClass = $context->getSelf()->getParentClass();

            return $parentClass->getName();
        }

        return $className;
    }
}
