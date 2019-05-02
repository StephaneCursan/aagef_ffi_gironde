<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 21:12
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Entity
 * @ORM\Table(name="place")
 */
class Place
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
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="zipCode", type="integer", length=5, nullable=true)
     */
    private $zipCode;
}