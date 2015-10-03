<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SDHotelsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder->add('ho_name', 'text', array('label' => 'Hotelname'))
            ->add('ho_status', 'choice', array('choices' => array('1' => 'aktiv', '0' => 'inaktiv'), 'label' => 'Status'))
            ->add('ho_sterne','choice', array('choices' => array('0' => 'keine', '1' => '1 Stern', '2' => '2 Sterne', '3' => '3 Sterne'), 'label' => 'Anzahl an Sternen'))
            ->add('ho_destination_id', 'entity', array('class' => 'AppBundle:SDDestination', 'choice_label' => 'rz_name'))
            ->add('delete', 'submit', array('attr' => array('class' => 'btn btn-alert')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
    }

	
	public function configureOptions(OptionsResolver $resolver)
	    {
	        $resolver->setDefaults(array(
	            'data_class' => 'AppBundle\Entity\SDHotels',
	        ));
	    }

    public function getName()
    {
        return 'appbundle_sdhotels';
    }
}
