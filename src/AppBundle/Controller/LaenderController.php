<?php 
	// src/AppBundle/Controller/LaenderController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\SDLaender;
	use AppBundle\Form\Type\SDLaenderType;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	class LaenderController extends Controller
		{
	    	/**
				* @Route("/stammdaten/laender/", name="laender_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $laender = $this->getDoctrine()->getRepository('AppBundle:SDLaender');
			        if ($search) { 
				        	$query = $laender
							->createQueryBuilder('l')
							->where('l.name LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$alllaender = $query->getResult();
							
				        } else {
							
							$alllaender = $laender->findAll();
					        
				        } 
			        
			        
			        return $this->render('default/table_laender.html.twig', array('table_normal' => array('laender' => $alllaender, 'title' => 'Alle Benutzer in der Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/stammdaten/laender/erstellen/", name="laender_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('userid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $laender = $em->getRepository('AppBundle:SDLaender')->find($id);			        
			        } else {
				        $laender = new SDLaender();
			        }
					
			        $message = array();
			        
			        $form = $this->createForm(new SDLaenderType(), $laender);
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							
							
							$data = $form->getData();
							
							// $message['info'][] = print_r($data); 
							
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('laender_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Land anlegen', 'ueberschrift' => 'Neues Land anlegen');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			

		}
