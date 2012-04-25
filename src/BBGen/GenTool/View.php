<?php

namespace BBGen\GenTool;

class View extends Module
{
    public function getContent()
    {
        file_put_contents('View.js', "define(function () {
  return Backbone.View.extend({
    tagName: 'tr',

    template: _.template($('#row-view').html()),

    render: function () {
      this.\$el.html(this.template(this.model.toJSON()));
      return this;
    }
  });
});");
    }
}