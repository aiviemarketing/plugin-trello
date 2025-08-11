<?php

declare(strict_types=1);

namespace MauticPlugin\MauticTrelloBundle\Integration;

use Mautic\IntegrationsBundle\Integration\BasicIntegration;
use Mautic\IntegrationsBundle\Integration\ConfigurationTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\BasicInterface;

/**
 * Class TrelloIntegration.
 *
 * Handles the authorization process, integration configuration, etc.
 */
class TrelloIntegration extends BasicIntegration implements BasicInterface
{
    use ConfigurationTrait;

    public const NAME         = 'Trello';
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
        return 'plugins/MauticTrelloBundle/Assets/img/trello.png';
    }
}
