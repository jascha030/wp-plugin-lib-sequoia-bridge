<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Config;

interface ThemeConfigurationsInterface
{
    /**
     * Get all theme support values used for `add_theme_support()`.
     */
    public function getThemeSupports(): array;

    /**
     * All standard filter/action hooks to be removed.
     * Uses `remove_filter()`.
     */
    public function getFilterRemovals(): array;

    /**
     * Get constants.
     */
    public function getConstants(): array;
}
