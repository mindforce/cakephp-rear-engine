/*
*
* Bread crumbs animation
*
*/
(function($, window, document, undefined) {

  var plugin_name = 'breadcrumbs';
  var defaultCrumbs = {
    version: '0.1.0',
    divider: '->',
    dividerClass: 'divider',
    windowResize: true,
    windowClass: '',
    showFirstTags: 2,
    showLastTags: 1,
    animation: false,
    animationTime: 300,
    hoverColor: '#ccc',
    buidlDivider: $.none,
  };

  function breadCrumbs(element, options) {
    this.element = element;
    this.$element = $(element);
    this.totalCrumbsWidth = 0;
    this.cout = 0;
    this.status = true;
    this.options = $.extend(true,{},defaultCrumbs,options);
    breadCrumbs.prototype.plugin = this;
    $('li', this.element).eq(this.options.showFirstTags-1).after('<li class="hide_crumbs" style="display: none;"><span>...</span></li>');
    this.$crumbsList = $('li', this.element);
    this._crumbsSeparator();
    this.widthList = [];
    var widthList = [];
    this.$crumbsList.each(function(){
      widthList.push($(this).outerWidth(true));
    });
    this.widthList = widthList;

    if (this.options.windowClass == '') {
      this.windowW = this.$element;
    } else {
      this.windowW = $('.'+this.options.windowClass);
    }
    this._init();
  }

  breadCrumbs.prototype = {
    version: function(){
      return this.options.version;
    },

    _init: function(){
      thise = this;
      this.totalCrumbsWidth = this._setCrumbsWidth();
      this.lastHide = this.widthList[this.options.showFirstTags]+10;
      /*

              $(this).attr('class','show');
              if ($(this).is(':last-child')) {
                $(this).addClass('last');
              }
              if ($(this).is(':first-child')) {
                $(this).addClass('first');
              }
      */
      if (this.totalCrumbsWidth > this.windowW.width()) {
        this._defaultWidth();
      }
      if (this.options.windowResize) {
        this._crumbsOnWindowResize();
      }
    },

    _crumbsSeparator: function(){
      if (this.options.buidlDivider != undefined) {
        this.options.buidlDivider;
      } else {
        var thise = this;
        if( this.options.divider != '')
        this.$crumbsList.each(function(){
          if (!$(this).is(':last-child'))
          $(this).children().after('<span class="'+thise.options.dividerClass+'">'+thise.options.divider+'</span>');
        });
      }
    },
    _setCrumbsWidth: function() {
      var thise = this;
      var result = 0;
      var pleft = parseInt(thise.$element.css('padding-left'));
      var pright = parseInt(thise.$element.css('padding-right'));
      if (pleft != 0 && pleft != undefined) {
        result += pleft;
      }
      if (pright != 0 && pright != undefined) {
        result += pright;
      }
      this.$crumbsList.each(function(){
        if ($(this).css('display') != 'none') {
          var width = $(this).outerWidth(true);
          result += width;
        }
      });
      return result;
    },
    _defaultWidth: function() {
      console.log(this.windowW);
      var crumbWidth = this.windowW.width();
      this.oldCrumbsWidth = this.totalCrumbsWidth;
      this._hideCrumb();
      this.totalCrumbsWidth = this.totalCrumbsWidth-this.widthList[this.cout+1];
      if (this.totalCrumbsWidth > crumbWidth ) {
        this._defaultWidth();
      }
    },
    _crumbsOnWindowResize: function() {
      var thise = this;
      $(window).resize(function(){
        if (thise.status) {
          var crumbWidth = thise.windowW.width();
          thise.lastHide = thise.widthList[thise.cout+1];
          if (thise.totalCrumbsWidth > crumbWidth && thise.totalCrumbsWidth != thise.oldCrumbsWidth) {
            thise.status = false;
            thise.oldCrumbsWidth = thise.totalCrumbsWidth;
            thise._hideCrumb();
          }else if (thise.oldCrumbsWidth < crumbWidth && thise.totalCrumbsWidth != thise.oldCrumbsWidth) {
            thise.status = false;
            thise._showHideCrumb();
          }
        }
      });
    },

    _hideCrumb: function(){
      if (this.cout == 0 && this._isAllCrumbs()) {
        this.cout = this.options.showFirstTags;
      } else {
        this.cout += 1;
      }
      this._animationCrumb('hide');
    },

    _showHideCrumb: function(){
      if (this.cout > this.options.showFirstTags-1) {
        this._animationCrumb('show');
        this.cout -= 1;
      } else if ($('#hide_crumbs').css('display') == 'none') {
        this.status = true;
      }
    },

    _animationCrumb: function(action){
      var element = this.$crumbsList.eq(this.cout+1);
      var thise = this;
      if (action == 'hide') {
        if (this.cout == this.options.showFirstTags && this.$crumbsList.eq(this.options.showFirstTags).hasClass('hide_crumbs')) {
          this.$crumbsList.eq(this.options.showFirstTags).attr('id','');
          if (this.options.animation) {
            element.animate({width: thise.widthList[thise.options.showFirstTags]},thise.options.animationTime,function(){
              thise.$crumbsList.eq(thise.options.showFirstTags).show();
              $(this).hide();
              thise.totalCrumbsWidth = thise._setCrumbsWidth();
              thise.status = true;
            });
          }else{
            this.$crumbsList.eq(this.options.showFirstTags).show();
            this.$crumbsList.eq(this.cout+1).hide();
            this.totalCrumbsWidth = this._setCrumbsWidth();
            this.status = true;
          }
        } else {

          if (this.options.animation) {
            element.animate({width: 0},thise.options.animationTime,function(){
              $(this).hide();
              thise.totalCrumbsWidth = thise._setCrumbsWidth();
              thise.status = true;
            });
          }else{
            element.hide();
            this.totalCrumbsWidth = this._setCrumbsWidth();
            this.status = true;
          }
        }
      } else if (action == 'show') {
        if (this.cout == this.options.showFirstTags && this.$crumbsList.eq(this.options.showFirstTags).hasClass('hide_crumbs')) {
          this.$crumbsList.eq(this.options.showFirstTags).hide();
          this.$crumbsList.eq(this.options.showFirstTags).attr('id','hide_crumbs');
          element.show();
          if (this.options.animation) {
            element.animate({width: thise.widthList[thise.cout+1]},thise.options.animationTime,function(){
              thise.totalCrumbsWidth = thise._setCrumbsWidth();
              thise.oldCrumbsWidth = thise.totalCrumbsWidth+thise.lastHide;
              thise.status = true;
            });
          } else {
            this.totalCrumbsWidth = this._setCrumbsWidth();
            this.oldCrumbsWidth = this.totalCrumbsWidth+this.lastHide;
            this.status = true;
          }
        } else {
          element.show();
          if (this.options.animation) {
            element.animate({width: thise.widthList[thise.cout+1]},thise.options.animationTime,function(){
              thise.totalCrumbsWidth = thise._setCrumbsWidth();
              thise.oldCrumbsWidth = thise.totalCrumbsWidth+thise.lastHide;
              thise.status = true;
            });
          } else {
            this.totalCrumbsWidth = this._setCrumbsWidth();
            this.oldCrumbsWidth = this.totalCrumbsWidth+this.lastHide;
            this.status = true;
          }
        }
      }
    },

    _isAllCrumbs: function(){
      this.$crumbsList.each(function(){
        if ($(this).css('display') == 'none') {
          return false;
        }
      });
      return true;
    }

  }
  $.fn.mfcrumb = function(paramerens) {

    if (typeof paramerens === 'object' || !paramerens) {
      return this.each(function() {
        if (!$.data(this,'plugin_'+plugin_name)) {
          $.data(this, 'plugin_' + plugin_name, new breadCrumbs(this, paramerens));
        } else {
          $.error('jquery.' + paramerens + ' plugin cannot be instantiated multiple times on same element');
        }
      });
    } else if (breadCrumbs.prototype[paramerens] && (paramerens.indexOf('_') === -1)) {
      plugin = $.data(this[0],'plugin_'+plugin_name);
      if (plugin) {
        return Plugin.prototype[paramerens].apply(plugin, Array.prototype.slice.call(paramerens, 1));
      } else {
        $.error('jquery.' + plugin_name + ' plugin must be initialized first on the element');
      }
    }
  };

})(jQuery, window, document);
