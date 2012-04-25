<?php

namespace BBGen\GenTool;

abstract class Common
{
    /**
     *
     * @var \BBGen\Application
     */
    public static $application = null;

    public $realPath = '';

    abstract public function generate();
}