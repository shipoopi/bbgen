<?php

namespace BBGen\GenTool;

class Router extends Module
{
    public function getContent()
    {
        return "define([
], function () {
  return Backbone.Router.extend({

    initialize: function () {
    },

    routes: {
      '': 'index',
    },

    index: function () {
    },

  });
});
";
    }
}