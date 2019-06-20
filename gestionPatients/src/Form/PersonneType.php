<?php

namespace App\Form;

use App\Entity\Personne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneType extends AbstractType
{
            /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin')
            ->add('cne')
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('sexe')
            ->add('pays')
            ->add('ville')
            ->add('adresse')
            ->add('etablissement')
            ->add('isHandicap')
            ->add('handicap')
            ->add('dateCreation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
