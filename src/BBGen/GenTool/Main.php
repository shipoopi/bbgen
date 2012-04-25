<?php

namespace BBGen\GenTool;

class Main implements GenToolInterface
{
    public function generate()
    {
        file_put_contents('main.js', "require({
  baseUrl: './',
  paths: {
    order: 'lib/requirejs/order',
    text: 'lib/requirejs/text'
  }
});

require([
  'order!lib/jquery/jquery-min',
  'order!lib/underscore/underscore-min',
  'order!lib/backbone/backbone-min',
  'order!js/app',
], function () {
  App = _.last(arguments);
  App.initialize();
});
");
    }
}