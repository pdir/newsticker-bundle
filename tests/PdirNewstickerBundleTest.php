<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Pdir\NewsTickerBundle\Tests;

use Pdir\NewsTickerBundle\PdirNewsTickerBundle;
use PHPUnit\Framework\TestCase;

class PdirNewsTickerBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new PdirNewsTickerBundle();

        $this->assertInstanceOf('Pdir\NewsTickerBundle\PdirNewsTickerBundle', $bundle);
    }
}
