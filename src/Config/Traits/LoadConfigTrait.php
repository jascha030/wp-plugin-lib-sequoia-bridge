<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Config\Traits;

use Jascha030\ConfigurationLib\Config\ConfigStoreInterface;

trait LoadConfigTrait
{
    private bool $loaded = false;

    abstract public function load(): ConfigStoreInterface;

    private function conditionallyLoad(): ConfigStoreInterface
    {
        if (true !== $this->loaded) {
            $this->loaded = true;

            return $this->load();
        }

        return $this;
    }
}
