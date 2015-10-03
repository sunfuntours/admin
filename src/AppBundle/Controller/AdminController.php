<?php
	// src/AppBundle/Controller/AdminController.php

	namespace AppBundle\Controller;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\HttpFoundation\Response;
	
	class AdminController extends Controller
	{
	    /**
	     * @Route("/admin")
	     */
	     
	    public function adminAction()
	    {
	         return $this->render('default/container.html.twig', array(
	            'status' => array('Admin Page'),
				)); 
	    }
	}
	