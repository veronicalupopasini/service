<?php

namespace Esc\Repository;

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
