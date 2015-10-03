<?php 
	
	// src/Acme/TaskBundle/Form/Type/AppUserType.php
		
	namespace AppBundle\Form\Type;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class AppUsersType extends AbstractType
	{
	    public function buildForm(FormBuilderInterface $builder, array $options)
	    {
		    	    
	        $builder->add('username', 'text')
	        		->add('vorname', 'text')
					->add('nachname', 'text')
					->add('password', 'password')
					->add('isactive', 'choice', array('choices' => array('1' => 'aktiv', '0' => 'inaktiv')))
					->add('email', 'email')
					->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
	    }
	
	    public function configureOptions(OptionsResolver $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'AppBundle\Entity\AppUsers',
	        ));
	    }

	    public function getName()
	    {
	        return 'appusers';
	    }
	}
