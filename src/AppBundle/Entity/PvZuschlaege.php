<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="pv_zuschlaege")})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PvZuschlaegeRepository")
 */
class PvZuschlaege
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="pvz_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $pvz_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Preisversionen", inversedBy="pv_zuschlaege", cascade={"persist"})
     * @ORM\JoinColumn(name="pvz_pv_id", referencedColumnName="pv_id")
     */
    protected $pvz_pv_id;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvz_von", type="datetime")
     */
    protected $pvz_von;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvz_bis", type="datetime")
     */
    private $pvz_bis;
    
	/**
     * @var string
     */
    private $pvz_range;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvz_p_euro", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pvz_p_euro = 0;
    
    public function __construct() {
	    $this->pvz_von = $this->pvz_bis ?: new DateTime();
	    $this->pvz_bis = $this->pvz_bis ?: new DateTime();
    }
    
    /**
     * Get pvz_id
     *
     * @return integer 
     */
    public function getPvzId()
    {
        return $this->pvz_id;
    }

    /**
     * Set pvz_von
     *
     * @param \DateTime $pvzVon
     * @return PvZuschlaege
     */
    public function setPvzVon($pvzVon)
    {
        $this->pvz_von = $pvzVon;

        return $this;
    }

    /**
     * Get pvz_von
     *
     * @return \DateTime 
     */
    public function getPvzVon()
    {
        return $this->pvz_von;
    }

    /**
     * Set pvz_bis
     *
     * @param \DateTime $pvzBis
     * @return PvZuschlaege
     */
    public function setPvzBis($pvzBis)
    {
        $this->pvz_bis = $pvzBis;

        return $this;
    }

    /**
     * Get pvz_bis
     *
     * @return \DateTime 
     */
    public function getPvzBis()
    {
        return $this->pvz_bis;
    }

    /**
     * Set pvz_pv_id
     *
     * @param \AppBundle\Entity\Preisversionen $PvzPvId
     * @return PvZuschlaege
     */
    public function setPvzPvId(\AppBundle\Entity\Preisversionen $PvzPvId)
    {
        $this->pvz_pv_id = $PvzPvId;

        return $this;
    }

    /**
     * Get pvz_pv_id
     *
     * @return \AppBundle\Entity\Preisversionen 
     */
	public function getPvzPvId()
    {
        return $this->pvz_pv_id;
    }
    
    public function addPvzPvId(\AppBundle\Entity\Preisversionen $PvzPvId)
    {
	    if(!$this->pvz_pv_id->contains($pvzPvId)) {
		    $this->pvz_pv_id->add($pvzPvId);
	    }
	    
    }

    /**
     * Set pvz_p_euro
     *
     * @param string $pvzPEuro
     * @return PvZuschlaege
     */
    public function setPvzPEuro($pvzPEuro)
    {
        $this->pvz_p_euro = $pvzPEuro;

        return $this;
    }

    /**
     * Get pvz_p_euro
     *
     * @return string 
     */
    public function getPvzPEuro()
    {
        return $this->pvz_p_euro;
    }
    


    /**
     * Set pvz_range
     *
     * @param string $pvzRange
     * @return PvZuschlaege
     */
    public function setPvzRange($pvzRange)
    {
	    if(!$pvzRange) return false;

	    $this->pvz_von = new DateTime(substr($pvzRange, 0, 10));
	    $this->pvz_bis = new DateTime(substr($pvzRange, 13, 10));
	    
        $this->pvz_range = $this->pvz_von->format('d.m.Y')." - ".$this->pvz_bis->format('d.m.Y') ;

        return $this->pvz_range;
    }

    /**
     * Get pvz_range
     *
     * @return string 
     */
    public function getpvzRange()
    {
	    if(!$this->pvz_von || !$this->pvz_bis) return false;
	    $datum = $this->pvz_von->format('d.m.Y')." - ".$this->pvz_bis->format('d.m.Y');
	    
        return $datum;
    }
}
