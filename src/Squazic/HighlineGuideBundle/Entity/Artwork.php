<?php

namespace Squazic\HighlineGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artwork
 *
 * @ORM\Table(name="artwork")
 * @ORM\Entity
 */
class Artwork
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="decimal", scale=6, nullable=true)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="decimal", scale=6, nullable=true)
     */
    private $longitude;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artist", mappedBy="artwork")
     */
    private $artist;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artist = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }


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
     * Set title
     *
     * @param string $title
     * @return Artwork
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Artwork
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Artwork
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Artwork
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Add artist
     *
     * @param \Squazic\HighlineGuideBundle\Entity\Artist $artist
     * @return Artwork
     */
    public function addArtist(\Squazic\HighlineGuideBundle\Entity\Artist $artist)
    {
        $this->artist[] = $artist;
        $artist->addArtwork($this);
    
        return $this;
    }

    /**
     * Remove artist
     *
     * @param \Squazic\HighlineGuideBundle\Entity\Artist $artist
     */
    public function removeArtist(\Squazic\HighlineGuideBundle\Entity\Artist $artist)
    {
        $this->artist->removeElement($artist);
    }

    /**
     * Get artist
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArtist()
    {
        return $this->artist;
    }
}