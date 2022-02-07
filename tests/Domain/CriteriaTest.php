<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Tests\Domain;

use JacoBaldrich\Criteria\Domain\Criteria;
use JacoBaldrich\Criteria\Domain\FilterGroup;
use JacoBaldrich\Criteria\Tests\Stubs\ProductIdFilter;
use PHPUnit\Framework\TestCase;

final class CriteriaTest extends TestCase
{
    /** @test */
    public function itShouldReturnItsFilterGroup(): void
    {
        $filter   = ProductIdFilter::equal('1234');
        $criteria = Criteria::matching($filter);

        self::assertEquals(FilterGroup::withAny($filter), $criteria->filterGroup());
    }
}
