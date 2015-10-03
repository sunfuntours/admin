<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="sd_laender")})
 * @ORM\Entity
 */
class SDLaender
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="la_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $la_id;
    
    /**
     * @var string
     * @ORM\Column(name="la_name", type="string", length=36, nullable=false)
     * @Assert\NotBlank()
     */
    private $la_name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="la_status", type="boolean")
	 * @Assert\NotBlank()
     */
    private $la_status;
    
    
    /**
     * Set la_name
     *
     * @param string $laName
     * @return SDLaender
     */
     
     /**
     * @ORM\OneToMany(targetEntity="SDDestination", mappedBy="rz_laender_id")
     */
    protected $la_destinationen;
    
    public function setLaName($laName)
    {
        $this->la_name = $laName;

        return $this;
    }

    /**
     * Get la_name
     *
     * @return string 
     */
    public function getLaName()
    {
        return $this->la_name;
    }

    /**
     * Set rz_status
     *
     * @param boolean $rzStatus
     * @return SDLaender
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
     * Get la_id
     *
     * @return integer 
     */
    public function getLaId()
    {
        return $this->la_id;
    }

    /**
     * Set la_status
     *
     * @param boolean $laStatus
     * @return SDLaender
     */
    public function setLaStatus($laStatus)
    {
        $this->la_status = $laStatus;

        return $this;
    }

    /**
     * Get la_status
     *
     * @return boolean 
     */
    public function getLaStatus()
    {
        return $this->la_status;
    }
    
    public function __construct()
    {
        $this->la_destinationen = new ArrayCollection();
    }
    

    /**
     * Add la_destinationen
     *
     * @param \AppBundle\Entity\SDDestination $laDestinationen
     * @return SDLaender
     */
    public function addLaDestinationen(\AppBundle\Entity\SDDestination $laDestinationen)
    {
        $this->la_destinationen[] = $laDestinationen;

        return $this;
    }

    /**
     * Remove la_destinationen
     *
     * @param \AppBundle\Entity\SDDestination $laDestinationen
     */
    public function removeLaDestinationen(\AppBundle\Entity\SDDestination $laDestinationen)
    {
        $this->la_destinationen->removeElement($laDestinationen);
    }

    /**
     * Get la_destinationen
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLaDestinationen()
    {
        return $this->la_destinationen;
    }
}
