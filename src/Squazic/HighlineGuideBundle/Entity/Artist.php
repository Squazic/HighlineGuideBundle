<?php

namespace Squazic\HighlineGuideBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity
 */
class Artist
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
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artwork", inversedBy="artist")
     * @ORM\JoinTable(name="artist_artwork",
     *   joinColumns={
     *     @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="artwork_id", referencedColumnName="id")
     *   }
     * )
     */
    private $artwork;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artwork = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add artwork
     *
     * @param \Squazic\HighlineGuideBundle\Entity\Artwork $artwork
     * @return Artist
     */
    public function addArtwork(\Squazic\HighlineGuideBundle\Entity\Artwork $artwork)
    {
        $this->artwork[] = $artwork;
    
        return $this;
    }

    /**
     * Remove artwork
     *
     * @param \Squazic\HighlineGuideBundle\Entity\Artwork $artwork
     */
    public function removeArtwork(\Squazic\HighlineGuideBundle\Entity\Artwork $artwork)
    {
        $this->artwork->removeElement($artwork);
    }

    /**
     * Get artwork
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArtwork()
    {
        return $this->artwork;
    }
}