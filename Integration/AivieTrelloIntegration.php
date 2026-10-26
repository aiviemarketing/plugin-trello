<?php

declare(strict_types=1);

namespace MauticPlugin\AivieTrelloBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;

/**
 * Class AivieTrelloIntegration.
 *
 * Handles the authorization process, integration configuration, etc.
 */
// Config/config.php explicitly registers the basic integration. Support subclasses must not
// inherit BasicInterface and be auto-tagged as additional basic integrations.
class AivieTrelloIntegration extends BasicIntegration
{
    use ConfigurationTrait;

    public const NAME         = 'AivieTrello';
    public const DISPLAY_NAME = 'Trello';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDisplayName(): string
    {
        return self::DISPLAY_NAME;
    }

    public function getIcon(): string
    {
        return 'plugins/AivieTrelloBundle/Assets/img/trello.png';
    }
}
