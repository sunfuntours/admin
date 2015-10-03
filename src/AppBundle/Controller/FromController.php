<?php
	// src/AppBundle/Controller/FormController.php
	
	namespace AppBundle\Controller;
	
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use AppBundle\Form\Type\TaskType;
	
	use AppBundle\Entity\Task;
	
	class FromController extends Controller
	{
		 /**
			 * @Route("/form", name="Formular")
			 * @Security("has_role('ROLE_USER')")
 		*/
     
	    public function newAction(Request $request)
	    {
		    
	        // create a task and give it some dummy data for this example
	        
			if(!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
			        throw $this->createAccessDeniedException();
			    }
		    $user = $this->getUser();
	        
	        $task = new Task();
	        $form = $this->createForm(new TaskType(), $task);
	            
	        $form->handleRequest($request);
	         
	        if($form->isValid()) {
		        // perform some action, such as saving the task to the database
		        
		         $nextAction = $form->get('saveAndAdd')->isClicked()
        ? 'task_new'
        : 'task_success';
        
		        return $this->redirectToRoute($nextAction);
		    }
    
	        return $this->render('default/new.html.twig', array(
	            'form' => $form->createView(), 'user' => $user,
				)); 
		}
	}