<?php

use Pdir\NewsTickerBundle\Element\NewsTickerStartElement;
use Pdir\NewsTickerBundle\Element\NewsTickerStopElement;
use Pdir\NewsTickerBundle\Element\NewsTickerElement;

/**
 * Add content element
 */

$GLOBALS['TL_CTE']['newsTicker']['newsTickerStart'] = NewsTickerStartElement::class;
$GLOBALS['TL_CTE']['newsTicker']['newsTickerStop'] = NewsTickerStopElement::class;
$GLOBALS['TL_CTE']['newsTicker']['newsTickerElement'] = NewsTickerElement::class;

/**
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'newsTickerStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'newsTickerStop';
