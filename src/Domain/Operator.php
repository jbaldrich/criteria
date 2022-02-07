<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Domain;

final class Operator
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function equal(): Operator
    {
        return new self('=');
    }

    public static function lessThan(): Operator
    {
        return new self('<');
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Operator $operator): bool
    {
        return $this->value === $operator->value();
    }
}
