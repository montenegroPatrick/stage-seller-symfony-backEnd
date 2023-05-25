<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'type' => 'email',
                    'id' => 'floating_email',
                    'name' => 'floating_email',
                ]
            ])
            ->add('password', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                'autocomplete' => 'new-password',
                'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                'type' => 'password',
                'id' => 'floating_password',
                'name' => 'floating_password',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez le mot de pase',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 72,
                    ]),
                ],
            ])
            ->add('password_confirmed', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                'autocomplete' => 'new-password',
                'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                'type' => 'password',
                'id' => 'floating_password_confirm',
                'name' => 'floating_password_confirm',
                ],
                "mapped" => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez le mot de pase',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 72,
                    ]),
                ],
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'ADMIN' => 'ADMIN',
                    'COMPANY' => 'COMPANY',
                    'STUDENT' => 'STUDENT'
                ],
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'type',
                    'name' => 'type',
                    'id' => 'floating_type',
                    'name' => 'floating_type',
                ]
            ])
            ->add('isUserActive', ChoiceType::class, [
                'choices'  => [
                    'True' => true,
                    'False' => false,
                ],
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'isUserActive',
                    'name' => 'isUserActive',
                    'id' => 'floating_isUserActive',
                    'name' => 'floating_isUserActive',
                ]
            ])
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'floating_first_name',
                    'name' => 'floating_first_name',
                ]
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'floating_last_name',
                    'name' => 'floating_last_name',
                ]
            ])
            ->add('address', TextType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'floating_address',
                    'name' => 'floating_address',
                ]
            ])
            ->add('postcode', TextType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'floating_postcode',
                    'name' => 'floating_postcode',
                ]
            ])
            ->add('city', TextType::class, [
                'attr' => [
                    'class' => 'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                    'id' => 'floating_city',
                    'name' => 'floating_city',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
