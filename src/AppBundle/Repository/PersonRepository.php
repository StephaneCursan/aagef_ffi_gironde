<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-18
 * Time: 13:19
 */

namespace AppBundle\Repository;

/**
 * Class PersonRepository
 * @package AppBundle\Repository
 */
class PersonRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByLastName()
    {
        $lastName = '';

        $qb = $this -> createQueryBuilder('p');
        $query = $qb -> select('p.lastName')
                     -> where('p.lastName LIKE :lastName')
                     -> setParameter('lastName', '%'.$lastName.'%')
                     -> getQuery();
        $result = $query -> getArrayResult();

        return $result;
    }
}