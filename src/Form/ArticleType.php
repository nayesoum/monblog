<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr' =>[
                    'class'=>'form-control',
                    'minlenght' =>'2',
                    'maxlenght' =>'200',
                ],
                'label'=>'Titre de l article',
                'label_attr' =>[
                    'class'=> 'form-label mt-3'
                ]
            ])
            ->add('Content', TextareaType::class,[
                'attr' =>[
                    'class'=>'form-control',
                ],
                'label'=>'Description',
                'label_attr' =>[
                    'class'=> 'form-label mt-3'
                ]
            ])
             ->add('image', 
             //FileType::class,
            // [
            //     'mapped' => false,
            //     'constraints' => [
            //         new File([
            //             'maxSize' => '2000k',
            //         ])
            //     ],
            // ]
            )

            ->add('user')
            ->add('category')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
