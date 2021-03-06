<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="pv_preise")})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PvPreiseRepository")
 */
class PvPreise
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="pvp_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $pvp_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Preisversionen", inversedBy="pv_preise", cascade={"persist"})
     * @ORM\JoinColumn(name="pvp_pv_id", referencedColumnName="pv_id")
     */
    protected $pvp_pv_id;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvp_von", type="datetime")
     */
    protected $pvp_von;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="pvp_bis", type="datetime")
     */
    private $pvp_bis;
    
	/**
     * @var string
     */
    private $pvp_range;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvp_p_ro", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pvp_p_ro = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvp_p_fr", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pvp_p_fr = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvp_p_hp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pvp_p_hp = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvp_p_vp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $pvp_p_vp = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="pvp_p_ai", type="decimal", precision=7, scale=2, nullable=true)
    */
     
    private $pvp_p_ai = 0;
    

    /**
     * Get pvp_id
     *
     * @return integer 
     */
    public function getPvpId()
    {
        return $this->pvp_id;
    }

    /**
     * Set pvp_von
     *
     * @param \DateTime $pvpVon
     * @return PvPreise
     */
    public function setPvpVon($pvpVon)
    {
        $this->pvp_von = $pvpVon;

        return $this;
    }

    /**
     * Get pvp_von
     *
     * @return \DateTime 
     */
    public function getPvpVon()
    {
        return $this->pvp_von;
    }

    /**
     * Set pvp_bis
     *
     * @param \DateTime $pvpBis
     * @return PvPreise
     */
    public function setPvpBis($pvpBis)
    {
        $this->pvp_bis = $pvpBis;

        return $this;
    }

    /**
     * Get pvp_bis
     *
     * @return \DateTime 
     */
    public function getPvpBis()
    {
        return $this->pvp_bis;
    }

    /**
     * Set pvp_p_ro
     *
     * @param string $pvpPRo
     * @return PvPreise
     */
    public function setPvpPRo($pvpPRo)
    {
        $this->pvp_p_ro = $pvpPRo;

        return $this;
    }

    /**
     * Get pvp_p_ro
     *
     * @return string 
     */
    public function getPvpPRo()
    {
        return $this->pvp_p_ro;
    }

    /**
     * Set pvp_p_fr
     *
     * @param string $pvpPFr
     * @return PvPreise
     */
    public function setPvpPFr($pvpPFr)
    {
        $this->pvp_p_fr = $pvpPFr;

        return $this;
    }

    /**
     * Get pvp_p_fr
     *
     * @return string 
     */
    public function getPvpPFr()
    {
        return $this->pvp_p_fr;
    }

    /**
     * Set pvp_p_hp
     *
     * @param string $pvpPHp
     * @return PvPreise
     */
    public function setPvpPHp($pvpPHp)
    {
        $this->pvp_p_hp = $pvpPHp;

        return $this;
    }

    /**
     * Get pvp_p_hp
     *
     * @return string 
     */
    public function getPvpPHp()
    {
        return $this->pvp_p_hp;
    }

    /**
     * Set pvp_p_vp
     *
     * @param string $pvpPVp
     * @return PvPreise
     */
    public function setPvpPVp($pvpPVp)
    {
        $this->pvp_p_vp = $pvpPVp;

        return $this;
    }

    /**
     * Get pvp_p_vp
     *
     * @return string 
     */
    public function getPvpPVp()
    {
        return $this->pvp_p_vp;
    }

    /**
     * Set pvp_p_ai
     *
     * @param string $pvpPAi
     * @return PvPreise
     */
    public function setPvpPAi($pvpPAi)
    {
        $this->pvp_p_ai = $pvpPAi;

        return $this;
    }

    /**
     * Get pvp_p_ai
     *
     * @return string 
     */
    public function getPvpPAi()
    {
        return $this->pvp_p_ai;
    }

    /**
     * Set pvp_pv_id
     *
     * @param \AppBundle\Entity\Preisversionen $pvpPvId
     * @return PvPreise
     */
    public function setPvpPvId(\AppBundle\Entity\Preisversionen $pvpPvId)
    {
	    
        $this->pvp_pv_id = $pvpPvId;

        return $this;
    }

    /**
     * Get pvp_pv_id
     *
     * @return \AppBundle\Entity\Preisversionen 
     */
    public function getPvpPvId()
    {
        return $this->pvp_pv_id;
    }
    
    public function addPvpPvId(\AppBundle\Entity\Preisversionen $pvpPvId)
    {
	    if(!$this->pvp_pv_id->contains($pvpPvId)) {
		    $this->pvp_pv_id->add($pvpPvId);
	    }
	    
    }
    /**
     * Set pvp_range
     *
     * @param string $pvpRange
     * @return PvPreise
     */
    public function setPvpRange($pvpRange)
    {
	    if(!$pvpRange) return false;

	    $this->pvp_von = new DateTime(substr($pvpRange, 0, 10));
	    $this->pvp_bis = new DateTime(substr($pvpRange, 13, 10));
	    
        $this->pvp_range = $this->pvp_von->format('d.m.Y')." - ".$this->pvp_bis->format('d.m.Y') ;

        return $this->pvp_range;
    }

    /**
     * Get pvp_range
     *
     * @return string 
     */
    public function getPvpRange()
    {
	    if(!$this->pvp_von || !$this->pvp_bis) return false;
	    $datum = $this->pvp_von->format('d.m.Y')." - ".$this->pvp_bis->format('d.m.Y');
	    
        return $datum;
    }
    
    public function __construct() {
	    $this->pvp_von = $this->pvp_bis ?: new DateTime();
	    $this->pvp_bis = $this->pvp_bis ?: new DateTime();
    }
    
	
}
