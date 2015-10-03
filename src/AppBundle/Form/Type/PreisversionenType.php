<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\PvPreise;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PreisversionenType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
   
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
	
    	
    	    $preisversion = $event->getData();
	        $form = $event->getForm();

	        $form->add('pv_status', 'choice', array( 'choices' => array('1' => 'aktiv', '0' => 'inaktiv'), 'label' => 'Status'));
	
	        // check if the Product object is "new"
	        // If no data is passed to the form, the data is "null".
	        // This should be considered a new "Product"
	        
	        if (!$preisversion->getPvAgentur()) {

		    	$form
	            	->add('pv_agentur', 'entity', array( 'class' => 'AppBundle:SDAgenturen', 'choice_label' => 'ag_name', 'label' => 'Agentur'))
					->add('pv_hotel', 'entity', array( 'class' => 'AppBundle:SDHotels', 'choice_label' => 'ho_name', 'label' => 'Hotelname'));
					
        	} else {
				
				$form->add('pv_max_belegung', 'choice', array('choices' => array(3 => 'Dreibettzimmer', 4 => 'Vierbettzimmer'), 'label' => 'Maximalbelegung'));
				
				$form->add('pv_strafnaechte', 'integer', array('label' => 'Mindestnächte?'));
				
				if ($preisversion->getPvStrafnaechte()) {		
					$form->add('pv_strafnaechte_preis', 'integer', array('scale' => 2, 'label' => 'Preis pro Strafnacht'));
				}
				$form->add('pv_rabatt_dreibett', 'integer', array('label' => 'Rabatt auf Dreibettz.', 'attr' => array('placeholder' => 'in %')));
				$form->add('pv_rabatt_vierbett', 'integer', array('label' => 'Rabatt auf Vierbettz.', 'attr' => array('placeholder' => 'in %')));
				
        	}
				
				
			if ($preisversion && $preisversion->getPvId()) {
				
				$form->add('pv_preise', 'collection', array('type' => new PvPreiseType(), 'allow_add' => true, 'allow_delete' => true, 'by_reference' => false, 'prototype' => true, 'prototype_name' => '__opt_prot__'));
				
				$form->add('pv_aufpreise', 'collection', array('type' => new PvAufpreiseType(), 'allow_add' => true, 'allow_delete' => true, 'by_reference' => false, 'prototype' => true, 'prototype_name' => '__opt_prot__'));
				
				$form->add('pv_zuschlaege', 'collection', array('type' => new PvZuschlaegeType(), 'allow_add' => true, 'allow_delete' => true, 'by_reference' => false, 'prototype' => true, 'prototype_name' => '__opt_prot__'));
				
				$form->add('pv_rabatte', 'collection', array('type' => new PvRabatteType(), 'allow_add' => true, 'allow_delete' => true, 'by_reference' => false, 'prototype' => true, 'prototype_name' => '__opt_prot__'));
				
				// $form->add('addPreis', 'submit', array('attr' => array('class' => 'btn btn-block btn-success fa fa-plus'), 'label' => 'Preis hinzufügen'));
			}
			
			$form->add('delete', 'submit', array('attr' => array('class' => 'btn btn-danger')));
			$form->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
			
    	});
    	
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Preisversionen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_preisversionen';
    }
}
