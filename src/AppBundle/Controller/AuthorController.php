<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Author;

class AuthorController extends Controller
{
    /**
     * @Route("/author", name="Author pflegen")
     */
    public function authorAction()
		{
		    $author = new Author();
		    
		    $author->setName("Ali");
		    $author->setGender("Mann");
		    
		    // ... do something to the $author object
		    $validator = $this->get('validator');
		    $errors = $validator->validate($author);
		    if (count($errors) > 0) {
		        /*
		         * Uses a __toString method on the $errors variable which is a
		         * ConstraintViolationList object. This gives us a nice string
		         * for debugging.
		         */
		        $errorsString = (string) $errors;
		        return new Response($errorsString);
			} else {
				$em = $this->getDoctrine()->getManager();
			    
			    $em->persist($author);			    
			    $em->flush();
			}
		    return new Response('The author is valid! Yes!');
		}
	
}
