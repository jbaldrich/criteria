<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Tests\Implementation\MySql;

use JacoBaldrich\Criteria\Domain\Criteria;
use JacoBaldrich\Criteria\Domain\FilterGroup;
use JacoBaldrich\Criteria\Implementation\MySql\SqlWhereClauseBuilder;
use JacoBaldrich\Criteria\Tests\Stubs\PriceFilter;
use JacoBaldrich\Criteria\Tests\Stubs\ProductIdFilter;
use PHPUnit\Framework\TestCase;

final class SqlWhereClauseBuilderTest extends TestCase
{
    /** @test */
    public function itShouldBuildAWhereClause(): void
    {
        $filterGroup = FilterGroup::withAllFilterGroups(
            FilterGroup::withAnyFilterGroups(
                FilterGroup::withAny(
                    PriceFilter::equal(10),
                    PriceFilter::lessThan(10)
                ),
                FilterGroup::withAll(
                    PriceFilter::equal(12)
                )
            ),
            FilterGroup::withAll(ProductIdFilter::equal('1234'))
        );

        $expectedQuery = '(((price = 10 OR price < 10) OR (price = 12)) AND (product_id = 1234))';

        self::assertSame($expectedQuery, call_user_func(new SqlWhereClauseBuilder(), $filterGroup));
    }
}
