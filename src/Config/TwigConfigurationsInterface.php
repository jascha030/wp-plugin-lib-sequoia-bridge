<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Config;

interface TwigConfigurationsInterface
{
    /**
     * @return \Closure[]
     */
    public function getFunctions(): array;

    /**
     * @return \Closure[]
     */
    public function getFilters(): array;
}
