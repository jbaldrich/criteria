<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Implementation\MySql;

use JacoBaldrich\Criteria\Domain\Behaviour;
use JacoBaldrich\Criteria\Domain\Filter;
use JacoBaldrich\Criteria\Domain\FilterGroup;

final class SqlWhereClauseBuilder
{
    public function __invoke(FilterGroup $filterGroup): string
    {
        return self::whereClause($filterGroup);
    }

    private static function whereClause(FilterGroup $filterGroup): string
    {
        return array_reduce(
            $filterGroup->filters(),
            static fn(string $whereClause, $filter) => $whereClause .
                (self::isOpeningBracket($whereClause) ? '' : self::logicalOperator($filterGroup)) .
                ($filter instanceof FilterGroup
                    ? self::whereClause($filter)
                    : self::condition($filter)),
            '('
        ) . ')';
    }

    private static function isOpeningBracket(string $whereClause): bool
    {
        return '(' === substr($whereClause, -1);
    }

    private static function condition(Filter $filter): string
    {
        return sprintf(
            '%s %s %s',
            $filter->name(),
            $filter->operator()->value(),
            $filter->value(),
        );
    }

    private static function logicalOperator(FilterGroup $filterGroup): string
    {
        return $filterGroup->behavesAs(Behaviour::all()) ? ' AND ' : ' OR ';
    }
}
