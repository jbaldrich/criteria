<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Domain;

final class Criteria
{
    private FilterGroup $filterGroup;

    private function __construct(FilterGroup $filterGroup)
    {
        $this->filterGroup = $filterGroup;
    }

    public static function matching(Filter $filter): Criteria
    {
        return new self(FilterGroup::withAny($filter));
    }

    public static function matchingAny(Filter ...$filters): Criteria
    {
        return new self(FilterGroup::withAny(...$filters));
    }

    public static function matchingAll(Filter ...$filters): Criteria
    {
        return new self(FilterGroup::withAll(...$filters));
    }

    public static function matchingAnyFilterGroup(FilterGroup ...$filterGroups): Criteria
    {
        return new self(FilterGroup::withAnyFilterGroups(...$filterGroups));
    }

    public static function matchingAllFilterGroup(FilterGroup ...$filterGroups): Criteria
    {
        return new self(FilterGroup::withAllFilterGroups(...$filterGroups));
    }

    public function filterGroup(): FilterGroup
    {
        return $this->filterGroup;
    }
}
