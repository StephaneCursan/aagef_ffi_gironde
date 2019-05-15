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
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthLocation", type="string", length=50, nullable=true)
     */
    private $birthLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="homeLocation", type="string", length=50, nullable=true)
     */
    private $homeLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=50, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="deathDate", type="date")
     */
    private $deathDate;

    /**
     * @var string
     *
     * @ORM\Column(name="deathLocation", type="string", length=50, nullable=true)
     */
    private $deathLocation;

    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="person")
     */
    private $location;

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
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getBirthLocation()
    {
        return $this->birthLocation;
    }

    /**
     * @param string $birthLocation
     */
    public function setBirthLocation($birthLocation)
    {
        $this->birthLocation = $birthLocation;
    }

    /**
     * @return string
     */
    public function getHomeLocation()
    {
        return $this->homeLocation;
    }

    /**
     * @param string $homeLocation
     */
    public function setHomeLocation($homeLocation)
    {
        $this->homeLocation = $homeLocation;
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
     * @return string
     */
    public function getDeathDate()
    {
        return $this->deathDate;
    }

    /**
     * @param string $deathDate
     */
    public function setDeathDate($deathDate)
    {
        $this->deathDate = $deathDate;
    }

    /**
     * @return string
     */
    public function getDeathLocation()
    {
        return $this->deathLocation;
    }

    /**
     * @param string $deathLocation
     */
    public function setDeathLocation($deathLocation)
    {
        $this->deathLocation = $deathLocation;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}