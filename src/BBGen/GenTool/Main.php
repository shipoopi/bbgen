<?php

namespace BBGen\GenTool;

class Main extends Common
{
    public function getContent()
    {
        return "require({
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
";
    }
}