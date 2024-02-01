<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Project;
use App\Entity\Technology;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('gitHubLink')
            ->add('picture')
            ->add('date')
            ->add('technology', EntityType::class, [
                'class' => Technology::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
'choice_label' => 'id',
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
