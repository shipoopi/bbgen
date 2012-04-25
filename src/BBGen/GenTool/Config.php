<?php

namespace BBGen\GenTool;

class Config extends File
{
    protected $_lang = 'js';
    protected $_tpl = 'underscore';
    protected $_dir = 'js';

    public function setOptions($options)
    {
//        $options = $this->getOptions();
        if (isset($options->lang) && in_array($options->lang, array('js', 'coffee'))) {
            $this->_lang = $options->lang;
        }
        if (isset($options->tpl)) {
            $this->_tpl = $options->tpl;
        }
        if (isset($options->dir)) {
            $this->_dir = $options->dir;
        }
    }

    public function getContent()
    {
        $content = array();
        $content[] = 'lang = ' . $this->_lang;
        $content[] = 'tpl = ' . $this->_tpl;
        $content[] = 'dir = ' . $this->_dir;
        return join("\n", $content);
    }
}