<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="Login Seite")
     */
    public function loginAction(Request $request)
    {
	    
        $authenticationUtils = $this->get('security.authentication_utils');
		// get the login error if there is one
		
		$error = $authenticationUtils->getLastAuthenticationError();
		
		// last username entered by the user
		
		$lastUsername = $authenticationUtils->getLastUsername();
		
		return $this->render(
        'security/login.html.twig', array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,)
            );
    
	
	}
	
	/**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(Request $request)
    {
	    
        // replace this example code with whatever you need
    
        return new Response('Login Seite');
	
	}
	
}
