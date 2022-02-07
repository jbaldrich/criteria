<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Domain;

final class FilterGroup
{
    private Behaviour $behaviour;
    private array $filters = [];
    private array $filterGroups = [];

    private function __construct(Behaviour $behaviour)
    {
        $this->behaviour = $behaviour;
    }

    public static function withAny(Filter ...$filters): FilterGroup
    {
        return (new self(Behaviour::any()))->withFilters(...$filters);
    }

    public static function withAll(Filter ...$filters): FilterGroup
    {
        return (new self(Behaviour::all()))->withFilters(...$filters);
    }

    public static function withAnyFilterGroups(FilterGroup ...$filterGroups): FilterGroup
    {
        return (new self(Behaviour::any()))->withFilterGroups(...$filterGroups);
    }

    public static function withAllFilterGroups(FilterGroup ...$filterGroups): FilterGroup
    {
        return (new self(Behaviour::all()))->withFilterGroups(...$filterGroups);
    }

    public function filters(): array
    {
        return $this->hasFilters() ? $this->filters : $this->filterGroups;
    }

    public function hasFilters(): bool
    {
        return !empty($this->filters);
    }

    public function behavesAs(Behaviour $behaviour): bool
    {
        return $this->behaviour->equals($behaviour);
    }

    private function withFilters(Filter ...$filters): FilterGroup
    {
        $this->filters = $filters;

        return $this;
    }

    private function withFilterGroups(FilterGroup ...$filterGroups): FilterGroup
    {
        $this->filterGroups = $filterGroups;

        return $this;
    }
}
