<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 18:12
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User_type
 *
 * @ORM\Entity
 * @ORM\Table(name="user_type")
 */
class User_type
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;
}