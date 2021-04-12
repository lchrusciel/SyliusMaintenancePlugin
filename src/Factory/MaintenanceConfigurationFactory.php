<?php

declare(strict_types=1);

namespace Synolia\SyliusMaintenancePlugin\Factory;

use Synolia\SyliusMaintenancePlugin\FileManager\ConfigurationFileManager;
use Synolia\SyliusMaintenancePlugin\Model\MaintenanceConfiguration;

final class MaintenanceConfigurationFactory
{
    private ConfigurationFileManager $configurationFileManager;

    public function __construct(ConfigurationFileManager $configurationFileManager)
    {
        $this->configurationFileManager = $configurationFileManager;
    }

    public function get(): MaintenanceConfiguration
    {
        $maintenanceConfiguration = new MaintenanceConfiguration();
        if (!$this->configurationFileManager->fileExists(ConfigurationFileManager::MAINTENANCE_FILE)) {
            return $maintenanceConfiguration;
        }

        $maintenanceConfiguration = $maintenanceConfiguration->map($this->configurationFileManager->parseMaintenanceYaml());

        if ('' === $maintenanceConfiguration->getCustomMessage()) {
            return $maintenanceConfiguration;
        }

        if ($this->configurationFileManager->fileExists(ConfigurationFileManager::MAINTENANCE_TEMPLATE)) {
            $content = file_get_contents($this->configurationFileManager->getPathtoFile(ConfigurationFileManager::MAINTENANCE_TEMPLATE));
            if (!is_string($content)) {
                $content = '';
            }
            $maintenanceConfiguration->setCustomMessage($content);
        }

        return $maintenanceConfiguration;
    }
}
