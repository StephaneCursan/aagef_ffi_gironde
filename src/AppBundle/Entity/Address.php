<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 21:13
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Entity
 * @ORM\Table(name="address")
 */
class Address
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
     * @ORM\Column(name="address1", type="string", length=50, nullable=true)
     */
    private $address1;

    /**
     * @var string
     *
     * @ORM\Column(name="address2", type="string", length=50, nullable=true)
     */
    private $address2;
}