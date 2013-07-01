/* global icms: true */
/*
  Module: Main
  The main app module

    Method: initialize
    Initializes the routes.
    Scrape the page for widgets
*/
define([
  'jquery'
  , 'util/core/log'
  , 'app/routes'
  , 'util/require-utils/module-activator'
  , 'modules/notify/main'
  , 'modules/adminMenu/main'
  , 'modules/uitools/main'
  , 'modules/validator/main'
  , 'modules/i18n/main'
  , 'mediator'
]
, function($, log, routes, moduleActivator, notifier, adminMenu, uitools, validator, i18n, mediator) {
  var _private = {
    appendSelectOption: function(selectMenuId, optionName, optionValue){
      $('<option />', {
        'value': optionValue,
        'text': optionName,
        'selected' : 'selected'
      }).appendTo($('#' + selectMenuId));
    }
    , changeDisplay: function(id) {
      $('#' + id).toggle();
    }
    , disableElement: function(target){
      var targetDom = $('#' + target)
      , state = targetDom.attr('disabled');
      targetDom.attr('disabled', !state);
    }
    , justReturn: function() {
      return;
    }
    , makeBold: function(id) {
      var el = $('#' + id);
      el.css({
        'font-weight': el.css('font-weight') === 'bold' ? 'normal' : 'bold'
      });
    }
    , openWithSelfMain: function(url,name,width,height,returnwindow) {
      var options = 'width=' + width + ',height=' + height + ',toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no'
      , newWindow = window.open(url, name, options);

      if (typeof returnwindow !== 'undefined') {
        return newWindow;
      }
    }
    , setElementColor: function(id, color){
      $('#' + id).css({color: '#' + color});
    }
    , setElementFont: function(id, font){
      $('#' + id).css({fontFamily: font});
    }
    , setElementSize: function(id, size){
      $('#' + id).css({fontSize: size});
    }
    , setVisible: function(id) {
      $('#' + id).css({visibility: 'visible'});
    }
    , setHidden: function(id) {
      $('#' + id).css({visibility: 'hidden'});
    }
    , showImgSelected: function(imgId, selectId, imgDir, extra, icmsUrl) {
      var url = typeof(icmsUrl === 'undefined') ? './' : icmsUrl
      , imgDom = $('#' + imgId)
      , selectDom = $('#' + selectId);

      if (selectDom.options[selectDom.selectedIndex].value !== '') {
        imgDom.src = url + '/' + imgDir + '/' + selectDom.options[selectDom.selectedIndex].value + extra;
      } else {
        imgDom.src = url + '/images/blank.gif';
      }
    }
    , xoopsGetElementById: function(id) {
      return $('#' + id);
    }
    , xoopsGetFormElement: function(fname, ctlname) {
      var el = $('form[name=' + fname + ']').find('input[name=' + ctlname + ']');
      return el.length ? el : null;
    }
    , xoopsSavePosition: function(id) {
      var textareaDom = $('#' + id);
      if (textareaDom.createTextRange) {
        textareaDom.caretPos = document.selection.createRange().duplicate();
      }
    }
    , xoopsSetElementProp: function(name, prop, val) {
      var elt = $('#' + name);
      if (typeof elt !== 'undefined') {
        elt.attr(prop, val);
      }
    }
  }
  , app = {
    initialize: function() {
      $.extend(window, _private);
      mediator.publish('commonReady');

      log.initialize();
      routes.initialize();
      moduleActivator.execute();
      // common.initialize();
      if(icms.config.adminMenu !== false) {
        adminMenu.initialize();
      }
      uitools.initialize();
      validator.initialize();

      if(icms.config.i18n !== false) {
        i18n.initialize();
      }

      $(document).ready(function() {
        $('a[rel="external"]').click(function(){
          $(this).attr('target', '_blank');
        });

        if(icms.redirectmessage !== false) {
          notifier.initialize(icms.redirectMessage);
        }
        mediator.subscribe('addNotification', function(message, options) {
          notifier.showMessage(message, options);
        });
      });
    }
  };
  return app;
});