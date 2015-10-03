<?php
	
	// src/AppBundle/Entity/PreisversionenRepository.php
	namespace AppBundle\Entity;
	
	use Doctrine\ORM\EntityRepository;
	
	class PreisversionenRepository extends EntityRepository
	{
	    public function findAllByHotels()
	    {
	        $arr = $this->getEntityManager()
	            ->createQuery(
	                'SELECT pv, count(pv.pv_id) as anzahl FROM AppBundle:Preisversionen pv GROUP BY pv.pv_hotel'
	            )
	            ->getResult();
	      	
	      	$results = array();
		  	dump($arr);
		  	foreach($arr as $key=>$el)
	        {
		        $el['0']->pv_anzahl = $el['anzahl'];
		        
            	$results[] = $el['0'];
        	}
            return $results;
	    }
	    
	    public function search($search) {
		    
		    $arr = $this->createQueryBuilder('pv')
		    	->join("pv.pv_hotel", 'ho')->addSelect("ho")
		    	->join("pv.pv_agentur", 'ag')->addSelect("ag")
				->Where('ho.ho_name like :search')
				->orWhere('ag.ag_name like :search')
	            ->setParameter('search', '%'.$search.'%')
	            ->getQuery()
	            ->getResult();
		    
		    return $arr;
	    }
	    
	    public function findWithAllInfos($id) 
	    {
		  	$arr = $this->getEntityManager()
	            ->createQuery('SELECT pv, pvp FROM AppBundle:Preisversionen pv LEFT JOIN AppBundle:PvPreise pvp Where pv.pv_id = '.$id)
	            ->getResult();  
	            
			return $arr;
	    }
	}