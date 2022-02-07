<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Tests\Stubs;

use JacoBaldrich\Criteria\Domain\Filter;
use JacoBaldrich\Criteria\Domain\Operator;

final class PriceFilter implements Filter
{
    private float $price;
    private Operator $operator;

    private function __construct(float $price, Operator $operator)
    {
        $this->price    = $price;
        $this->operator = $operator;
    }

    public static function equal(float $price): PriceFilter
    {
        return new self($price, Operator::equal());
    }

    public static function lessThan(float $price): PriceFilter
    {
        return new self($price, Operator::lessThan());
    }

    public function name(): string
    {
        return 'price';
    }

    public function value(): string
    {
        return (string) $this->price;
    }

    public function operator(): Operator
    {
        return $this->operator;
    }
}
