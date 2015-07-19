<?php

namespace NoticiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComentarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario',null, array('attr' => array('class' => 'form-control'),
                'label_attr' => array('class' => 'control-label col-lg-2')
            ))
            ->add('descricao','textarea', array('attr' => array('class' => 'form-control', 'rows' => 15),
                'label_attr' => array('class' => 'control-label col-lg-2')
    ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NoticiaBundle\Entity\Comentario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'noticiabundle_comentario';
    }
}
