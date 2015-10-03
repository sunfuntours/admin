<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PvAufpreiseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pva_range', 'text', array('attr' => array('class' => 'form_control daterange fr')))
            ->add('pva_p_ro', 'money', array('label'=> 'RO'))
            ->add('pva_p_fr', 'money', array('label'=> 'FR'))
            ->add('pva_p_hp', 'money', array('label'=> 'HP'))
            ->add('pva_p_vp', 'money', array('label'=> 'VP'))
            ->add('pva_p_ai', 'money', array('label'=> 'AI'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PvAufpreise'
        ));
    }

    public function getName()
    {
        return 'appbundle_pvaufpreise';
    }
}
