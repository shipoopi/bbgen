<?php

namespace BBGen\GenTool;

class Folder extends Common
{
    public function generate()
    {
        if (!file_exists($this->realPath)) {
            mkdir($this->realPath, 0777, true);
        }
    }
}
