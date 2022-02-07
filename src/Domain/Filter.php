<?php declare(strict_types=1);

namespace JacoBaldrich\Criteria\Domain;

interface Filter
{
    public function name(): string;
    public function value(): string;
    public function operator(): Operator;
}
