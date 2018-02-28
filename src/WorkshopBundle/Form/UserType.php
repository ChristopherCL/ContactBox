<?php

namespace WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')->add('surname')->add('description')->add('address', EntityType::class,	[
				'class'	=> 'WorkshopBundle:Address',
				'choice_label' => 'fullAddress'])->add('groups', EntityType::class,	[
				'class'	=> 'WorkshopBundle:Groups',
				'choice_label' => 'groupName',
                                'multiple' => true,
                                ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorkshopBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'workshopbundle_user';
    }


}
