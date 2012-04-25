<?php

namespace BBGen\GenTool;

class Collection extends Module
{
    public function generate()
    {
        file_put_contents('Collection.js', "define([
  'js/model/Model'
], function (Model) {
  return Backbone.Collection.extend({
    model: Model
  });
});");
    }
}