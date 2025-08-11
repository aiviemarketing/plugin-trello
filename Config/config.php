<?php

declare(strict_types=1);
use MauticPlugin\MauticTrelloBundle\Integration\Support\ConfigSupport;
use MauticPlugin\MauticTrelloBundle\Integration\TrelloIntegration;

return [
    'name'        => 'Mautic Trello',
    'description' => 'Create Trello cards from Mautic contacts',
    'version'     => '2.0.0',
    'author'      => 'Aivie',
    'routes'      => [
        'main' => [
            'plugin_create_cards_show_new' => [
                'path'       => '/trello/card/show-new/{contactId}',
                'controller' => 'MauticPlugin\MauticTrelloBundle\Controller\CardController::showNewCardAction',
            ],
            'plugin_trello_card_add' => [
                'path'        => '/trello/card',
                'method'      => 'POST',
                'controller'  => 'MauticPlugin\MauticTrelloBundle\Controller\CardController::addAction',
                'returnRoute' => '',
            ],
        ],
    ],
    'parameters' => [
        'favorite_board' => '',
    ],
    'services' => [
        'integrations' => [
            // Basic definitions with name, display name and icon
            'mautic.integration.trello'               => [
                'class' => TrelloIntegration::class,
                'tags'  => [
                    'mautic.integration',
                    'mautic.basic_integration',
                ],
            ],
            // Provides the form types to use for the configuration UI
            'trello.integration.configuration' => [
                'class'     => ConfigSupport::class,
                'tags'      => [
                    'mautic.config_integration',
                ],
            ],
        ],
    ],
];
