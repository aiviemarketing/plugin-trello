<?php

declare(strict_types=1);

namespace MauticPlugin\MauticTrelloBundle\Integration\Support;

use Mautic\IntegrationsBundle\DTO\Note;
use Mautic\IntegrationsBundle\Integration\ConfigFormNotesTrait;
use Mautic\IntegrationsBundle\Integration\DefaultConfigFormTrait;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormAuthInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormInterface;
use Mautic\IntegrationsBundle\Integration\Interfaces\ConfigFormNotesInterface;
use MauticPlugin\MauticTrelloBundle\Form\ConfigAuthType;
use MauticPlugin\MauticTrelloBundle\Integration\TrelloIntegration;

class ConfigSupport extends TrelloIntegration implements ConfigFormInterface, ConfigFormAuthInterface, ConfigFormNotesInterface
{
    use DefaultConfigFormTrait;
    use ConfigFormNotesTrait;

    public function getAuthConfigFormName(): string
    {
        return ConfigAuthType::class;
    }

    public function getAuthorizationNote(): ?Note
    {
        return new Note('mautic.trello.integration.info', Note::TYPE_INFO);
    }
}
