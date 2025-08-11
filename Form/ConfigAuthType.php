<?php

declare(strict_types=1);

namespace MauticPlugin\MauticTrelloBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigAuthType extends AbstractType
{
    /**
     * @param FormBuilderInterface<FormBuilderInterface> $builder
     * @param mixed[]                                    $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $apiToken       = null;
        $configProvider = $options['integration'];
        if ($configProvider->getIntegrationConfiguration() && $configProvider->getIntegrationConfiguration()->getApiKeys()) {
            $data     = $configProvider->getIntegrationConfiguration()->getApiKeys();
            $apiToken = $data['apitoken'] ?? null;
        }

        $builder->add(
            'appkey',
            TextType::class,
            [
                'label'      => 'mautic.trello.integration.appkey',
                'label_attr' => ['class' => 'control-label'],
                'required'   => true,
                'attr'       => [
                    'class' => 'form-control',
                ],
            ]
        );

        $builder->add(
            'apitoken',
            PasswordType::class,
            [
                'label'      => 'mautic.trello.integration.apitoken',
                'label_attr' => ['class' => 'control-label'],
                'required'   => true,
                'attr'       => [
                    'class' => 'form-control',
                ],
                'empty_data' => $apiToken,
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'integration' => null,
            ]
        );
    }
}
