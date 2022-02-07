<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Tests\Stubs;

use JacoBaldrich\Criteria\Domain\Filter;
use JacoBaldrich\Criteria\Domain\Operator;

final class ProductIdFilter implements Filter
{
    private string $productId;
    private Operator $operator;

    private function __construct(string $productId, Operator $operator)
    {
        $this->productId = $productId;
        $this->operator  = $operator;
    }

    public static function equal(string $productId): ProductIdFilter
    {
        return new self($productId, Operator::equal());
    }

    public function name(): string
    {
        return 'product_id';
    }

    public function value(): string
    {
        return $this->productId;
    }

    public function operator(): Operator
    {
        return $this->operator;
    }
}
