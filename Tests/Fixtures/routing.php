<?php

/*
 * This file is part of the 4devs Export Routing package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$collection = new \Symfony\Component\Routing\RouteCollection();

$collection->add('homepage', new \Symfony\Component\Routing\Route('/'));

return $collection;
