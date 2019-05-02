<?php
/**
 * Created by PhpStorm.
 * User: lapiscine
 * Date: 2019-05-02
 * Time: 21:16
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 *
 * @ORM\Entity
 * @ORM\Table(name="document")
 */
class Document
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
     * @ORM\Column(name="classification", type="string", length=50, nullable=true)
     */
    private $classification;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="archives_centre", type="string", length=50, nullable=true)
     */
    private $archives_centre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
}