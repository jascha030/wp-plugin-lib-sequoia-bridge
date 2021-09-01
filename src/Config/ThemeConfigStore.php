<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Config;

use Jascha030\ConfigurationLib\Config\ConfigStore;
use Jascha030\WpPluginLibSequoiaBridge\Config\Traits\LoadConfigTrait;

final class ThemeConfigStore extends ConfigStore implements ThemeConfigurationsInterface
{
    use LoadConfigTrait;

    /**
     * {@inheritdoc}
     */
    public function getThemeSupports(): array
    {
        return $this->conditionallyLoad()->getConfig('supports');
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterRemovals(): array
    {
        return $this->conditionallyLoad()->getConfig('removals');
    }

    /**
     * {@inheritdoc}
     */
    public function getConstants(): array
    {
        return $this->conditionallyLoad()->getConfig('constants');
    }

    public function getComponentHooks(): array
    {
        return $this->conditionallyLoad()->getConfig('components');
    }
}
