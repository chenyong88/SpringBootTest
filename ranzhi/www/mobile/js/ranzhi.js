if($.TapName == 'tap') $.TapName = 'touchstart';

/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */

!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(Zepto)}(function(a){function c(a){return a}function d(a){return decodeURIComponent(a.replace(b," "))}function e(a){0===a.indexOf('"')&&(a=a.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\"));try{return f.json?JSON.parse(a):a}catch(b){}}var b=/\+/g,f=a.cookie=function(b,g,h){var i,j,k,l,m,n,o,p,q,r;if(void 0!==g)return h=a.extend({},f.defaults,h),"number"==typeof h.expires&&(i=h.expires,j=h.expires=new Date,j.setDate(j.getDate()+i)),g=f.json?JSON.stringify(g):String(g),document.cookie=[f.raw?b:encodeURIComponent(b),"=",f.raw?g:encodeURIComponent(g),h.expires?"; expires="+h.expires.toUTCString():"",h.path?"; path="+h.path:"",h.domain?"; domain="+h.domain:"",h.secure?"; secure":""].join("");for(k=f.raw?c:d,l=document.cookie.split("; "),m=b?void 0:{},n=0,o=l.length;o>n;n++){if(p=l[n].split("="),q=k(p.shift()),r=k(p.join("=")),b&&b===q){m=e(r);break}b||(m[q]=e(r))}return m};f.defaults={},a.removeCookie=function(b,c){return void 0!==a.cookie(b)?(a.cookie(b,"",a.extend({},c,{expires:-1})),!0):!1}});

// Set entry skins color
!(function()
{
    $.Skin.set(
    {
        dashboard:   '#3f51b5',
        'default':   '#3f51b5',
        superadmin:  '#607D8B',
        crm:         '#03a9f4',
        cash:        '#ef6c00',
        oa:          '#f44336',
        proj:        '#f44336',
        doc:         '#f44336',
        team:        '#4caf50',
        hr:          '#4caf50',
        psi:         '#4caf50',
        flow:        '#4caf50'
    });
}());

/**
 * Create link. 
 * 
 * @param  string $moduleName 
 * @param  string $methodName 
 * @param  string $vars 
 * @param  string $viewType 
 * @access public
 * @return string
 */
function createLink(moduleName, methodName, vars, viewType)
{
    if(!viewType) viewType = config.defaultView;
    if(vars)
    {
        vars = vars.split('&');
        for(i = 0; i < vars.length; i ++) vars[i] = vars[i].split('=');
    }

    appName = config.appName;
    router  = config.router;

    if(moduleName.indexOf('.') >= 0)
    {
        moduleNames = moduleName.split('.');
        appName     = moduleNames[0];
        moduleName  = moduleNames[1];
        router      = router.replace(config.appName, appName);
    }

    if(config.requestType == 'PATH_INFO')
    {
        link = config.webRoot + appName + '/' + moduleName + config.requestFix + methodName;
        if(vars)
        {
            if(config.pathType == "full")
            {
                for(i = 0; i < vars.length; i ++) link += config.requestFix + vars[i][0] + config.requestFix + vars[i][1];
            }
            else
            {
                for(i = 0; i < vars.length; i ++) link += config.requestFix + vars[i][1];
            }
        }
        link += '.' + viewType;
    }
    else
    {
        link = router + '?' + config.moduleVar + '=' + moduleName + '&' + config.methodVar + '=' + methodName + '&' + config.viewVar + '=' + viewType;
        if(vars) for(i = 0; i < vars.length; i ++) link += '&' + vars[i][0] + '=' + vars[i][1];
    }
    return link;
}

/**
 * Set language.
 * 
 * @access public
 * @return void
 */
function selectLang(lang)
{
    $.cookie('lang', lang, {expires:config.cookieLife, path:config.webRoot});
    location.href = removeAnchor(location.href);
}

/**
 * Set theme.
 * 
 * @access public
 * @return void
 */
function selectTheme(theme)
{
    $.cookie('theme', theme, {expires:config.cookieLife, path:config.webRoot});
    location.href = removeAnchor(location.href);
}

/**
 * Remove anchor from the url.
 * 
 * @param  string $url 
 * @access public
 * @return string
 */
function removeAnchor(url)
{
    pos = url.indexOf('#');
    if(pos > 0) return url.substring(0, pos);
    return url;
}

/**
 * Init sort panel
 * 
 * @access public
 * @return void
 */
function initSortPanel()
{
    var $sortTrigger = $('#sortTrigger');
    if(!$sortTrigger.length) return;

    var $list = $('#page > .box > .table tr');
    if(!$list.length) return $sortTrigger.addClass('hidden');

    var $sortPanel = $('#sortPanel');
    if($sortPanel.length)
    {
        var $sortItem = $sortPanel.children('.SortUp, .SortDown').first();
        var sortClass = $sortItem.hasClass('SortUp') ? 'SortUp' : 'SortDown';
        $sortTrigger.removeClass('SortUp SortDown').addClass(sortClass).find('span').text($sortItem.text());
    }
}

/**
 * Fix avatar has text
 */
(function()
{
    var fixAvatar = function()
    {
        var $avatar = $(this);
        if($avatar.hasClass('avatar-no-fix')) return;
        var text = $.trim($avatar.text());
        if(text && text.length > 1)
        {
            $avatar.text(text.substring(0, 1));
        }
    };

    $.fn.fixAvatar = function()
    {
        return this.each(fixAvatar);
    };

    $(document).on('display.displayed', function(e, dp, $e, options)
    {
        if(options && options.$target) options.$target.find('.avatar').fixAvatar();
    });

    $(function() {$('.avatar').fixAvatar();})
})();

/**
 * Refresh content with ajax
 * 
 * @param  string selector
 * @param  string url
 * @access public
 * @return void
 */
$.refresh = function(selector, url)
{
    if(selector === true) selector = 'body';
    var $target = $(selector || 'body');
    var $tmp = $('<div/>');
    if(!url)
    {
        url = $target.data('refreshUrl') || $target.parent().data('refreshUrl') || window.location.href;
    }
    else if(url.indexOf(' ') < 1) url += ' body';
    $tmp.load(url, function()
    {
        var $tmpTarget = $tmp.find(selector);
        $target = $target.replaceWith($tmpTarget);
        $tmpTarget.find('[data-skin]').skin();
        $tmpTarget.find('[data-display]').display();
        $tmpTarget.find('.avatar').fixAvatar();
        $tmpTarget.find('.nav-auto').navAuto();
    });
};

/**
 * Init list with actions
 * 
 * @access public
 * @return void
 */
$.Display.plugs(
{
    _listAction: function(options)
    {
        return $.extend(options, 
        {
            targetDismiss: true,
            selector: options.selector || '.item',
            trigger: 'longTap'
        });
    },
    listAction: function(options)
    {
        return $.extend(options, 
        {
            backdrop: true,
            remote: false,
            load: false,
            target: options.actionsPanel || '#actionsPanel',
            show: function(thisOptions)
            {
                var $target  = thisOptions.$target,
                    $element = $(thisOptions.element),
                    actions  = $element.data('actions');
                $target.css('pointerEvents', 'none').children('.item').each(function()
                {
                    var $item = $(this),
                        action = actions[$item.data('action')];
                    if(action)
                    {
                        $item.removeClass('disabled').attr(
                        {
                            disabled: null,
                            'data-href': action
                        }).data('remote', action);
                        if($item.data('refresh'))
                        {
                            $item.data({refresh: '[data-id="' + $element.data('id') + '"]'});
                        }
                        if($item.data('ajaxDelete'))
                        {
                            $item.data({ajaxDelete: '[data-id="' + $element.data('id') + '"]'});
                        }
                    } else $item.addClass('disabled').attr('disabled', 'disabled');
                });
                $target.children('.selected').replaceWith($element.clone().attr('data-id', '').addClass('selected'));
                setTimeout(function(){$target.css('pointerEvents', 'auto');}, 1000);
            }
        });
    },
    ajaxAction: function(options)
    {
        var $element = $(options.element);
        var options = $.Display.plugs.messager.call(this, options);
        var oldTemplate = options.template;
        var isAjaxDelete = options.ajaxDelete;
        return $.extend(options, 
        {
            confirm: options.confirm !== undefined ? options.confirm : (options.ajaxDelete ? v.lang.confirmDelete : false),
            remoteType: 'json',
            show: function(thisOptions)
            {
                return !thisOptions.confirm || confirm(thisOptions.confirm);
            },
            template: function(response, thisOptions)
            {
                var data = $.extend(thisOptions, response);
                var isSuccess = data.result === 'success';
                if(isSuccess)
                {
                    if(data.refresh) $.refresh(data.refresh, data.refreshUrl);
                    if(data.ajaxDelete) $(data.ajaxDelete).remove();
                    if($.isFunction(data.success)) data.success(response);
                }

                var locate = data.locate;
                if(data.resetLocate !== undefined) locate = data.resetLocate;
                if(locate)
                {
                    setTimeout(function()
                    {
                        if(locate === 'self')
                        {
                            window.location.reload();
                        }
                        else if(data.locateDisplay == 'modal')
                        {
                            var myDisplay = new $.Display({ display: 'modal' });
                            myDisplay.show({ remote: locate, placement: 'bottom'});
                        }
                        else
                        {
                            window.location.href = locate;
                        }
                    }, 1500);
                }

                return data.message ? oldTemplate(data.message, $.extend(data, {type: isSuccess ? 'success' : 'danger', icon: isSuccess ? 'ok-sign' : 'exclamation-sign'})) : false;
            },
            remoteError: function()
            {
                return {result: 'fail', message: v.lang.timeout || 'Network error.'};
            }
        });
    }
});

/**
 * Disable context menu
 * 
 * @param  object $context
 * @access public
 * @return void
 */
function disableContextMenu($context)
{
    ($context || $('.no-contextmenu')).on('contextmenu', function(e) {e.preventDefault(); e.returnValue = false; return false});
}

/**
 * Init list with pager
 * 
 * @param  object $list
 * @access public
 * @return void
 */
function initListWithPager($list)
{
    ($list || $('.list-with-pager')).on('click', '.pager-more', function()
    {
        var $pager = $(this);
        if($pager.hasClass('loading')) return;
        $pager.addClass('loading loading-light');

        var $tmp = $('<div/>');
        $tmp.load($pager.data('more') + ' .list-with-pager', function(data) {
            var $tmpList = $tmp.find('.list');
            $tmpList.children('.item').each(function()
            {
                var $tmpItem = $(this);
                var $item = $('[data-id="' + $tmpItem.data('id') + '"]');
                if($item.length)
                {
                    $item.replaceWith($tmpItem.clone());
                    $tmpItem.remove();
                }
            });
            $pager.parent().before($tmp.find('.list'));
            $pager.replaceWith($tmp.find('.pager-more'));
        });
    });
}

/**
 * Reverse toggle
 */
(function()
{
    // http://lab.arc90.com/2008/05/22/jquery-reverse-order-plugin/#licensing
    $.fn.reverseOrder = function(){return this.each(function(){$(this).prependTo( $(this).parent() );});};

    $(function()
    {
        $(document).on('click', '[data-toggle="reverse"]', function()
        {
            var $this = $(this);
            $($this.data('target')).reverseOrder();
            $this.find('.icon-sort-by-order, .icon-sort-by-order-alt').toggleClass('icon-sort-by-order').toggleClass('icon-sort-by-order-alt');
        });
    });
})();

/**
 * Ajax form
 */
(function()
{
    $.fn.modalForm = function(options)
    {
        return $(this).each(function()
        {
            var $form = $(this);
            var thisOptions = $.extend($form.data(), options);
            if(!thisOptions.onResult && !thisOptions.onSuccess && !thisOptions.onComplete)
            {
                thisOptions.onSuccess = function(response)
                {
                    if(response.result === 'success')
                    {
                        $.Display.dismiss();
                        response.locate = false;
                        if(thisOptions.formRefresh) $.refresh(thisOptions.formRefresh);
                        if(thisOptions.displayFrom) $.Display.all[thisOptions.displayFrom].show();
                        $form.find('[data-default-val]').each(function()
                        {
                            var $control = $(this);
                            $control.val($control.data('defaultVal'));
                        });
                    }
                };
            }
            $.ajaxForm($form, thisOptions);
        });
    }

    $(function() {$('.modal-form').modalForm();});

    $(document).on('display.displayed', function(e, dp, $e, options)
    {
        if(options && options.$target) options.$target.find('.modal-form').modalForm();
    });
})();

/**
 * Nav auto justified
 */
(function()
{
    var winWidth = $(window).width();
    $.fn.navAuto = function(options)
    {
        return $(this).each(function()
        {
            var $nav = $(this), width = 0;
            $nav.children('a').each(function(){width += $(this).width();});
            $nav.toggleClass('justified', width < winWidth);
        });
    };

    $(function(){$('.nav-auto').navAuto();});
})();

/**
 * Initialization
 */
$(function()
{
    /**
     * Submit button
     */
    $(document).on('click', '[data-submit]', function()
    {
        $($(this).data('submit')).trigger('submit');
    });

    /**
     * Auto intent headline
     */
    var winWidth = $(window).width();
    $('.headline.indent-auto').each(function()
    {
        var $this = $(this);
        $this.toggleClass('indent', ($.trim($this.text()).length * 20 + 100) < winWidth);
    });

    $(document).on('click', 'tr[data-url] td', function()
    {
        var url = $(this).closest('tr').data('url');
        if(url) window.location.href = url;
    });
});

$(function()
{
    if(typeof wx === 'undefined') return;
    
    wx.config(
    {
        debug: false,
        appId: v.appId,    //此处的appId等同于企业的CorpID
        timestamp: v.timestamp,
        nonceStr:  v.nonceStr,
        signature: v.signature,
        jsApiList: ['checkJsApi', 'chooseImage', 'scanQRCode']
    });
    
    wx.ready(function()
    {
        $(document).on('click', '.scanQRCode', function()
        {
            wx.scanQRCode(
            {
                desc: 'scanQRCode desc',
                needResult: 0,
                scanType: ['qrCode', 'barCode'],
                success: function(response)
                {
                    alert(response.errMsg);
                },
                error: function(response)
                {
                    if(response.errMsg.indexOf('function_not_exist') > 0){alert('版本过低请升级');}
                }
            });
        })

        $(document).on('click', '.chooseImage', function()
        {
            wx.chooseImage(
            {
                count: 1,
                sizeType: ['original', 'compressed'],
                sourceType: ['album', 'camera'],
                success: function (response)
                {
                   wx.uploadImage(
                   {
                       localId: response.localIds[0],
                       isShowProcess: 1,
                       success: function(res)
                       {
                           var imageID = window.btoa(res.serverId);
                           var url = $('.chooseImage').data('url').replace('imageID', imageID);

                           $.getJSON(url, function(data)
                           {
                               alert(data.message)
                           })
                       }
                   })
                }
            });
        })
    })
})

function fixAppnav()
{
    var winWidth = $(window).width();
    var width    = 0;
    $('#appnav a').each(function()
    {
        width += $(this).width();
    });

    if(width > winWidth)
    {
        $('#appnav a.moreAppnav').removeClass('hidden');
        var lastNav = $('#appnav > a').not('.moreAppnav').last();
        lastNav.addClass('item').css('display', lastNav.css('display'));
        $('#moreAppnav').prepend("<div class='divider no-margin'></div>");
        $('#moreAppnav').prepend(lastNav);

        fixAppnav();
    }
}

function fixMenu()
{
    var winWidth = $(window).width();
    var width    = 0;
    $('#menu a').each(function()
    {
        width += $(this).width();
    });

    if(width > winWidth)
    {
        $('#menu a.moreMenu').removeClass('hidden');
        var lastMenu = $('#menu > a').not('.moreMenu').last();
        lastMenu.addClass('item').css('display', lastMenu.css('display'));
        $('#moreMenu').prepend("<div class='divider no-margin'></div>");
        $('#moreMenu').prepend(lastMenu);

        fixMenu();
    }
}
