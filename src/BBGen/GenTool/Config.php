<?php

namespace BBGen\GenTool;

class Config implements GenToolInterface
{
    public function generate()
    {
        $content = array();

        $content[] = 'lang = ' . $this->_lang;
        $content[] = 'tpl = ' . $this->_tpl;
        $content[] = 'dir = ' . $this->_dir;
        file_put_contents($this->_getPath($this->_ini), join("\n", $content));
    }
}