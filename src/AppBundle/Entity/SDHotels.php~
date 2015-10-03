<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="sd_hotels")})
 * @ORM\Entity
 */
class SDHotels
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="ho_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $ho_id;
    
    /**
     * @var string
     * @ORM\Column(name="ho_name", type="string", length=64, nullable=false)
     * @Assert\NotBlank()
     */
    private $ho_name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ho_status", type="boolean")
	 * @Assert\NotBlank()
     */
    private $ho_status;
    
    /**
     * @ORM\Column(name="ho_sterne", type="integer", length=1)
     */
    private $ho_sterne;
    
     
    /**
     * @ORM\ManyToOne(targetEntity="SDDestination", inversedBy="rz_hotels")
     * @ORM\JoinColumn(name="ho_destination_id", referencedColumnName="rz_id")
     */
    protected $ho_destination_id;
 

    /**
     * Get ho_id
     *
     * @return integer 
     */
    public function getHoId()
    {
        return $this->ho_id;
    }

    /**
     * Set ho_name
     *
     * @param string $hoName
     * @return SDHotels
     */
    public function setHoName($hoName)
    {
        $this->ho_name = $hoName;

        return $this;
    }

    /**
     * Get ho_name
     *
     * @return string 
     */
    public function getHoName()
    {
        return $this->ho_name;
    }

    /**
     * Set ho_status
     *
     * @param boolean $hoStatus
     * @return SDHotels
     */
    public function setHoStatus($hoStatus)
    {
        $this->ho_status = $hoStatus;

        return $this;
    }

    /**
     * Get ho_status
     *
     * @return boolean 
     */
    public function getHoStatus()
    {
        return $this->ho_status;
    }

    /**
     * Set ho_destination_id
     *
     * @param \AppBundle\Entity\SDDestination $hoDestinationId
     * @return SDDestination
     */
    public function setHoDestinationId(\AppBundle\Entity\SDDestination $hoDestinationId = null)
    {
        $this->ho_destination_id = $hoDestinationId;

        return $this;
    }

    /**
     * Get ho_destination_id
     *
     * @return \AppBundle\Entity\SDHotels 
     */
    public function getHoDestinationId()
    {
        return $this->ho_destination_id;
    }

    /**
     * Set ho_sterne
     *
     * @param integer $hoSterne
     * @return SDHotels
     */
    public function setHoSterne($hoSterne)
    {
        $this->ho_sterne = $hoSterne;

        return $this;
    }

    /**
     * Get ho_sterne
     *
     * @return integer 
     */
    public function getHoSterne()
    {
        return $this->ho_sterne;
    }
}
