<?php
declare(strict_types=1);

namespace packages\Domain\Domain\Common;

use BadMethodCallException;
use InvalidArgumentException;

trait EnumTrait
{
    private $key;

    private $value;

    /** @return array */
    abstract static function Enum();

    /**
     * EnumTrait constructor.
     *
     * @param mixed $key
     */
    final public function __construct($key)
    {
        if (!self::isValidateValue($key)) {
            throw new InvalidArgumentException('class:' . __CLASS__ . " key:{$key}");
        }

        $this->key = $key;
        $this->value = self::Enum()[$key];
    }

    final static public function of($key): self
    {
        return new self($key);
    }

    final public static function isValidateValue($key): bool
    {
        return self::existKeyStrictly($key);
    }

    final public static function existKeyStrictly($key): bool
    {
        $keys = array_keys(self::Enum());

        return in_array($key, $keys, true);
    }

    public function key()
    {
        return $this->key;
    }

    public function value()
    {
        return $this->value;
    }
}
