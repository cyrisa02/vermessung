<?php

namespace App\Form;

use App\Entity\Measure;
use App\Entity\Provider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MeasureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Bezeichnung',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                    
                ],
                'label' => 'Beschreibung',
                'label_attr' => [
                    'class' => 'form-label  mt-4 '
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Kundenname',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('civility', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Geschlecht',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'E-mail'
            ])             
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Anschrift',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('zipcode', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Postleitzahl',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('place', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Ort',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Telefon',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'label' => 'Bitte laden Sie ein Foto im JPEG- oder PNG-Format hoch.',
                     'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Bitte laden Sie ein Foto im JPEG- oder PNG-Format hoch.',
                    ])
                ],
                
            ])
            
            ->add('width', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Breite in cm',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('length', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Länge in cm',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('providers', EntityType::class, [
                'required' => false,
                'label' => 'Lieferant',
                'class' => Provider::class,
                'attr' => [
                    'class' => 'select2 mt-4 ms-2'
                ]
            ])
                      
           
            ->add('floorname', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'Laminat',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            ->add('floornr', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-control',
                    'minlenght' => '2',
                    'maxlenght' => '190',
                ],
                'label' => 'ArtikelNr',
                'label_attr' => [
                    'class' => 'form-label  mt-4'
                ],
                
            ])
            
            //->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measure::class,
        ]);
    }
}