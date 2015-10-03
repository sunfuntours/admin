<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="sd_destination")})
 * @ORM\Entity
 */
class SDDestination
{
	
	/**
     * @var integer $rz_id
     *
     * @ORM\Column(name="rz_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $rz_id;
    
    /**
     * @var string
     * @ORM\Column(name="rz_name", type="string", length=64, nullable=false)
     * @Assert\NotBlank()
     */
    private $rz_name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="rz_status", type="boolean")
	 * @Assert\NotBlank()
     */
    private $rz_status;
    
    /**
     * @ORM\ManyToOne(targetEntity="SDLaender", inversedBy="la_destinationen")
     * @ORM\JoinColumn(name="rz_laender_id", referencedColumnName="la_id")
     */
    protected $rz_laender_id;
    
    /**
     * @ORM\OneToMany(targetEntity="SDHotels", mappedBy="ho_destination_id")
     */
     
    protected $rz_hotels;

    /**
     * Set rz_name
     *
     * @param string $rzName
     * @return SDDestination
     */
    public function setRzName($rzName)
    {
        $this->rz_name = $rzName;

        return $this;
    }

    /**
     * Get rz_name
     *
     * @return string 
     */
    public function getRzName()
    {
        return $this->rz_name;
    }

    /**
     * Set rz_land
     *
     * @param string $rzLand
     * @return SDDestination
     */
    public function setRzLand($rzLand)
    {
        $this->rz_land = $rzLand;

        return $this;
    }

    /**
     * Get rz_land
     *
     * @return string 
     */
    public function getRzLand()
    {
        return $this->rz_land;
    }

    /**
     * Set rz_status
     *
     * @param boolean $rzStatus
     * @return SDDestination
     */
    public function setRzStatus($rzStatus)
    {
        $this->rz_status = $rzStatus;

        return $this;
    }

    /**
     * Get rz_status
     *
     * @return boolean 
     */
    public function getRzStatus()
    {
        return $this->rz_status;
    }

    /**
     * Get rz_id
     *
     * @return integer 
     */
    public function getRzId()
    {
        return $this->rz_id;
    }

    /**
     * Set rz_laender_id
     *
     * @param \AppBundle\Entity\SDLaender $rzLaenderId
     * @return SDDestination
     */
    public function setRzLaenderId(\AppBundle\Entity\SDLaender $rzLaenderId = null)
    {
        $this->rz_laender_id = $rzLaenderId;

        return $this;
    }

    /**
     * Get rz_laender_id
     *
     * @return \AppBundle\Entity\SDLaender 
     */
    public function getRzLaenderId()
    {
        return $this->rz_laender_id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rz_hotels = new ArrayCollection();
    }

    /**
     * Add rz_hotels
     *
     * @param \AppBundle\Entity\SDHotels $rzHotels
     * @return SDDestination
     */
    public function addRzHotel(\AppBundle\Entity\SDHotels $rzHotels)
    {
        $this->rz_hotels[] = $rzHotels;

        return $this;
    }

    /**
     * Remove rz_hotels
     *
     * @param \AppBundle\Entity\SDHotels $rzHotels
     */
    public function removeRzHotel(\AppBundle\Entity\SDHotels $rzHotels)
    {
        $this->rz_hotels->removeElement($rzHotels);
    }

    /**
     * Get rz_hotels
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRzHotels()
    {
        return $this->rz_hotels;
    }
}
