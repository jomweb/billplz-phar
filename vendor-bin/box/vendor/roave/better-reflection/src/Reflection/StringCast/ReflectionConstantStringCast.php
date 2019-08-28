<?php

declare(strict_types=1);

namespace Roave\BetterReflection\Reflection\StringCast;

use Roave\BetterReflection\Reflection\ReflectionConstant;
use function gettype;
use function sprintf;

/**
 * Implementation of ReflectionConstant::__toString()
 *
 * @internal
 */
final class ReflectionConstantStringCast
{
    public static function toString(ReflectionConstant $constantReflection) : string
    {
        $value = $constantReflection->getValue();

        return sprintf(
            'Constant [ <%s> %s %s ] {%s %s }',
            self::sourceToString($constantReflection),
            gettype($value),
            $constantReflection->getName(),
            self::fileAndLinesToString($constantReflection),
            $value
        );
    }

    private static function sourceToString(ReflectionConstant $constantReflection) : string
    {
        if ($constantReflection->isUserDefined()) {
            return 'user';
        }

        return sprintf('internal:%s', $constantReflection->getExtensionName());
    }

    private static function fileAndLinesToString(ReflectionConstant $constantReflection) : string
    {
        if ($constantReflection->isInternal()) {
            return '';
        }

        return sprintf("\n  @@ %s %d - %d\n", $constantReflection->getFileName(), $constantReflection->getStartLine(), $constantReflection->getEndLine());
    }
}
