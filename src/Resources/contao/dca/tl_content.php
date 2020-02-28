<?php

$table = 'tl_content';

/**
 * Add palette to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['newsTickerStart'] = '
    {type_legend},type;{news_ticker_legend},newsTicker_direction,newsTicker_speed,newsTicker_interval,newsTicker_height,newsTicker_visible,newsTicker_mousePause,newsTicker_showControls;{template_legend:hide},newsTickerStart_customTpl;{expert_legend:hide},guests,cssID;
    {invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['newsTickerStop'] = '
    {type_legend},type;{template_legend:hide},newsTickerStop_customTpl;{invisible_legend:hide},invisible';

$GLOBALS['TL_DCA']['tl_content']['palettes']['newsTickerElement'] = '{type_legend},type,headline;{text_legend},text;
    {link_legend},newsTicker_url,target;{image_legend},addImage;{template_legend:hide},newsTicker_customTpl;
    {expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA'][$table]['fields']['newsTickerStart_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['newsTicker_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_newsticker', 'getNewsTickerStartTemplates'],
    'eval' => ['includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'],
    'sql' => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTickerStop_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['newsTicker_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_newsticker', 'getNewsTickerStopTemplates'],
    'eval' => ['includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'],
    'sql' => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_customTpl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['newsTicker_customTpl'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => ['tl_content_newsticker', 'getNewsTickerTemplates'],
    'eval' => ['includeBlankOption'=>true, 'chosen'=>true, 'tl_class'=>'w50'],
    'sql' => "varchar(64) NOT NULL default ''"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_url'] = [
    'label' => &$GLOBALS['TL_LANG']['MSC']['url'],
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => array('mandatory'=>false, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'addWizardClass'=>false, 'tl_class'=>'w50'),
    'sql' => "varchar(255) NOT NULL default ''"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_direction'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_direction'],
    'exclude' => true,
    'inputType' => 'select',
    'options' => $GLOBALS['TL_LANG'][$table]['newsTicker_direction']['options'],
    'eval' => ['includeBlankOption'=>true, 'tl_class'=>'w50'],
    'sql' => "varchar(255) NOT NULL default 'up'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_speed'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_speed'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength'=>10, 'tl_class'=>'w50'],
    'sql' => "varchar(10) NOT NULL default 'slow'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_interval'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_interval'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength'=>10, 'tl_class'=>'w50'],
    'sql' => "varchar(10) NOT NULL default '2000'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_height'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_height'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength'=>10, 'tl_class'=>'w50'],
    'sql' => "varchar(10) NOT NULL default 'auto'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_visible'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_visible'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength'=>3, 'tl_class'=>'w50'],
    'sql' => "varchar(3) NOT NULL default '0'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_mousePause'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_mousePause'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class'=>'w50 clr'],
    'sql' => "char(1) NOT NULL default '1'"
];

$GLOBALS['TL_DCA'][$table]['fields']['newsTicker_showControls'] = [
    'label' => &$GLOBALS['TL_LANG'][$table]['newsTicker_showControls'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class'=>'w50'],
    'sql' => "char(1) NOT NULL default '1'"
];

class tl_content_newsticker extends Backend {
    /**
     * Return all content element templates as array
     *
     * @param DataContainer $dc
     *
     * @return array
     */
    public function getNewsTickerStartTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_newsticker_start');
    }

    public function getNewsTickerStopTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_newsticker_stop');
    }

    public function getNewsTickerTemplates(DataContainer $dc)
    {
        return $this->getTemplateGroup('ce_newsticker');
    }
}
