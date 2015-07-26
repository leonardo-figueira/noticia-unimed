<?php

namespace NoticiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use NoticiaBundle\Form\ImagemType;

class NoticiaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo',null, array('attr' => array('class' => 'form-control'),
                'label_attr' => array('class' => 'control-label col-lg-2')
            ))
            ->add('imagem',  new ImagemType(),
                array('label_attr' => array('class' => 'control-label col-lg-2')
            ))
            ->add('noticia','textarea', array('attr' => array('class' => 'form-control', 'rows' => 15),
                'label_attr' => array('class' => 'control-label col-lg-2')
            ))
            ->add('categoria', 'entity', array('attr' => array('class' => 'form-control'),
                'label_attr' => array('class' => 'control-label col-lg-2'),
                'class' => 'NoticiaBundle:Categoria',
                'property' => 'nome',
                'placeholder' => 'Escolha...',
            ))
            ->add('salvar', 'submit', array('attr' => array('class' => 'btn btn-primary pull-right')));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NoticiaBundle\Entity\Noticia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'noticiabundle_noticia';
    }
}
