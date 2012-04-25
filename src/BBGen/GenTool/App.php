<?php

namespace BBGen\GenTool;

class App extends Module
{
    public function generate()
    {
        file_put_contents('app.js', "define([
  'js/router/Router'
], function (Router) {
  return {
    initialize: function () {
      new Router;
      Backbone.history.start();
    }
  }
});
");
    }
}