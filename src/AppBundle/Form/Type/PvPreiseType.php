<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PvPreiseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pvp_range', 'text', array('attr' => array('class' => 'form_control daterange fr')))
            ->add('pvp_p_ro', 'money', array('label'=> 'RO'))
            ->add('pvp_p_fr', 'money', array('label'=> 'FR'))
            ->add('pvp_p_hp', 'money', array('label'=> 'HP'))
            ->add('pvp_p_vp', 'money', array('label'=> 'VP'))
            ->add('pvp_p_ai', 'money', array('label'=> 'AI'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PvPreise'
        ));
    }

    public function getName()
    {
        return 'appbundle_pvpreise';
    }
}
