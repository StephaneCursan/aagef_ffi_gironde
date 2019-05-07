<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 20:23
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="birthDay", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $birthDay;

    /**
     * @var int
     *
     * @ORM\Column(name="birthMonth", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $birthMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="birthYear", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 4,
     *     max = 4
     * )
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
     * @ORM\Column(name="deathDay", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $deathDay;

    /**
     * @var int
     *
     * @ORM\Column(name="deathMonth", type="smallint", length=2, nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $deathMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="deathYear", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 4,
     *     max = 4
     * )
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

    /**
     * @ORM\ManyToOne(targetEntity="Place", inversedBy="person")
     */
    private $place;

    /**
     * @ORM\OneToMany(targetEntity="Confine", mappedBy="person")
     */
    private $confine;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return int
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param int $birthDay
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
    }

    /**
     * @return int
     */
    public function getBirthMonth()
    {
        return $this->birthMonth;
    }

    /**
     * @param int $birthMonth
     */
    public function setBirthMonth($birthMonth)
    {
        $this->birthMonth = $birthMonth;
    }

    /**
     * @return int
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * @param int $birthYear
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;
    }

    /**
     * @return string
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return string
     */
    public function getHomePlace()
    {
        return $this->homePlace;
    }

    /**
     * @param string $homePlace
     */
    public function setHomePlace($homePlace)
    {
        $this->homePlace = $homePlace;
    }

    /**
     * @return string
     */
    public function getUnionType()
    {
        return $this->unionType;
    }

    /**
     * @param string $unionType
     */
    public function setUnionType($unionType)
    {
        $this->unionType = $unionType;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return int
     */
    public function getDeathDay()
    {
        return $this->deathDay;
    }

    /**
     * @param int $deathDay
     */
    public function setDeathDay($deathDay)
    {
        $this->deathDay = $deathDay;
    }

    /**
     * @return int
     */
    public function getDeathMonth()
    {
        return $this->deathMonth;
    }

    /**
     * @param int $deathMonth
     */
    public function setDeathMonth($deathMonth)
    {
        $this->deathMonth = $deathMonth;
    }

    /**
     * @return int
     */
    public function getDeathYear()
    {
        return $this->deathYear;
    }

    /**
     * @param int $deathYear
     */
    public function setDeathYear($deathYear)
    {
        $this->deathYear = $deathYear;
    }

    /**
     * @return string
     */
    public function getDeathPlace()
    {
        return $this->deathPlace;
    }

    /**
     * @param string $deathPlace
     */
    public function setDeathPlace($deathPlace)
    {
        $this->deathPlace = $deathPlace;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getConfine()
    {
        return $this->confine;
    }

    /**
     * @param mixed $confine
     */
    public function setConfine($confine)
    {
        $this->confine = $confine;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }
}