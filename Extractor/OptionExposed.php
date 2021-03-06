<?php

/*
 * This file is part of the 4devs Export Routing package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FDevs\ExportRouting\Extractor;

use Symfony\Component\Routing\Route;

class OptionExposed implements ExposedInterface
{
    /**
     * @var string
     */
    private $option;

    /**
     * OptionExposed constructor.
     *
     * @param string $option
     */
    public function __construct(string $option = 'expose')
    {
        $this->option = $option;
    }

    /**
     * {@inheritdoc}
     */
    public function isRouteExposed(Route $route, string $name): ?bool
    {
        $option = $route->getOption($this->option);
        if (null !== $option) {
            $option = \filter_var($option, \FILTER_VALIDATE_BOOLEAN);
        }

        return $option;
    }
}
