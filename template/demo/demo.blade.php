<!DOCTYPE html>
<html lang="zh">
<head>
    <title>Document</title>
    <!--静态资源引入-->
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
    </script>    <!--meta信息设置-->
    <meta header="true">    <meta name="keywords" content="">
    <meta name="description" content="">    
    <link rel="stylesheet" href="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/css/ui.index-352172b1475d7bf9756336e270a3ead0.css">
    <script src="https://unpkg.com/vue/dist/vue.js"></script>

</head>

<body>
    <main class="app">
        <section class="app-content el-container" direction="horizontal" >  
            <aside id="menu" class="el-aside" style="width:auto" v-cloak>
              <el-scrollbar class="asideScroll" tag="section">
                <section class="container-menu">
                  <el-menu :default-active="menu_menuData.defaultIndex" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose"
                    :collapse="menu_isCollapse" :collapse-transition="true" :unique-opened="true">
                    <el-menu-item class="logo-title" index="0" disabled>
                      <i class="left-menu-top-icon" @click="gotoIndex" v-show="menu_isCollapse"></i>
                      <span slot="title" @click="gotoIndex">DC 管理后台</span>
                      <span class="left-menu-logo" @click="gotoIndex" v-show="menu_companyImg!==''"><img alt="123" :src="menu_companyImg"></span>
                    </el-menu-item>
                    <template v-for="(item,index) in menu_menuData.list">
                      <el-menu-item :key="index" :index="item.id" v-if="item.show && !item.sub_menu" @click="menu_clickItem(item.url,item.jump)">
                        <i class="left-menu-icon" :style="{'background-position':'0 '+menu_iconList[item.icon]}"></i>
                        <span slot="title">
                          <a v-if="item.jump" target="_blank">${item.text}</a>
                          <a v-else>${item.text}</a>
                        </span>
                      </el-menu-item>
                      <el-submenu :index="item.id" v-else>
                        <template slot="title">
                          <i class="left-menu-icon" :style="{'background-position':'0 '+menu_iconList[item.icon]}"></i>
                          <span slot="title">${item.text}</span>
                        </template>
                        <el-menu-item-group>
                          <el-menu-item v-if="sub_item.show" :key="sub_index" :index="sub_item.id" @click="menu_clickItem(sub_item.url,sub_item.jump)"
                            v-for="(sub_item,sub_index) in item.sub_menu">
                            <a v-if="sub_item.jump" target="_blank">${sub_item.text}</a>
                            <a v-else>${sub_item.text}</a>
                          </el-menu-item>
                        </el-menu-item-group>
                      </el-submenu>
                    </template>
                  </el-menu>
                </section>
              </el-scrollbar>
            </aside>            <section class="app-content-container el-container is-vertical expand">
                
                <header id="header" class="el-header app-content-header" v-cloak>
                  <ul class="menu-horizontal"> 
                    <i :class="{'header-icon-close':!header_isCollapse, 'header-icon-open':header_isCollapse}" class="header-icon-default"
                      @click="toggleMenu"> </i>
                    
                  </ul>
                </header>
                
                <section class="el-main container-main" id="app" v-cloak>
                    <section class="container-main-bread">
                        <!--面包屑位置-->
                    </section>
                    <section class="container-main-content">
                        <div class="content">
                            <!--主题内容位置-->
                        </div>
                    </section>
                </section>
                <footer class="el-footer app-content-footer" data-role="footer" v-cloak >
                    <div class="container">
                        <span class="pull-left"> Copyright © 2018		</span>
                        <span class="pull-right"> &nbsp;&nbsp;&nbsp;服务代码：3582293262        </span>
                        <span class="pull-right"> &nbsp;&nbsp;&nbsp;当地时间 (GMT -07:00)：2018-09-27 01:58	</span>
                    </div>
                </footer>            </section>
        </section>
    </main>

</body>
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/js/ui/demo.common-afb6df7a20d69bfc920d.js"></script>
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/js/ui/demo.demo-8edd25bdf534d2ab49b7.js"></script>
<!--统计-->
<!--资源位置-->
<!--设置Vue全局参数-->
<script>
  (function () {
    var GlobalMinxin = {
      delimiters: ['${', '}']
    };

    Vue.mixin(GlobalMinxin);
  })()
</script>
<!--头部bar地址-->
<script>
    (function () {

      new Vue({
        el: '#header',
        data: function () {
          return {
            header_title: '你好',
            header_isCollapse: false,
            header_activeName: 'first',
            header_noticeNumber: '0',

            selectStatus1: false,
            selectStatus2: false,
            langPic: '',
            langTxt: ''
          }
        },
        mounted: function () {
          var self = this;
          
            
              setTimeout(function () {
                /**
                window.UtilERCP.request({
                  type: 'get',
                  url: noticeUrl,
                  success: function (res) {
                    self.header_noticeNumber = res.total;
                    (res.siteListCount > 0) && (self.header_noticeList.siteList = res.siteList);
                    (res.updateListCount > 0) && (self.header_noticeList.updateList = res.updateList)

                  }
                })
                self.header_languages.forEach(function (item) {
                  if (item.abbr == self.header_form.lang) {
                    self.langPic = item.iso_url;
                    self.langTxt = item.name
                  }
                })
                **/
              }, 500) 
          

          window.addEventListener('menu_show', function (e) { self.header_isCollapse = true; }, false);
          window.addEventListener('menu_hide', function (e) { self.header_isCollapse = false; }, false);
        },

        methods: {

          toggleMenu: function () {
            return window.vm_ercp_menu ? vm_ercp_menu.toggleMenu() : false;
          },

        },

        created() {
          console.log('header created')
        }
      });
    })()
</script>
<!--菜单初始化脚本-->
<script>
    (function () {

      var menuData = {
        list: [
          {
            icon: "main_panel",
            id: "1",
            jump: false,
            show: true,
            text: "主面板",
            url: "http://hudingwen.r.zuzuche.com/backend.php/site/index"
          },
          {
            icon: "order",
            id: "2",
            jump: false,
            show: true,
            text: "订单",
            url: "#",
            sub_menu: [
              {
                id: "3_1",
                jump: false,
                show: true,
                text: "订单列表",
                url: "http://hudingwen.r.zuzuche.com/backend.php/order/index"
              },
              {
                id: "3_2",
                jump: false,
                show: true,
                text: "添加订单",
                url: "http://hudingwen.r.zuzuche.com/backend.php/order/index"
              }
            ]
          }
        ]
      };
      var iconList = {
        main_panel: "-681px",
        order: "7px",
        model_group: "-37px",
        channel_price_plan: "-80px",
        vehicle: "-117px",
        stock: "-159px",
        extra_service: "-199px",
        insurance: "-240px",
        management_meal: "-281px",
        shuttle_bus: "-323px",
        remote: "-363px",
        network_consulting: "-404px",
        store: "-445px",
        user: "-486px",
        statistics: "-527px",
        system_setup: "-567px",
        customer: "-641px",
        discount: "-715px",
        test: "-748px",
        backstage: "-609px",
      };// 图标位置
      var companyLogo = '/static/up/company_2/logo/20161217/e7c394072c33b5ed_1481968843_3.png';

      window.vm_ercp_menu = new Vue({
        el: '#menu',

        data: function () {
          return {
            menu_menuData: menuData,
            menu_isCollapse: false,
            menu_iconList: iconList,
            menu_companyImg: ''
          }
        },

        watch: {
          menu_isCollapse: function (data) {
            /**
             if (data) {
                  window.dispatchEvent(DC.event('menu_hide'));
                } else {
                  window.dispatchEvent(DC.event('menu_show'));
                }
                **/
          }
        },

        methods: {
          handleOpen(key, keyPath) {
            var self = this;
          },
          handleClose(key, keyPath) {
            // console.log(key, keyPath);

          },
          menu_clickItem(url, jump) {
            if (jump) {
              window.open(url)
            } else {
              window.location.href = url;
            }
          },
          toggleMenu() {
            this.menu_isCollapse = !this.menu_isCollapse;
            var contentDom = document.querySelector('.app-content-container');
            console.log(contentDom)
            if (this.menu_isCollapse) {


              removeClass(contentDom, 'expand')
            } else {
              contentDom.className += ' expand'
            }
          },
          menuStatu() {
            return this.menu_isCollapse;
          },
          gotoIndex() {
            console.log('click')
            window.location.href = indexUrl
          }
        },

        mounted() {
          var self = this;
          var img = new Image()
          img.src = companyLogo
          img.onload = function () {
            self.menu_companyImg = companyLogo
          }
          img.onerror = function () {
            /**
            if (self.menu_isCollapse) {
                window.dispatchEvent(DC.event('menu_hide'));
              } else {
                window.dispatchEvent(DC.event('menu_show'));
              }
              **/
          }

          var footer = document.querySelector('[data-role="footer"]');
          if(footer){
            footer.removeAttribute('v-cloak');
          }
         
        },
      });
      function hasClass(ele, cls) {
        return ele.className.match(new RegExp("(\\s|^)" + cls + "(\\s|$)"));
      }
      function removeClass(ele, cls) {
        if (hasClass(ele, cls)) {
          var reg = new RegExp("(\\s|^)" + cls + "(\\s|$)");//正则表达式
          ele.className = ele.className.replace(reg, " ");
        }
      }
    })()
</script>

<script>
    (function () {

        // 当前页面实例化
        new Vue({
            el: '#app',
            data: function () {
                return {}
            }
        })
    })()
</script>

</html>