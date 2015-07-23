<?php

namespace NoticiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class CategoriaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome',null, array('attr' => array('class' => 'form-control'),
                'label_attr' => array('class' => 'control-label col-lg-2')
            ))
            ->add('versao', 'choice', array(
                'choice_list' => new ChoiceList(array(0, 1, 2), array('Ambos', 'Web', 'Mobile'))
                ))
            ->add('salvar', 'submit', array('attr' => array('class' => 'btn btn-primary pull-right')));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NoticiaBundle\Entity\Categoria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'noticiabundle_categoria';
    }
}
