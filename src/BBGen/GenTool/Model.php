<?php

namespace BBGen\GenTool;

class Model extends Module
{
    public function getContent()
    {
        return "define(function () {
  return Backbone.Model.extend({
    defaults: {
      id: null,
      first_name: '',
      last_name: ''
    },

    localStorage: new Backbone.LocalStorage('demo'),

    validate: function(attrs) {
      if (attrs.first_name === '') {
        return \"'first_name' cannot be empty\";
      }
      if (attrs.last_name === '') {
        return \"'last_name' cannot be empty\";
      }
    }
  });
});";
    }
}