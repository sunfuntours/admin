<?php 
	// src/AppBundle/Controller/HotelsController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\SDHotels;
	use AppBundle\Form\Type\SDHotelsType;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	
	class HotelsController extends Controller
		{
	    	/**
				* @Route("/stammdaten/hotels/", name="hotels_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $hotels = $this->getDoctrine()->getRepository('AppBundle:SDHotels');
			        if ($search) { 
				        	$query = $hotels
							->createQueryBuilder('ho')
							->where('ho.ho_name LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$allhotels = $query->getResult();
							
				        } else {
							
							$allhotels = $hotels->findAll();
					        
				        } 
			        
			        
			        return $this->render('default/table_hotels.html.twig', array('table_normal' => array('hotels' => $allhotels, 'title' => 'Alle Hotels in der Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/stammdaten/hotels/erstellen/", name="hotels_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('hotelid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $hotels = $em->getRepository('AppBundle:SDHotels')->find($id);			        
			        } else {
				        $hotels = new SDHotels();
			        }
					
			        $message = array();
			        
			        $form = $this->createForm(new SDHotelsType(), $hotels);
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	

							$data = $form->getData();
							
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('hotels_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Land anlegen', 'ueberschrift' => 'Neues Land anlegen');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			

		}
