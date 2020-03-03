<?php

namespace Esc\Repository;

use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

interface CriteriaSearchableRepository
{
    /**
     * @param AttributeBag $parameters
     * @return mixed
     */
    public function findByCriteria(AttributeBag $parameters);

    /**
     * @param array $filters
     * @return int
     */
    public function countByCriteria(array $filters): int;
}
