<?php

namespace BBGen;

class Application extends \CLIFramework\Application
{
    const app_name = 'Onion';
    const app_version = '0.0.13';

    protected $_currentWorkingDir = __DIR__;

    public function brief()
    {
        return 'BBGen - Backbone.js Module Generator.';
    }

    public function init()
    {
        parent::init();
        $this->_initCurrentWorkingDir();
        $this->registerCommand('init');
    }

    protected function _initCurrentWorkingDir()
    {
        $this->_currentWorkingDir = getcwd();
    }

    public function getCurrentWorkingDir()
    {
        return $this->_currentWorkingDir;
    }
}