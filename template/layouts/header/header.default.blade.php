<script>
  (function () {
    // 设置全局变量参数
    window.GLOBAL_DATA = {};
    // 设置工具集
    var util = {
      request: function (options) {
        var options = options || {};

        var url = options.url;
        var data = options.data || {};
        var cache = options.cache || false;
        var beforeSend = options.beforeSend || function () { };
        var success = options.success || function () { };
        var error = options.error || function () { };
        var complete = options.complete || function () { };
        var type = options.type || 'GET';
        var dataType = options.dataType || 'json';
        var async = (options.async == null) ? true : false;
        var headers = options.headers || {};
        var timeout = options.timeout || 10000;
        var csrfDom = document.querySelector('meta[name="csrf-token"]');
        if (!cache) {
          data._ = new Date().getTime();
        }

        if (!data._token && csrfDom) {
          data._token = csrfDom.getAttribute('content');
        }

        console.info('ajax request params:', data)

        // jQuery版本的请求
        var ajax_obj = $.ajax
          ({
            url: url,
            type: type,
            data: data,
            cache: cache,
            async: async,
            dataType: dataType,
            beforeSend: function (XMLHttpRequest, settings) {
              beforeSend(XMLHttpRequest, settings);
            },
            success: function (data, textStatus) {
              //成功回调方法扩展处理
              console.log('%c请求成功，请求路径是:' + url, 'color:#00dd00');
              success(data, textStatus);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              //错误方法扩展处理
              console.log('%c请求失败，请求路径是:' + url, 'color:#ff5544');
              //console.log('http://www.poco.cn&err_str='+XMLHttpRequest.response);
              error(XMLHttpRequest, textStatus, errorThrown);
            },
            complete: options.complete
          });

        return ajax_obj;
      },
      ua: {},
      cookie: {
        setCookie: function (name, value, config) {
          var _config = config || {};
          var Days = _config.expires == undefined ? 30 : _config.expires;
          var path = _config.path == undefined ? "" : ";path=" + _config.path;
          var exp = new Date();
          exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 30);
          document.cookie = name + "=" + decodeURIComponent(value) + ";expires=" + exp.toGMTString() + path
        },
        getCookie: function (name) {
          var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
          if (arr = document.cookie.match(reg)) {
            return decodeURI(arr[2]);
          } else {
            return null;
          }
        },
        deleteCookie: function () {

        }

      },
      storage: {},
      typeof: function () {

      },
      encodeSearchParams: function (params) {
        var arr = [];
        if (typeof params !== 'object' || (params instanceof Array)) {
          return console.error('params 类型错误');
        }
        for (var key in params) {
          if (params[key] === 'undefined') {
            params[key] = '';
          }
          arr.push([key, params[key]].join('='));
        }
        return arr.join('&')
      },
      format: function (date, pattern) {
        var SIGN_REGEXP = /([yMdhsm])(\1*)/g;
        var DEFAULT_PATTERN = 'yyyy-MM-dd';
        function padding(s, len) {
          var len = len - (s + '').length;
          for (var i = 0; i < len; i++) { s = '0' + s; }
          return s;
        };
        pattern = pattern || DEFAULT_PATTERN;
        return pattern.replace(SIGN_REGEXP, function ($0) {
          switch ($0.charAt(0)) {
            case 'y': return padding(date.getFullYear(), $0.length);
            case 'M': return padding(date.getMonth() + 1, $0.length);
            case 'd': return padding(date.getDate(), $0.length);
            case 'w': return date.getDay() + 1;
            case 'h': return padding(date.getHours(), $0.length);
            case 'm': return padding(date.getMinutes(), $0.length);
            case 's': return padding(date.getSeconds(), $0.length);
          }
        });
      },
      /**
       * 计算中英文字数
       **/
      getCpmisWords: function (str) {
        if (str == null) return 0;
        if (typeof str != "string") {
          str += "";
        }
        return str.replace(/[^\x00-\xff]/g, "01").length;
      },
      event: function () {
        var EventList = {};

        return function (name, option) {
          if (EventList[name]) {
            return EventList[name];
          }

          return new Event(name, option);
        }
      }
    }

    // 核心变量 DC
    window.DC = util;
    })()
</script>