<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 21:14
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
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
     * @ORM\Column(name="nameFra", type="string", length=75)
     */
    private $nameFra;

    /**
     * @var string
     *
     * @ORM\Column(name="nameEsp", type="string", length=75)
     */
    private $nameEsp;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2)
     */
    private $alpha2;

    /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3)
     */
    private $alpha3;

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
    public function getNameFra()
    {
        return $this->nameFra;
    }

    /**
     * @param string $nameFra
     */
    public function setNameFra($nameFra)
    {
        $this->nameFra = $nameFra;
    }

    /**
     * @return string
     */
    public function getNameEsp()
    {
        return $this->nameEsp;
    }

    /**
     * @param string $nameEsp
     */
    public function setNameEsp($nameEsp)
    {
        $this->nameEsp = $nameEsp;
    }

    /**
     * @return string
     */
    public function getAlpha2()
    {
        return $this->alpha2;
    }

    /**
     * @param string $alpha2
     */
    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;
    }

    /**
     * @return string
     */
    public function getAlpha3()
    {
        return $this->alpha3;
    }

    /**
     * @param string $alpha3
     */
    public function setAlpha3($alpha3)
    {
        $this->alpha3 = $alpha3;
    }
}