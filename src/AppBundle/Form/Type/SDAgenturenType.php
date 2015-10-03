<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SDAgenturenType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ag_name', 'text', array('label' => 'Agenturname'))
            ->add('ag_ansprechpartner', null, array('label' => 'Ansprechpartner'))
            ->add('ag_email', 'email', array('label' => 'Email'))
            ->add('ag_status', 'choice', array('choices' => array('1' => 'aktiv', '0' => 'inaktiv'), 'label' => 'Status'))
			->add('save', 'submit', array('attr' => array('class' => 'btn btn-primary')));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\SDAgenturen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_sdagenturen';
    }
}
