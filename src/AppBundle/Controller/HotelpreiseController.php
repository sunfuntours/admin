<?php 
	// src/AppBundle/Controller/HotelpreiseController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\Preisversionen;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	class HotelpreiseController extends Controller
		{
	    	/**
				* @Route("/kalkulation/hotelpreise/", name="hotelpreise_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $preisversionen = $this->getDoctrine()->getRepository('AppBundle:Preisversionen');
			        if ($search) { 
				        	$query = $preisversionen
							->createQueryBuilder('pv')
							->where('pv.pvid LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$allpreisversionen = $query->getResult();
							
				        } else {
							
							$allpreisversionen = $preisversionen->findAllByHotels();
							dump($allpreisversionen);
							// $allpreisversionen = dump($preisversionen->findAll());
					        // $allpreisversionen = $allpreisversionen[0];
				        } 
			        
			        
			        return $this->render('default/table_preisversionen.html.twig', array('table_normal' => array('preisversionen' => $allpreisversionen, 'title' => 'Alle Preisversionen in einer Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/kalkulation/preisversionen/erstellen/", name="preisversionen_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('userid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $preisversionen = $em->getRepository('AppBundle:Preisversionen')->find($id);			        
			        } else {
				        $preisversionen = new Preisversionen();
						$preisversionen->setPvCreated(new DateTime());
			        }
					
			        $message = array();
			        
			        $form = $this->createForm(new PreisversionenType(), $preisversionen);
			        $form->remove('pv_hotel');
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							
							$data = $form->getData();
							
							// $message['info'][] = print_r($data); 
							
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('preisversionen_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Preisversion bearbeiten', 'ueberschrift' => 'Preisversionen bearbeiten');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			

		}
