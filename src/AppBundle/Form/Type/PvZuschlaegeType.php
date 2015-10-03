<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PvZuschlaegeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pvz_range', 'text', array('attr' => array('class' => 'form_control daterange fr')))
            ->add('pvz_p_euro', 'money', array('label'=> 'Zuschlag'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PvZuschlaege'
        ));
    }

    public function getName()
    {
        return 'appbundle_pvzuschlaege';
    }
}
