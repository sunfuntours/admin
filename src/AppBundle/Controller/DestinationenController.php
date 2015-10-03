<?php 
	// src/AppBundle/Controller/DestinationenController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\SDDestination;
	use AppBundle\Form\Type\SDDestinationType;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	
	class DestinationenController extends Controller
		{
	    	/**
				* @Route("/stammdaten/destinationen/", name="destinationen_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $destination = $this->getDoctrine()->getRepository('AppBundle:SDDestination');
			        if ($search) { 
				        	$query = $laender
							->createQueryBuilder('rz')
							->where('rz.rz_name LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$alldestination = $query->getResult();
							
				        } else {
							
							$alldestination = $destination->findAll();
					        
				        } 
			        
			        
			        return $this->render('default/table_destinationen.html.twig', array('table_normal' => array('destinationen' => $alldestination, 'title' => 'Alle Destinationen in der Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/stammdaten/destinationen/erstellen/", name="destinationen_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('userid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $destination = $em->getRepository('AppBundle:SDDestination')->find($id);			        
			        } else {
				        $destination = new SDDestination();
			        }
					
			        $message = array();
			        
			        $form = $this->createForm(new SDDestinationType(), $destination);
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							
							
							$data = $form->getData();
							
							// $message['info'][] = print_r($data); 
							
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('destinationen_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Land anlegen', 'ueberschrift' => 'Neues Land anlegen');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			

		}
