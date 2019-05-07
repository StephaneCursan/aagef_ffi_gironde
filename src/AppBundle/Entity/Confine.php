<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-03
 * Time: 16:09
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * Confine
 *
 * @ORM\Entity
 * @ORM\Table(name="confine",
     uniqueConstraints={
         @ORM\UniqueConstraint(name="person_place", columns={"person_id", "place_id"})
     }
   )
 */
class Confine
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
     * @var int
     *
     * @ORM\Column(name="confineDay", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $confineDay;

    /**
     * @var int
     *
     * @ORM\Column(name="confineMonth", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 2,
     *     max = 2
     * )
     */
    private $confineMonth;

    /**
     * @var int
     *
     * @ORM\Column(name="confineYear", type="smallint", nullable=true)
     *
     * @Assert\Length(
     *     min = 4,
     *     max = 4
     * )
     */
    private $confineYear;

    /**
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="confine")
     */
    private $person;

    /**
    * @ORM\ManyToOne(targetEntity="Place")
    */
    private $place;

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
     * @return int
     */
    public function getConfineDay()
    {
        return $this->confineDay;
    }

    /**
     * @param int $confineDay
     */
    public function setConfineDay($confineDay)
    {
        $this->confineDay = $confineDay;
    }

    /**
     * @return int
     */
    public function getConfineMonth()
    {
        return $this->confineMonth;
    }

    /**
     * @param int $confineMonth
     */
    public function setConfineMonth($confineMonth)
    {
        $this->confineMonth = $confineMonth;
    }

    /**
     * @return int
     */
    public function getConfineYear()
    {
        return $this->confineYear;
    }

    /**
     * @param int $confineYear
     */
    public function setConfineYear($confineYear)
    {
        $this->confineYear = $confineYear;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
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