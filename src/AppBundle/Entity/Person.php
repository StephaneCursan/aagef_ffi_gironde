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
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
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
     * @ORM\Column(name="birthDate", type="date", nullable=true)
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
     * @ORM\Column(name="deathDate", type="date", nullable=true)
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Person
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Person
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Person
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set birthLocation
     *
     * @param string $birthLocation
     *
     * @return Person
     */
    public function setBirthLocation($birthLocation)
    {
        $this->birthLocation = $birthLocation;

        return $this;
    }

    /**
     * Get birthLocation
     *
     * @return string
     */
    public function getBirthLocation()
    {
        return $this->birthLocation;
    }

    /**
     * Set deathDate
     *
     * @param \DateTime $deathDate
     *
     * @return Person
     */
    public function setDeathDate($deathDate)
    {
        $this->deathDate = $deathDate;

        return $this;
    }

    /**
     * Get deathDate
     *
     * @return \DateTime
     */
    public function getDeathDate()
    {
        return $this->deathDate;
    }

    /**
     * Set deathLocation
     *
     * @param string $deathLocation
     *
     * @return Person
     */
    public function setDeathLocation($deathLocation)
    {
        $this->deathLocation = $deathLocation;

        return $this;
    }

    /**
     * Get deathLocation
     *
     * @return string
     */
    public function getDeathLocation()
    {
        return $this->deathLocation;
    }

    /**
     * Set location
     *
     * @param \AppBundle\Entity\Location $location
     *
     * @return Person
     */
    public function setLocation(\AppBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \AppBundle\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }
}