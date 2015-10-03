<?php 
	// src/AppBundle/Controller/AgenturenController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\SDAgenturen;
	use AppBundle\Form\Type\SDAgenturenType;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	class AgenturenController extends Controller
		{
	    	/**
				* @Route("/stammdaten/agenturen/", name="agenturen_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $agenturen = $this->getDoctrine()->getRepository('AppBundle:SDAgenturen');
			        if ($search) { 
				        	$query = $agenturen
							->createQueryBuilder('ag')
							->where('ag.name LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$allagenturen = $query->getResult();
							
				        } else {
							
							$allagenturen = $agenturen->findAll();
					        
				        } 
			        
			        
			        return $this->render('default/table_agenturen.html.twig', array('table_normal' => array('agenturen' => $allagenturen, 'title' => 'Alle Agenturen in der Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/stammdaten/agenturen/erstellen/", name="agenturen_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('userid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $agenturen = $em->getRepository('AppBundle:SDAgenturen')->find($id);			        
			        } else {
				        $agenturen = new SDAgenturen();
			        }
					
			        $message = array();
			        
			        $form = $this->createForm(new SDAgenturenType(), $agenturen);
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							
							
							$data = $form->getData();
							
							// $message['info'][] = print_r($data); 
							
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('agenturen_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Agentur anlegen', 'ueberschrift' => 'Neue Agenutur anlegen');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			

		}
