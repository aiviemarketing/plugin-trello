<?php

declare(strict_types=1);

namespace MauticPlugin\AivieTrelloBundle\Integration;

use Mautic\IntegrationsBundle\Exception\IntegrationNotFoundException;
use Mautic\IntegrationsBundle\Helper\IntegrationsHelper;
use Mautic\PluginBundle\Entity\Integration;

class Config
{
    public function __construct(private IntegrationsHelper $integrationsHelper)
    {
    }

    public function isPublished(): bool
    {
        try {
            $integration = $this->getIntegrationEntity();

            return $integration->getIsPublished() ?: false;
        } catch (IntegrationNotFoundException $e) {
            return false;
        }
    }

    public function isConfigured(): bool
    {
        $apiKeys = $this->getApiKeys();

        return !empty($apiKeys['appkey']) && !empty($apiKeys['apitoken']);
    }

    /**
     * @return string[]
     */
    public function getApiKeys(): array
    {
        try {
            $integration = $this->getIntegrationEntity();

            return $integration->getApiKeys() ?: [];
        } catch (IntegrationNotFoundException $e) {
            return [];
        }
    }

    /**
     * @throws IntegrationNotFoundException
     */
    public function getIntegrationEntity(): Integration
    {
        $integrationObject = $this->integrationsHelper->getIntegration(AivieTrelloIntegration::NAME);

        return $integrationObject->getIntegrationConfiguration();
    }
}
