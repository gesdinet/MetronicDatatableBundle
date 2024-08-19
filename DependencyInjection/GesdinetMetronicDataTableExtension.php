<?php

/*
 * This file is part of the Gesdinet MetronicDataTableBundle package.
 *
 * (c) Gesdinet <marcos@gesdinet.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gesdinet\MetronicDataTableBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages the bundle configuration.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class GesdinetMetronicDataTableExtension extends Extension implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('datatables.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container): void
    {
        if (!$container->has('datatables')) {
            return;
        }

        $definition = $container->findDefinition('datatables');
        $services = $container->findTaggedServiceIds('datatable');

        /** @var array $tags */
        foreach ($services as $id => $tags) {
            foreach ($tags as $tag) {
                $definition->addMethodCall('addService', [
                    new Reference($id),
                    $tag['id'] ?? null,
                ]);
            }
        }
    }
}
