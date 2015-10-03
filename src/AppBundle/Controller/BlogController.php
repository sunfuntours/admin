<?php 
	// src/AppBundle/Controller/BlogController.php
	namespace AppBundle\Controller;
	
	use	Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Symfony\Component\HttpFoundation\Request;
	
	class BlogController extends Controller
		{
	    	/**
				* @Route("/blog/{year}/{monat}/", name="blog_show")
			*/
			
			public function showAction($year, $monat)
				{
					// replace this example code with whatever you need
			        return $this->render('default/index.html.twig', array('base_dir' => "blblblbl : ".$year." / ".$monat));
				} 
		}
