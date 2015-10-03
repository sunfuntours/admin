<?php 
	
	// src/Acme/TaskBundle/Form/Type/SDLaenderType.php
		
	namespace AppBundle\Form\Type;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class SDLaenderType extends AbstractType
	{
	    public function buildForm(FormBuilderInterface $builder, array $options)
	    {
		    	    
	        $builder->add('LaName', 'text', array('label' => 'Land'))
	        		->add('LaStatus', 'choice', array('choices' => array('1' => 'aktiv', '0' => 'inaktiv'), 'label' => 'Status'))
					->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
	    }
	
	    public function configureOptions(OptionsResolver $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'AppBundle\Entity\SDLaender',
	        ));
	    }

	    public function getName()
	    {
	        return 'sdlaender';
	    }
	}
