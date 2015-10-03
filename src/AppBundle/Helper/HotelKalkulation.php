<?php
	namespace AppBundle\Helper;
	
	use AppBundle\Entity\TagesPreise;
	
	use \DateTime;
	use \DateInterval;
	use Doctrine\ORM\EntityManager;
	use Doctrine\Common\Collections\ArrayCollection;
	
	class HotelKalkulation {
	
	    private $entityManager;
	
	    public function __construct(EntityManager $entityManager) {
	        $this->em = $entityManager;
	    }
	
	    public function kalkulieren($pvid) {
		    
		    $arr = $this->em->getRepository('AppBundle:Preisversionen')->find($pvid);
		    
		    foreach($arr->getPvPreise() as $pvPreis) {
			 	$index = $pvPreis->getPvPVon();
			 	$ende = $pvPreis->getPvPBis();
			 	
			 	while($index < $ende) {
				 	$tp = new TagesPreise();
				 	$tp->setTpDatum($index->format('d.m.Y'));
				 	$tp->setTpPRo($pvPreis->getPvpPRo());
				 	$tp->setTpPFRo($pvPreis->getPvpPRo());
				 	
				 	$tp->setTpPFr($pvPreis->getPvpPFr());
				 	$tp->setTpPFFr($pvPreis->getPvpPFr());
				 	
				 	$tp->setTpPHp($pvPreis->getPvpPHP());
				 	$tp->setTpPFHp($pvPreis->getPvpPHP());
				 	
				 	$tp->setTpPVP($pvPreis->getPvpPVP());
				 	$tp->setTpPFVP($pvPreis->getPvpPVP());
				 	
				 	$tp->setTpPAi($pvPreis->getPvpPAi());
				 	$tp->setTpPFAi($pvPreis->getPvpPAi());
				 	
				 	$arr->addTagesPreise($tp);
				 	
				 	$index->add(new DateInterval('P1D'));
			 	}
			 	
		    }
		    
	        // Do what you need, $this->entityManager holds a reference to your entity manager
	        
	        return $arr;
	        
	    }
	}