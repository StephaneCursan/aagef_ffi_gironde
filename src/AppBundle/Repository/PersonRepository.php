<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-18
 * Time: 13:19
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PersonRepository
 * @package AppBundle\Repository
 */
class PersonRepository extends EntityRepository
{
    public function searchByLastName($lastName = false)
    {
        $searchLastName = ($lastName != false) ? $lastName['lastName'] : '';

        $qb = $this -> createQueryBuilder('p');

        $query = $qb -> select('p')
                     -> where('p.lastName LIKE :lastName')
                     -> setParameter('lastName', '%'.$searchLastName.'%')
                     -> getQuery();

        $result = $query -> getArrayResult();

        return $result;
    }
}