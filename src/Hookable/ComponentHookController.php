<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Hookable;

use Jascha030\PluginLib\Service\Hookable\LazyHookableInterface;
use Jascha030\PluginLib\Service\Traits\LazyHookableTrait;
use Jascha030\WpPluginLibSequoiaBridge\Config\ThemeConfigStore;

class ComponentHookController extends LazyHookableInterface
{
    use LazyHookableTrait;

    private ThemeConfigStore $configStore;

    public function __construct(ThemeConfigStore $configStore)
    {
        $this->configStore = $configStore;
    }

    /**
     * Hooks all components defined in config/components.php.
     */
    public function hookComponents(): void
    {
        foreach ($this->configStore->getComponentHooks() as $tag => $hook) {
            hook_component($tag, ...$hook);
        }
    }
}
