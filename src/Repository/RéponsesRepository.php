<?php

namespace App\Repository;

use App\Entity\Réponses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Réponses>
 *
 * @method Réponses|null find($id, $lockMode = null, $lockVersion = null)
 * @method Réponses|null findOneBy(array $criteria, array $orderBy = null)
 * @method Réponses[]    findAll()
 * @method Réponses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RéponsesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Réponses::class);
    }

    public function save(Réponses $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Réponses $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
