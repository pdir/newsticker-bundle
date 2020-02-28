<?php

namespace Pdir\NewsTickerBundle\Element;

use Contao\StringUtil;
use Contao\System;
use Contao\Config;
use Contao\FilesModel;
use Contao\BackendTemplate;

class NewsTickerElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_newsticker';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        if(TL_MODE == 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->wildcard = '### News Ticker Element ###';
            $this->Template->title = $this->text;
        }

        if($this->newsTicker_customTpl != "") {
            $this->Template->setName($this->newsTicker_customTpl);
        }

        $this->text = StringUtil::toHtml5($this->text);

        $this->Template->text = StringUtil::encodeEmail($this->text);
        $this->Template->addImage = false;

        // Add an image
        if ($this->addImage && $this->singleSRC != '') {
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if ($objModel !== null && is_file(System::getContainer()->getParameter('kernel.project_dir') . '/' . $objModel->path)) {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        // Link
        $this->url = $this->newsTicker_url;
        if (0 === strncmp($this->url, 'mailto:', 7)) {
            $this->url = StringUtil::encodeEmail($this->url);
        } else {
            $this->url = ampersand($this->url);
        }

        $this->Template->href = $this->url;
        $this->Template->target = '';
        $this->Template->rel = '';

        // Override the link target
        if ($this->target) {
            $this->Template->target = ' target="_blank"';
            $this->Template->rel = ' rel="noreferrer noopener"';
        }
    }
}
