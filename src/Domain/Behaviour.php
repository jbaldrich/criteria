<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Domain;

final class Behaviour
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function all(): Behaviour
    {
        return new self('all');
    }

    public static function any(): Behaviour
    {
        return new self('any');
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Behaviour $behaviour): bool
    {
        return $this->value === $behaviour->value();
    }
}
