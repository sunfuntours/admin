<?php

namespace AppBundle\Entity;

use \DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AppUsers
 *
 * @ORM\Table(name="tages_preise")})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TagesPreiseRepository")
 */
class TagesPreise
{
	
	/**
     * @var integer
     *
     * @ORM\Column(name="tp_id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tp_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Preisversionen", inversedBy="pv_tages_preise", cascade={"persist"})
     * @ORM\JoinColumn(name="tp_pv_id", referencedColumnName="pv_id")
     */
    protected $tp_pv_id;
    
	/**
     * @var datetime
     *
     * @ORM\Column(name="tp_datum", type="date")
     */
    protected $tp_datum;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_ro", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_ro = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_fr", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_fr = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_hp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_hp = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_vp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_vp = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_ai", type="decimal", precision=7, scale=2, nullable=true)
    */
     
    private $tp_p_ai = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_f_ro", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_f_ro = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_f_fr", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_f_fr = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_f_hp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_f_hp = 0;
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_f_vp", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $tp_p_f_vp = 0;
    
	/**
     * @var decimal
     *
     * @ORM\Column(name="tp_p_f_ai", type="decimal", precision=7, scale=2, nullable=true)
    */
     
    private $tp_p_f_ai = 0;
    

    /**
     * Get tp_id
     *
     * @return integer 
     */
    public function getTpId()
    {
        return $this->tp_id;
    }

    /**
     * Set tp_datum
     *
     * @param \DateTime $tpDatum
     * @return TagesPreise
     */
    public function setTpDatum($tpDatum)
    {
        $this->tp_datum = $tpDatum;

        return $this;
    }

    /**
     * Get tp_datum
     *
     * @return \DateTime 
     */
    public function getTpDatum()
    {
        return $this->tp_datum;
    }

    /**
     * Set tp_p_ro
     *
     * @param string $tpPRo
     * @return TagesPreise
     */
    public function setTpPRo($tpPRo)
    {
        $this->tp_p_ro = $tpPRo;

        return $this;
    }

    /**
     * Get tp_p_ro
     *
     * @return string 
     */
    public function getTpPRo()
    {
        return $this->tp_p_ro;
    }

    /**
     * Set tp_p_fr
     *
     * @param string $tpPFr
     * @return TagesPreise
     */
    public function setTpPFr($tpPFr)
    {
        $this->tp_p_fr = $tpPFr;

        return $this;
    }

    /**
     * Get tp_p_fr
     *
     * @return string 
     */
    public function getTpPFr()
    {
        return $this->tp_p_fr;
    }

    /**
     * Set tp_p_hp
     *
     * @param string $tpPHp
     * @return TagesPreise
     */
    public function setTpPHp($tpPHp)
    {
        $this->tp_p_hp = $tpPHp;

        return $this;
    }

    /**
     * Get tp_p_hp
     *
     * @return string 
     */
    public function getTpPHp()
    {
        return $this->tp_p_hp;
    }

    /**
     * Set tp_p_vp
     *
     * @param string $tpPVp
     * @return TagesPreise
     */
    public function setTpPVp($tpPVp)
    {
        $this->tp_p_vp = $tpPVp;

        return $this;
    }

    /**
     * Get tp_p_vp
     *
     * @return string 
     */
    public function getTpPVp()
    {
        return $this->tp_p_vp;
    }

    /**
     * Set tp_p_ai
     *
     * @param string $tpPAi
     * @return TagesPreise
     */
    public function setTpPAi($tpPAi)
    {
        $this->tp_p_ai = $tpPAi;

        return $this;
    }

    /**
     * Get tp_p_ai
     *
     * @return string 
     */
    public function getTpPAi()
    {
        return $this->tp_p_ai;
    }

    /**
     * Set tp_pv_id
     *
     * @param \AppBundle\Entity\Preisversionen $tpPvId
     * @return TagesPreise
     */
    public function setTpPvId(\AppBundle\Entity\Preisversionen $tpPvId = null)
    {
        $this->tp_pv_id = $tpPvId;

        return $this;
    }

    /**
     * Get tp_pv_id
     *
     * @return \AppBundle\Entity\Preisversionen 
     */
    public function getTpPvId()
    {
        return $this->tp_pv_id;
    }

    /**
     * Set tp_p_f_ro
     *
     * @param string $tpPFRo
     * @return TagesPreise
     */
    public function setTpPFRo($tpPFRo)
    {
        $this->tp_p_f_ro = $tpPFRo;

        return $this;
    }

    /**
     * Get tp_p_f_ro
     *
     * @return string 
     */
    public function getTpPFRo()
    {
        return $this->tp_p_f_ro;
    }

    /**
     * Set tp_p_f_fr
     *
     * @param string $tpPFFr
     * @return TagesPreise
     */
    public function setTpPFFr($tpPFFr)
    {
        $this->tp_p_f_fr = $tpPFFr;

        return $this;
    }

    /**
     * Get tp_p_f_fr
     *
     * @return string 
     */
    public function getTpPFFr()
    {
        return $this->tp_p_f_fr;
    }

    /**
     * Set tp_p_f_hp
     *
     * @param string $tpPFHp
     * @return TagesPreise
     */
    public function setTpPFHp($tpPFHp)
    {
        $this->tp_p_f_hp = $tpPFHp;

        return $this;
    }

    /**
     * Get tp_p_f_hp
     *
     * @return string 
     */
    public function getTpPFHp()
    {
        return $this->tp_p_f_hp;
    }

    /**
     * Set tp_p_f_vp
     *
     * @param string $tpPFVp
     * @return TagesPreise
     */
    public function setTpPFVp($tpPFVp)
    {
        $this->tp_p_f_vp = $tpPFVp;

        return $this;
    }

    /**
     * Get tp_p_f_vp
     *
     * @return string 
     */
    public function getTpPFVp()
    {
        return $this->tp_p_f_vp;
    }

    /**
     * Set tp_p_f_ai
     *
     * @param string $tpPFAi
     * @return TagesPreise
     */
    public function setTpPFAi($tpPFAi)
    {
        $this->tp_p_f_ai = $tpPFAi;

        return $this;
    }

    /**
     * Get tp_p_f_ai
     *
     * @return string 
     */
    public function getTpPFAi()
    {
        return $this->tp_p_f_ai;
    }
}
