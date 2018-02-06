<?php

namespace FDevs\ExportRouting\Tests;

use FDevs\ExportRouting\Extractor\ExposedInterface;
use FDevs\ExportRouting\Extractor\OptionExposed;
use FDevs\ExportRouting\RoutesExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Router;
use Symfony\Component\Config\FileLocator;

class RoutesExtractorTest extends TestCase
{

    public function testEmptyGetRoutes()
    {
        $extractor = $this->createRoutesExtractor('routing.php');
        $routes = $extractor->getRoutes();
        $this->assertEquals(0, $routes->count());
    }

    public function testOptionGetRoutes()
    {
        $extractor = $this->createRoutesExtractor('option_routing.php');
        $routes = $extractor->getRoutes();
        $this->assertEquals(1, $routes->count());
    }

    public function testGetContext()
    {
        $extractor = $this->createRoutesExtractor('routing.php');
        $context = $extractor->getContext();
        $this->assertEquals('', $context->getBaseUrl());

    }

    private function createRoutesExtractor(string $resource = 'routing.php', ExposedInterface $exposed = null)
    {
        $loader = new PhpFileLoader(new FileLocator(array(__DIR__ . '/Fixtures')));
        $router = new Router($loader, $resource);
        $exposed = $exposed ?? new OptionExposed();
        return new RoutesExtractor($router, $exposed);

    }

}