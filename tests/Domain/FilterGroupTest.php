<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Tests\Domain;

use JacoBaldrich\Criteria\Domain\Behaviour;
use JacoBaldrich\Criteria\Domain\FilterGroup;
use JacoBaldrich\Criteria\Tests\Stubs\PriceFilter;
use PHPUnit\Framework\TestCase;

final class FilterGroupTest extends TestCase
{
    /** @test */
    public function itShouldReturnFilters(): void
    {
        $filters = [
            PriceFilter::equal(10),
            PriceFilter::lessThan(10),
        ];
        $filterGroup = FilterGroup::withAny(...$filters);

        self::assertTrue($filterGroup->hasFilters());
        self::assertTrue($filterGroup->behavesAs(Behaviour::any()));
        self::assertFalse($filterGroup->behavesAs(Behaviour::all()));
        self::assertEquals($filters, $filterGroup->filters());
    }
}
