<?php

namespace BBGen\Command;

use CLIFramework\Command;
use CLIFramework\CommandInterface;
use Exception;
use BBGen\GenTool;

class InitCommand extends Command implements CommandInterface
{
    /**
     *
     * @var \BBGen\Application
     */
    public $application;

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

    public function execute($dir = '.')
    {
        $this->_initGenTool();
        $this->_initWorkingDir($dir);
        $this->_checkIniFile();
        $this->_buildIniFile();
        $this->_buildDir();
    }

    protected function _initGenTool()
    {
        GenTool\Common::$application = $this->application;
    }

    protected function _initWorkingDir($dir)
    {
        $folder = new GenTool\Folder();
        $folder->realPath = $this->application->getPath($dir);
        $folder->generate();
    }

    protected function _checkIniFile()
    {
        $logger = $this->getLogger();
        $logger->info('Checking backbone.ini');
        if (file_exists($this->application->getPath($this->_ini))) {
            throw new Exception($this->_ini . ' exists. aborting.');
        }
    }

    protected function _buildIniFile()
    {
        $logger = $this->getLogger();
        $config = new GenTool\Config();
        $config->realPath = $this->application->getPath($this->_ini);
        $config->setOptions($this->getOptions());
        $config->generate();
        $logger->info('Done.');
    }

    protected function _buildDir()
    {
        $config = new \BBGen\Config($this->application->getPath($this->_ini));
        $folder = new GenTool\Folder();
        $folder->realPath = $config->dir;
        $folder->generate();
    }
}