<?php

namespace Jascha030\WpPluginLibSequoiaBridge\Service;

use Jascha030\Sequoia\Component\TwigComponentAbstract;
use Jascha030\Sequoia\Templater\TwigTemplater;
use Jascha030\WpPluginLibSequoiaBridge\Config\TwigConfigurationsInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\TwigFilter;
use Twig\TwigFunction;

final class ComponentLoader
{
    private Environment $environment;

    private TwigTemplater $templater;

    private TwigConfigurationsInterface $config;

    public function __construct(Environment $environment, TwigConfigurationsInterface $config)
    {
        $this->environment = $environment;
        $this->config      = $config;

        $this->initTemplater();
    }

    /**
     * @noinspection ForgottenDebugOutputInspection
     */
    public function renderComponent(string $class, array $context = []): void
    {
        if (!is_subclass_of($class, TwigComponentAbstract::class)) {
            throw new \RuntimeException("Invalid class: \"{$class}\", component should extend ".TwigComponentAbstract::class.'.');
        }

        try {
            $class::render($this->templater, $context);
        } catch (LoaderError | RuntimeError | SyntaxError $e) {
            wp_die($e->getMessage());
        }
    }

    private function initTemplater(): void
    {
        foreach ($this->config->getFunctions() as $key => $closure) {
            $this->environment->addFunction(new TwigFunction($key, $closure));
        }

        foreach ($this->config->getFilters() as $key => $closure) {
            $this->environment->addFilter(new TwigFilter($key, $closure));
        }

        $this->templater = new TwigTemplater($this->environment);
    }
}
