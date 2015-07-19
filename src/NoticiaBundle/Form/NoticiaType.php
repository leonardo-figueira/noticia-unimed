<?php

namespace NoticiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NoticiaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('autor')
            ->add('noticia')
            ->add('imagem')
            ->add('tags')
            ->add('dtCadastro')
            ->add('dtAtualizacao')
        ;
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
