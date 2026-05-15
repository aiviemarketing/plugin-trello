<?php

declare(strict_types=1);

namespace MauticPlugin\AivieTrelloBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;

/**
 * Class AivieTrelloIntegration.
 *
 * Handles the authorization process, integration configuration, etc.
 */
class AivieTrelloIntegration extends BasicIntegration implements BasicInterface
{
    use ConfigurationTrait;

    public const NAME         = 'AivieTrello';
    public const DISPLAY_NAME = 'Aivie Trello';

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
