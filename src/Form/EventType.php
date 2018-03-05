<?php


namespace App\Form;

use App\Entity\Event;
use App\Entity\Sport;
use App\Entity\Place;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // ->add('date', DateType::class)
            ->add('date', DateTimeType::class, array(
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'placeholder' => 'Select a value',
                'placeholder' => 'yyyy-mm-dd',
                'attr' => array(
                    'data-date-end-date' => '0d'
                ),
                'html5' => false,
                'required' => true
            ))
            ->add('place', EntityType::class, array(
                'class' => Place::class,
                'choice_label' => 'name',
            ))
            ->add('sport', EntityType::class, array(
                'class' => Sport::class,
                'choice_label' => 'name',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Event::class,
        ));
    }
}
