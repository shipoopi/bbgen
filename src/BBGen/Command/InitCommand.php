<?php

namespace BBGen\Command;

use CLIFramework\Command;
use CLIFramework\CommandInterface;
use Exception;

class InitCommand extends Command implements CommandInterface
{

    public function brief()
    {
        return 'initialize backbone.ini file';
    }

    public function options($opts)
    {
        $opts->add('lang:', 'Language of project, should be `js` or `coffee`.');
        $opts->add('tpl:', 'Template engine, default value is `underscore`.');
        $opts->add('dir:', 'Language directory, default value is `js`.');
    }

    protected $_ini = 'backbone.ini';
    protected $_lang = 'js';
    protected $_tpl = 'underscore';
    protected $_dir = 'js';
    protected $_workingDir = '.';

    public function execute($args)
    {
        $this->_initWorkingDir($args);
        $this->_checkIniFile();
        $this->_setOptions();
        $this->_buildIniFile();
        $this->_buildDir();
    }

    protected function _getPath($file)
    {
        return $this->_workingDir . '/' . ltrim($file, '/');
    }

    protected function _initWorkingDir($args)
    {
        $cwd = $this->application->getCurrentWorkingDir();
        $this->_workingDir = $cwd . '/' . ltrim($args, '/');
        if (!file_exists($this->_workingDir)) {
            mkdir($this->_workingDir, 0777, true);
        }
    }

    protected function _checkIniFile()
    {
        $logger = $this->getLogger();
        $logger->info('Checking backbone.ini');
        if (file_exists($this->_getPath($this->_ini))) {
            throw new Exception($this->_ini . ' exists. aborting.');
        }
    }

    protected function _setOptions()
    {
        $options = $this->getOptions();
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

    protected function _buildIniFile()
    {
        $logger = $this->getLogger();
        $content = array();

        $content[] = 'lang = ' . $this->_lang;
        $content[] = 'tpl = ' . $this->_tpl;
        $content[] = 'dir = ' . $this->_dir;
        file_put_contents($this->_getPath($this->_ini), join("\n", $content));

        $logger->info('Done.');
    }

    protected function _buildDir()
    {
        $ini = (object) parse_ini_file($this->_getPath($this->_ini));
        $dir = $this->_getPath($ini->dir);
        if (!is_dir($dir)) {
            mkdir($dir);
        }
    }
}