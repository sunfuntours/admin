<?php 
	
	// src/Acme/TaskBundle/Form/Type/SDDestinationType.php
		
	namespace AppBundle\Form\Type;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class SDDestinationType extends AbstractType
	{
	    public function buildForm(FormBuilderInterface $builder, array $options)
	    {
		    	    
	        $builder->add('rz_name', 'text', array('label' => 'Destination'))
	        		->add('rz_status', 'choice', array('choices' => array('1' => 'aktiv', '0' => 'inaktiv'), 'label' => 'Status'))
	        		->add('rz_laender_id', 'entity', array(
    'class' => 'AppBundle:SDLaender',
    'choice_label' => 'la_name'))
					->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
	    }
	
	    public function configureOptions(OptionsResolver $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'AppBundle\Entity\SDDestination',
	        ));
	    }

	    public function getName()
	    {
	        return 'sddestination';
	    }
	}
