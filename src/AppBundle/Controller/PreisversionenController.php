<?php 
	// src/AppBundle/Controller/PreisversionenController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\Preisversionen;
	use AppBundle\Entity\PvPreise;
	use AppBundle\Entity\SDVersorgung;
	use AppBundle\Entity\PvPreiseRepository;

	use AppBundle\Form\Type\PreisversionenType;
	use Doctrine\Common\Collections\ArrayCollection;
	 
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	class PreisversionenController extends Controller
		{
	    	/**
				* @Route("/kalkulation/preisversionen/", name="preisversionen_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $preisversionen = $this->getDoctrine()->getRepository('AppBundle:Preisversionen');
			        if ($search) { 
				        	$allpreisversionen = $preisversionen->search($search);
							
				        } else {
							
							$allpreisversionen = $preisversionen->findBy(array(), array('pv_created' => 'DESC'));
					        
				        } 
			        
			        
			        return $this->render('default/table_preisversionen.html.twig', array('table_normal' => array('preisversionen' => $allpreisversionen, 'title' => 'Alle Preisversionen in einer Übersicht')));
			        
			        
				} 		
				
	    	/**
				* @Route("/kalkulation/preisversionen/erstellen/", name="preisversionen_erstellen")
			*/
			
			public function addAction(Request $request)
				{
					
					$id = $request->get('pvid');
					
					$em = $this->getDoctrine()->getManager();
					
			        if($id) {
				        $preisversionen = $em->getRepository('AppBundle:Preisversionen')->find($id);
				        
				    } else {
				        $preisversionen = new Preisversionen();
						// $preisversionen->setPvCreated(new DateTime());
			        }
					
			        $message = array();
			        
			        
			        $originalPvpreise = new ArrayCollection();
			        foreach ($preisversionen->getPvPreise() as $pvPreise) {
						$originalPvpreise->add($pvPreise);
					}
					
			        $originalPvaufpreise = new ArrayCollection();
					foreach ($preisversionen->getPvAufpreise() as $pvAufpreise) {
						$originalPvaufpreise->add($pvAufpreise);
					}
					
			        $originalPvZuschlaege = new ArrayCollection();
					foreach ($preisversionen->getPvZuschlaege() as $pvZuschlaege) {
						$originalPvZuschlaege->add($pvZuschlaege);
					}
			        $originalPvRabatte = new ArrayCollection();
					foreach ($preisversionen->getPvRabatte() as $pvRabatte) {
						$originalPvRabatte->add($pvRabatte);
					}

			        $form = $this->createForm(new PreisversionenType(), $preisversionen);
			        
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							if(1==2) {
								
								if($request->request->get('appbundle_preisversionen')['delete'] && $preisversionen) {
									
									$em->remove($preisversionen);
									
									return $this->redirectToRoute('preisversionen_overview');
									
								}
							}
							
							foreach($originalPvpreise as $pvPreise) {
								
								 if (false === $preisversionen->getPvPreise()->contains($pvPreise)) {								
									 $em->remove($pvPreise);
								} 
							}
							
							foreach($originalPvaufpreise as $pvAufpreise) {
								
								 if (false === $preisversionen->getPvAufpreise()->contains($pvAufpreise)) {								
									 $em->remove($pvAufpreise);
								} 
							}
							
							foreach($originalPvZuschlaege as $pvZuschlaege) {
								
								 if (false === $preisversionen->getPvAufpreise()->contains($pvZuschlaege)) {								
									 $em->remove($pvZuschlaege);
								} 
							}
							
							foreach($originalPvRabatte as $pvRabatte) {
								
								 if (false === $preisversionen->getPvRabatte()->contains($pvRabatte)) {								
									 $em->remove($pvRabatte);
								} 
							}
							
							foreach($preisversionen->getPvPreise() as $pvPreise) {
								$pvPreise->setPvpPvId($preisversionen);
								$em->persist($pvPreise);
							}
							
							foreach($preisversionen->getPvAufpreise() as $pvAufpreise) {
								$pvAufpreise->setPvaPvId($preisversionen);
								$em->persist($pvAufpreise);
							}
							
							foreach($preisversionen->getPvZuschlaege() as $pvZuschlaege) {
								$pvZuschlaege->setPvzPvId($preisversionen);
								$em->persist($pvZuschlaege);
							}
														
							foreach($preisversionen->getPvRabatte() as $pvRabatte) {
								$pvRabatte->setPvrPvId($preisversionen);
								$em->persist($pvRabatte);
							}

							// $message['info'][] = print_r($data); 
							
							$preisversionen->setPvUpdated(new DateTime());
							
						    $em->persist($preisversionen);	
						    
						    $em->flush();
							
							return $this->redirectToRoute('preisversionen_erstellen', array('pvid' => $preisversionen->getPvId()) );
						} else {
								
							$message['alert'][] = "Nicht validiert Meldung: ".$form->getErrors(); 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Preisversion anlegen/bearbeiten', 'ueberschrift' => 'Preisversionen');
			        
			        return $this->render('form/preisversion.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			
				
	    	/**
				* @Route("/kalkulation/preisversionen/generiere/{pvid}/", name="preisversionen_generieren", )
			*/
			
			public function calcAction($pvid)
				{
					$em = $this->getDoctrine()->getManager();
					
			        if($pvid) {
				        $helper = $this->get('appbundle.helper.hotelkalkulation');
				        
				        $tabelle = $helper->kalkulieren($pvid);
				        
				        dump($tabelle);
					} 
				
					return $this->render('default/table_preise.html.twig', array('preise' => $tabelle));
				
				}

		}
