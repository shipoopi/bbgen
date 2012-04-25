<?php

namespace BBGen\GenTool;

class Build implements GenToolInterface
{
    public function generate()
    {
        file_put_contents('build.js', "({
  baseUrl: './',
  name: 'js/main',
  out: 'js/main-built.js',
  paths: {
    order: 'lib/requirejs/order',
    text: 'lib/requirejs/text'
  }
})");
    }
}