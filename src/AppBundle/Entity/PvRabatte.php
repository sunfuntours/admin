<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="pv_rabatte")})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PvRabatteRepository")
 */
class PvRabatte
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="pvr_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $pvr_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Preisversionen", inversedBy="pv_rabatte", cascade={"persist"})
     * @ORM\JoinColumn(name="pvr_pv_id", referencedColumnName="pv_id")
     */
    protected $pvr_pv_id;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvr_gueltig_bis", type="datetime")
     */
    protected $pvr_gueltig_bis;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvr_von", type="datetime")
     */
    protected $pvr_von;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvr_bis", type="datetime")
     */
    private $pvr_bis;
    
	/**
     * @var string
     */
    private $pvr_range;
    
	/**
     * @var integer
     *
     * @ORM\Column(name="pvr_p_prozent", type="integer", length=1, nullable=true)
     */
    private $pvr_p_prozent;
    
	/**
     * @var integer
     *
     * @ORM\Column(name="pvr_p_min_naechte", type="integer", length=1, nullable=true)
     */
    private $pvr_p_min_naechte;
    
    public function __construct() {
	    $this->pvr_von = $this->pvr_bis ?: new DateTime();
	    $this->pvr_bis = $this->pvr_bis ?: new DateTime();
    }
    
    /**
     * Get pvr_id
     *
     * @return integer 
     */
    public function getPvrId()
    {
        return $this->pvr_id;
    }

    /**
     * Set pvr_von
     *
     * @param \DateTime $pvrVon
     * @return PvRabatte
     */
    public function setPvrVon($pvrVon)
    {
        $this->pvr_von = $pvrVon;

        return $this;
    }

    /**
     * Get pvr_von
     *
     * @return \DateTime 
     */
    public function getPvrVon()
    {
        return $this->pvr_von;
    }

    /**
     * Set pvr_bis
     *
     * @param \DateTime $PvrBis
     * @return PvRabatte
     */
    public function setPvrBis($PvrBis)
    {
        $this->pvr_bis = $PvrBis;

        return $this;
    }

    /**
     * Get pvr_bis
     *
     * @return \DateTime 
     */
    public function getPvrBis()
    {
        return $this->pvr_bis;
    }

    /**
     * Set pvr_pv_id
     *
     * @param \AppBundle\Entity\Preisversionen $PvrPvId
     * @return PvRabatte
     */
    public function setPvrPvId(\AppBundle\Entity\Preisversionen $PvrPvId)
    {
        $this->pvr_pv_id = $PvrPvId;

        return $this;
    }

    /**
     * Get pvr_pv_id
     *
     * @return \AppBundle\Entity\Preisversionen 
     */
	public function getPvrPvId()
    {
        return $this->pvr_pv_id;
    }
    
    public function addPvrPvId(\AppBundle\Entity\Preisversionen $PvrPvId)
    {
	    if(!$this->pvr_pv_id->contains($PvrPvId)) {
		    $this->pvr_pv_id->add($PvrPvId);
	    }
	    
    }

    /**
     * Set pvr_range
     *
     * @param string $PvrRange
     * @return PvRabatte
     */
    public function setPvrRange($PvrRange)
    {
	    if(!$PvrRange) return false;

	    $this->pvr_von = new DateTime(substr($PvrRange, 0, 10));
	    $this->pvr_bis = new DateTime(substr($PvrRange, 13, 10));
	    
        $this->pvr_range = $this->pvr_von->format('d.m.Y')." - ".$this->pvr_bis->format('d.m.Y') ;

        return $this->pvr_range;
    }

    /**
     * Get pvr_range
     *
     * @return string 
     */
    public function getPvrRange()
    {
	    if(!$this->pvr_von || !$this->pvr_bis) return false;
	    $datum = $this->pvr_von->format('d.m.Y')." - ".$this->pvr_bis->format('d.m.Y');
	    
        return $datum;
    }

    /**
     * Set pvr_p_prozent
     *
     * @param integer $PvrPProzent
     * @return PvRabatte
     */
    public function setPvrPProzent($PvrPProzent)
    {
        $this->pvr_p_prozent = $PvrPProzent;

        return $this;
    }

    /**
     * Get pvr_p_prozent
     *
     * @return integer 
     */
    public function getPvrPProzent()
    {
        return $this->pvr_p_prozent;
    }

    /**
     * Set pvr_p_min_naechte
     *
     * @param integer $pvrPMinNaechte
     * @return PvRabatte
     */
    public function setPvrPMinNaechte($PvrPMinNaechte)
    {
        $this->pvr_p_min_naechte = $PvrPMinNaechte;

        return $this;
    }

    /**
     * Get pvr_p_min_naechte
     *
     * @return integer 
     */
    public function getPvrPMinNaechte()
    {
        return $this->pvr_p_min_naechte;
    }

    /**
     * Set pvr_gueltig_bis
     *
     * @param \DateTime $pvrGueltigBis
     * @return PvRabatte
     */
    public function setPvrGueltigBis($pvrGueltigBis)
    {
        $this->pvr_gueltig_bis = new DateTime($pvrGueltigBis);

        return $this;
    }

    /**
     * Get pvr_gueltig_bis
     *
     * @return \DateTime 
     */
    public function getPvrGueltigBis()
    {
        return $this->pvr_gueltig_bis->format('d.m.Y');
    }
}
