<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    public function findLastEvents($number): array
      {
          $em = $this->getEntityManager();

          $query = $em->createQuery(
              'SELECT e
              FROM App\Entity\Event e
              ORDER BY e.id DESC'
          )->setMaxResults($number);

          // returns an array of Product objects
          return $query->execute();
      }
}
