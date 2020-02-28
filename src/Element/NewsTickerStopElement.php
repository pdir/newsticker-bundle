<?php

namespace Pdir\NewsTickerBundle\Element;

use Contao\BackendTemplate;

class NewsTickerStopElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_newsticker_stop';


    /**
     * Generate the content element
     */
    protected function compile()
    {
        if(TL_MODE == 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->wildcard = '### News Ticker Stop ###';
            $this->Template->title = $this->text;
        }

        if($this->newsTickerStop_customTpl != "") {
            $this->Template->setName($this->newsTickerStop_customTpl);
        }
    }
}
