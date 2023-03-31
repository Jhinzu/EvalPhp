<?php

namespace App\Repository;

use App\Entity\Annonces;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Annonces>
 *
 * @method Annonces|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonces|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonces[]    findAll()
 * @method Annonces[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoncesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonces::class);
    }

    public function save(Annonces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Annonces $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //teste
    public function search(array $criteria)
    {
        $qb = $this->createQueryBuilder('a');
    
        if (isset($criteria['title']) && !empty($criteria['title'])) {
            $qb->andWhere('a.title LIKE :title')
               ->setParameter('title', '%'.$criteria['title'].'%');
        } else {
            $qb->andWhere('1=1'); // Ajouter cette ligne pour afficher tous les résultats si le champ "title" est vide
        }
    
        if (isset($criteria['type']) && !empty($criteria['type'])) {
            $qb->andWhere('a.type = :type')
               ->setParameter('type', $criteria['type']);
        }
    
        if (isset($criteria['department']) && !empty($criteria['department'])) {
            $qb->andWhere('a.department = :department')
               ->setParameter('department', $criteria['department']);
        }
    
        return $qb->getQuery()->getResult();
    }
    
}
