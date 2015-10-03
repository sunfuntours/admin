<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PvRabatteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pvr_gueltig_bis', 'text', array('label' => 'Gültig bis'))
            ->add('pvr_range', 'text', array('attr' => array('class' => 'form_control daterange fr')))
            ->add('pvr_p_prozent', 'integer', array('label'=> 'Rabatt'))
            ->add('pvr_p_min_naechte', 'integer', array('label'=> 'Mindestnächte'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PvRabatte'
        ));
    }

    public function getName()
    {
        return 'appbundle_pvrabatte';
    }
}
