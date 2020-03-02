<?php

namespace Esc\Repository;

use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Zend\Code\Reflection\Exception\RuntimeException;

interface IdentitySearchableRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function getOneById(int $id);
}
