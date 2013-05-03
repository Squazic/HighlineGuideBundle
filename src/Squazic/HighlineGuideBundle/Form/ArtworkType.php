<?php

namespace Squazic\HighlineGuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArtworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('latitude')
            ->add('longitude')
            ->add('artist')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Squazic\HighlineGuideBundle\Entity\Artwork'
        ));
    }

    public function getName()
    {
        return 'squazic_highlineguidebundle_artworktype';
    }
}
