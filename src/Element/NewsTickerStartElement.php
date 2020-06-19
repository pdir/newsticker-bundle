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

namespace Pdir\NewsTickerBundle\Element;

use Contao\BackendTemplate;

class NewsTickerStartElement extends \ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_newsticker_start';

    /**
     * Generate the content element.
     */
    protected function compile()
    {
        if (TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->wildcard = '### News Ticker Start ###';
            $this->Template->title = $this->text;
        }

        if ('' !== $this->newsTickerStart_customTpl) {
            $this->Template->setName($this->newsTickerStart_customTpl);
        }

        if ('' === $this->newsTicker_direction) {
            $this->newsTicker_direction = 'up';
        }
        if ('' === $this->newsTicker_speed) {
            $this->newsTicker_speed = "'slow'";
        }
        if ('' === $this->newsTicker_interval) {
            $this->newsTicker_interval = '2000';
        }
        if ('0' === $this->newsTicker_interval) {
            $this->newsTicker_interval = '99999999';
        }
        if ('' === $this->newsTicker_height) {
            $this->newsTicker_height = 'auto';
        }
        if ('' === $this->newsTicker_visible) {
            $this->newsTicker_visible = '0';
        }
        if ('' === $this->newsTicker_mousePause) {
            $this->newsTicker_mousePause = '0';
        }

        if ('slow' === $this->newsTicker_speed || 'medium' === $this->newsTicker_speed || 'fast' === $this->newsTicker_speed) {
            $this->newsTicker_speed = "'".$this->newsTicker_speed."'";
        }

        $this->Template->direction = $this->newsTicker_direction;
        $this->Template->speed = $this->newsTicker_speed;
        $this->Template->interval = $this->newsTicker_interval;
        $this->Template->height = $this->newsTicker_height;
        $this->Template->visible = $this->newsTicker_visible;
        $this->Template->mousePause = $this->newsTicker_mousePause;
        $this->Template->showControls = $this->newsTicker_showControls;
    }
}
