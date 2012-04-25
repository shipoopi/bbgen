<?php

namespace BBGen\GenTool;

class Module extends File
{
    public function getContent()
    {
        return "define([
], function () {
  return {};
});
";
    }
}