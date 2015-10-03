<?php 
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	public function configureOptions(OptionsResolver $resolver)
	{
	    $resolver->setDefaults(array(
	        'validation_groups' => false,
	        )); 
	}
	