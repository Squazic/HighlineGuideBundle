<?php

namespace Squazic\HighlineGuideBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('artwork', 'entity', array(
                'class' => 'SquazicHighlineGuideBundle:Artwork',
                'multiple' => true,
                'required' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Squazic\HighlineGuideBundle\Entity\Artist'
        ));
    }

    public function getName()
    {
        return 'squazic_highlineguidebundle_artisttype';
    }
}
