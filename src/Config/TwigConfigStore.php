<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Config;

use Jascha030\ConfigurationLib\Config\ConfigStore;

class TwigConfigStore extends ConfigStore implements TwigConfigurationsInterface
{
    use LoadConfigTrait;

    /**
     * {@inheritDoc}
     */
    public function getFunctions(): array
    {
        $config = $this->getTwigConfig();

        return $config['functions'] ?? [];
    }

    /**
     * {@inheritDoc}
     */
    public function getFilters(): array
    {
        $config = $this->getTwigConfig();

        return $config['filters'] ?? [];
    }

    private function getTwigConfig(): array
    {
        return $this->conditionallyLoad()->getConfig('twig');
    }
}
