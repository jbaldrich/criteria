<?php

namespace JacoBaldrich\Criteria\Domain;

interface Repository
{
    public function findBy(Criteria $criteria): array;
}
