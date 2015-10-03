<?php
	
	// src/AppBundle/Entity/HotelRepository.php
	namespace AppBundle\Entity;
	
	use Doctrine\ORM\EntityRepository;
	
	class HotelRepository extends EntityRepository
	{
	    public function findAllMitAgentur()
	    {
	        return $this->getEntityManager()
	            ->createQuery(
	                'SELECT hd FROM AppBundle:SDHotels hd JOIN AppBundle:Preisversion p'
	            )
	            ->getResult();
	    }
	}