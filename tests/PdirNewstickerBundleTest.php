<?php

/*
 * Newsticker bundle for Contao Open Source CMS
 *
 * Copyright (c) 2020 pdir / digital agentur // pdir GmbH
 *
 * @package    newsticker-bundle
 * @link       https://pdir.de
 * @license    LGPL-3.0+
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pdir\NewsTickerBundle\Tests;

use Pdir\NewsTickerBundle\PdirNewsTickerBundle;
use PHPUnit\Framework\TestCase;

class PdirNewstickerBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new PdirNewsTickerBundle();

        $this->assertInstanceOf('Pdir\NewsTickerBundle\PdirNewsTickerBundle', $bundle);
    }
}
