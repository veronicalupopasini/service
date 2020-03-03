<?php


namespace Esc\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use RuntimeException;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;

abstract class Repository extends ServiceEntityRepository implements IdentitySearchableRepository
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

    /**
     * @param AttributeBag $parameters
     * @return Criteria
     */
    protected function getPaginatedAndFilteredCriteria(AttributeBag $parameters): Criteria
    {
        return $this->getFiltersCriteria($parameters->get('filters'))
            ->orderBy($parameters->get('sortBy'))
            ->setMaxResults($parameters->get('limit'))
            ->setFirstResult($parameters->get('offset'));
    }

    /**
     * @param array $filters
     * @return Criteria
     */
    protected function getFiltersCriteria(array $filters): Criteria
    {
        return Criteria::create();
    }

    /**
     * @param array $filters
     * @return AttributeBag
     */
    protected function prepareFiltersCriteria(array $filters): AttributeBag
    {
        $filtersBag = new AttributeBag();
        $filtersBag->initialize($filters);

        return $filtersBag;
    }
}