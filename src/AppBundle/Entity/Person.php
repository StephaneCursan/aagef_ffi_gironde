<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 20:23
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Entity
 * @ORM\Table(name="person")
 */
class Person
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
     * @ORM\Column(name="lastName", type="string", length=50, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=1)
     */
    private $sex;

    /**
     * @var int
     *
     * @ORM\Column(name="birthDay", type="integer", length=2, nullable=true)
     */
    private $birthDay;

    /**
     * @var int
     *
     * @ORM\Column(name="birthMonth", type="integer", length=2, nullable=true)
     */
    private $birthMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="birthYear", type="integer", length=4, nullable=true)
     */
    private $birthYear;

    /**
     * @var string
     *
     * @ORM\Column(name="birthPlace", type="string", length=50, nullable=true)
     */
    private $birthPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="homePlace", type="string", length=50, nullable=true)
     */
    private $homePlace;

    /**
     * @var string
     *
     * @ORM\Column(name="unionType", type="string", length=10, nullable=true)
     */
    private $unionType;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=50, nullable=true)
     */
    private $job;

    /**
     * @var int
     *
     * @ORM\Column(name="deathDay", type="integer", length=2, nullable=true)
     */
    private $deathDay;

    /**
     * @var int
     *
     * @ORM\Column(name="deathMonth", type="integer", length=2, nullable=true)
     */
    private $deathMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="deathYear", type="integer", length=4, nullable=true)
     */
    private $deathYear;

    /**
     * @var string
     *
     * @ORM\Column(name="deathPlace", type="string", length=50, nullable=true)
     */
    private $deathPlace;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
}