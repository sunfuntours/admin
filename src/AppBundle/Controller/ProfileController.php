<?php 
	// src/AppBundle/Controller/ProfileController.php
	namespace AppBundle\Controller;
	
	use AppBundle\Entity\AppUsers;
	use AppBundle\Form\Type\AppUsersType;
	use Symfony\Component\HttpFoundation\Request;
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\Form\FormBuilder;
	use \Datetime;
	class ProfileController extends Controller
		{
	    	/**
				* @Route("/profile/", name="profile_overview")
			*/
			
			public function indexAction(Request $request)
				{
					// replace this example code with whatever you need
			        
			        $search = $request->get('table_search');
			        $appusers = $this->getDoctrine()->getRepository('AppBundle:AppUsers');
			        if ($search) { 
				        	$query = $appusers
							->createQueryBuilder('a')
							->where('a.vorname LIKE :search')
							->orWhere('a.nachname LIKE :search')
							->orWhere('a.email LIKE :search')
							->setParameter('search', '%'.$search.'%')
							->getQuery()
							;
							
							$allusers = $query->getResult();
							
				        } else {
							
							$allusers = $appusers->findAll();
					        
				        } 
			        
			        
			        return $this->render('default/table_normal.html.twig', array('table_normal' => array('users' => $allusers, 'title' => 'Alle Benutzer in der Übersicht')));
			        
			        
				} 
						
	    	/**
				* @Route("/profile/{userid}/", name="profile_user", requirements={"userid": "\d+"})
			*/
			
			public function showAction($userid, Request $request)
				{
					// replace this example code with whatever you need
			        $message = array();
			        
			        $em = $this->getDoctrine()->getManager();
			        
			        $users = $em->getRepository('AppBundle:AppUsers')->find($userid);
			        
			        $form = $this->createForm(new AppUsersType(), $users);
			        $form->add('password', 'text', array('required' => false));
			        $form->add('delete', 'submit' , array('validation_groups' => true, 'attr' => array('class' => 'btn btn-danger fa fa-trash', 'value' => '1')));
			        
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST'))
			        {
												
						if ($form->isValid())
						{	
							
							if($request->request->get('appusers')['delete'] && $users) {
								
								$em->remove($users);
								$em->flush();
								
								return $this->redirectToRoute('profile_overview');
								
							}
							
						}
					
					}
			        
			        return $this->render('form/fields.html.twig', array('message' => $message, 'container' => 'asdsa '.$userid, 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				} 			
				
	    	/**
				* @Route("/profile/erstellen/", name="profile_user_erstellen")
			*/
			
			public function addAction(Request $request)
				{

					$users = new AppUsers();
					
					$users->setCreated(new DateTime());
					$users->setRole(1);
					
			        $message = array();
			        
			        $form = $this->createForm(new AppUsersType(), $users);
			        $form->handleRequest($request);
			        
			        if ($request->isMethod('POST')) {
			        	
												
						if ($form->isValid())
						{	
							
							
							
							$data = $form->getData();
							
							// $message['info'][] = print_r($data); 
							
							$em = $this->getDoctrine()->getManager();
						    $em->persist($data);			    
						    $em->flush();
							
							return $this->redirectToRoute('profile_overview');
						} else {
								
							$message['alert'][] = "Nicht validiert"; 
									
						}
					}
			        
					$registration = $form->getData();
			        
					$seiteninfo = array('title' => 'Benutzer anlegen', 'ueberschrift' => 'Neuen Benutzer anlegen');
			        
			        return $this->render('form/fields.html.twig', array('sinfo' => $seiteninfo, 'message' => $message, 'container' => 'asdsa ', 'inhalt' => ' Du Stinkst ', 'form' => $form->createView()));
			        
			        
				}
			
			/**
				* @Route("/profile/{userid}/delete", name="profile_delete", requirements={"userid": "\d+"})
			*/
			public function deleteAction($userid) {
				
				$em = $this->getDoctrine()->getManager();
				
				$user = $em->getRepository('AppBundle:AppUsers').find($userid);
				
				if (!$user) {
					throw $this->createNotFoundException('No guest found for id '.$id);
				}
				
				$em->remove($user);
				$em->flush();
				
				return $this->redirectToRoute('profile_overview');
				
			} 
		
		}
