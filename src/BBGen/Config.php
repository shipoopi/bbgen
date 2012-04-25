<?php

namespace BBGen;

class Config
{
    protected $_options = array();

    public function __construct($file)
    {
        $this->_options = parse_ini_file($file);
    }

    public function __get($name)
    {
        return isset($this->_options[$name])
               ? $this->_options[$name]
               : null;
    }
}