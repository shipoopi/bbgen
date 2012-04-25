<?php

namespace BBGen\GenTool;

abstract class File extends Common
{
    abstract public function getContent();

    public function isExists()
    {
        return file_exists($this->realPath);
    }

    public function generate()
    {
        file_put_contents($this->realPath, $this->getContent());
    }
}