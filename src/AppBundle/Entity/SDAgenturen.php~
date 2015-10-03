<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SDAgenturen
 *
 * @ORM\Table(name="sd_agenturen")})
 * @ORM\Entity
 */
class SDAgenturen
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="ag_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $ag_id;
    
    /**
     * @var string
     * @ORM\Column(name="ag_name", type="string", length=36, nullable=false)
     * @Assert\NotBlank()
     */
    private $ag_name;
    
    /**
     * @var string
     * @ORM\Column(name="ag_ansprechpartner", type="string", length=64, nullable=false)
     * 
     */
    private $ag_ansprechpartner;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ag_email", type="string", length=60, nullable=false)
     */
    private $ag_email;
    
	/**
     * @var string
     *
     * @ORM\Column(name="ag_status", type="boolean")
	 * @Assert\NotBlank()
     */
     
    private $ag_status;

    /**
     * Get ag_id
     *
     * @return integer 
     */
    public function getAgId()
    {
        return $this->ag_id;
    }

    /**
     * Set ag_name
     *
     * @param string $agName
     * @return SDAgenturen
     */
    public function setAgName($agName)
    {
        $this->ag_name = $agName;

        return $this;
    }

    /**
     * Get ag_name
     *
     * @return string 
     */
    public function getAgName()
    {
        return $this->ag_name;
    }

    /**
     * Set ag_ansprechpartner
     *
     * @param string $agAnsprechpartner
     * @return SDAgenturen
     */
    public function setAgAnsprechpartner($agAnsprechpartner)
    {
        $this->ag_ansprechpartner = $agAnsprechpartner;

        return $this;
    }

    /**
     * Get ag_ansprechpartner
     *
     * @return string 
     */
    public function getAgAnsprechpartner()
    {
        return $this->ag_ansprechpartner;
    }

    /**
     * Set ag_email
     *
     * @param boolean $agEmail
     * @return SDAgenturen
     */
    public function setAgEmail($agEmail)
    {
        $this->ag_email = $agEmail;

        return $this;
    }

    /**
     * Get ag_email
     *
     * @return boolean 
     */
    public function getAgEmail()
    {
        return $this->ag_email;
    }

    /**
     * Set ag_status
     *
     * @param boolean $agStatus
     * @return SDAgenturen
     */
    public function setAgStatus($agStatus)
    {
        $this->ag_status = $agStatus;

        return $this;
    }

    /**
     * Get ag_status
     *
     * @return boolean 
     */
    public function getAgStatus()
    {
        return $this->ag_status;
    }
}
