<?php


namespace Esc\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use RuntimeException;

abstract class IdentityRepository extends ServiceEntityRepository implements IdentitySearchableRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findOneById(int $id)
    {
        return $this->findOneBy(['id' => $id]);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws RuntimeException
     */
    public function getOneById(int $id)
    {
        $value = $this->findOneById($id);
        if ($value === null) {
            throw new RuntimeException('ID '. $id . 'does not exist');
        }
        return $value;
    }
}