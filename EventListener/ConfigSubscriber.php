<?php

declare(strict_types=1);

namespace MauticPlugin\AivieTrelloBundle\EventListener;

use Mautic\ConfigBundle\ConfigEvents;
use Mautic\ConfigBundle\Event\ConfigBuilderEvent;
use Mautic\ConfigBundle\Event\ConfigEvent;
use MauticPlugin\AivieTrelloBundle\Form\ConfigType;
use MauticPlugin\AivieTrelloBundle\Integration\Config;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ConfigSubscriber implements EventSubscriberInterface
{
    /**
     * Setup Trello Configuration Subscriber.
     */
    public function __construct(private Config $config)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ConfigEvents::CONFIG_ON_GENERATE => ['onConfigGenerate', 0],
            ConfigEvents::CONFIG_PRE_SAVE    => ['onConfigSave', 0],
        ];
    }

    /**
     * Set up the configuration for Trello.
     */
    public function onConfigGenerate(ConfigBuilderEvent $event): bool
    {
        if (!$this->config->isPublished() && !$this->config->isConfigured()) {
            return false;
        }

        $event->addForm(
            [
                'formAlias'  => 'trello_config', // same as in the View filename
                'formTheme'  => '@AivieTrello/FormTheme/Config/_config_trello_config_widget.html.twig',
                'formType'   => ConfigType::class,
                'parameters' => $event->getParametersFromConfig('AivieTrelloBundle'),
            ]
        );

        return true;
    }

    /**
     * Prepare values before config is saved to file.
     */
    public function onConfigSave(ConfigEvent $event): void
    {
        $config = $event->getConfig('trello_config');

        // Set updated values
        $event->setConfig($config, 'trello_config');
    }
}
