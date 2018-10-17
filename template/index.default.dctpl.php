<!DOCTYPE html>
<html lang="zh">
<head>
    <title>Document</title>
    <!--静态资源引入-->
    
    <!-- INLINE layouts/header/header.view -->
    <script>
      (function () {
        // 设置全局变量参数
        window.GLOBAL_DATA = {};
        
        })()
    </script>
    
    <!--核心框架-->
    <link rel="stylesheet" href="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/css/ui/layouts/header.header-05c157dda91e48507d71eaddb0865b4f.css">
    <script src="//imgcdn50.zuzuche.com/assets/hydra/m/DCUI/js/vue.min.js?v2.5.17"></script>
    <!-- INLINE -->
    
    <!-- INLINE layouts/meta/meta.view -->
    <meta name="viewport" content="width=device-width,initial-scale=1">    <!-- INLINE -->    
    <meta name="keywords" content="">
    <meta name="description" content="">    


</head>

<body class="hidden-xscroll">
    <main class="app">
        <section class="app-content el-container is-vertical" direction="vertical">

            <header id="header" class="el-header app-content-header" v-cloak>
              <div class="btn-info">
                <div class="ui-ml-l theme-color-primary ui-fb">DC-UI 管理后台</div>
                <i :class="{'header-icon-close':!header_isCollapse, 'header-icon-open':header_isCollapse}" class="ui-ml-l dc-icon-caidan"
                  @click="toggleMenu"> </i>
              </div>
              <div class="user-info">
                <el-menu mode="horizontal" class="ui-mr-l">
                  <el-submenu index="1">
                    <template slot="title">工作中心</template>
                    <el-menu-item index="1-1"><a class="font-color" href="#">处理中心</a></el-menu-item>
                    <el-menu-item index="1-2"><a class="font-color" href="#">消息中心</a></el-menu-item>
                  </el-submenu>
                </el-menu>
                <div class="login">
                  <el-popover trigger="hover" popper-class="header-user-popover">
                    <div>
                      <ul>
                        <li class="header-user-list ">
                          <a class="ui-font-color-black" href="#">个人中心</a>
                        </li>
                       
                      </ul>
                      <div class="ui-pt-m header-user-bottom">
                        <el-button size="mini">
                          退出
                        </el-button>
                      </div>
                    </div>
                    <template slot="reference">
                      <div class="user-box">
                        <i class="dc-icon-yonghu-xianxing"></i><span class="user-name">肥龙在天</span>
                      </div>
                    </template>
                  </el-popover>
                </div>
              </div>
            </header>            <section class="app-content-container el-container expand">
                <!-- INLINE layouts/menu/menu.view -->
                <div id="menu">
                  <aside class="el-aside" v-cloak>
                    <el-scrollbar class="asideScroll" tag="section">
                      <section class="container-menu">
                        <el-menu :default-active="menu_menuData.defaultIndex" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose"
                          :collapse="menu_isCollapse" :collapse-transition="true" :unique-opened="true">
                
                          <template v-for="(item,index) in menu_menuData.list">
                            <el-menu-item :key="index" :index="item.id" v-if="item.show && !item.sub_menu" @click="menu_clickItem(item.url,item.jump)">
                              <i :class="item.icon" class="icon-color"></i>
                              <span slot="title">
                                <a v-if="item.jump" target="_blank">{%item.text%}</a>
                                <a v-else>{%item.text%}</a>
                              </span>
                            </el-menu-item>
                            <el-submenu :index="item.id" v-else>
                              <template slot="title">
                                <i :class="item.icon" class="icon-color"></i>
                                <span slot="title">{%item.text%}</span>
                              </template>
                              <el-menu-item-group>
                                <el-menu-item v-if="sub_item.show" :key="sub_index" :index="sub_item.id" @click="menu_clickItem(sub_item.url,sub_item.jump)"
                                  v-for="(sub_item,sub_index) in item.sub_menu">
                                  <a v-if="sub_item.jump" target="_blank">{%sub_item.text%}</a>
                                  <a v-else>{%sub_item.text%}</a>
                                </el-menu-item>
                              </el-menu-item-group>
                            </el-submenu>
                          </template>
                        </el-menu>
                      </section>
                    </el-scrollbar>
                  </aside>
                  <div class="app-popup" @click="hideMenu" ></div>
                </div>                <!-- INLINE -->
                <div class="wrapper" id="app" v-loading="PAGELODING" v-cloak>
                    <section class="container-main-bread">
                        <!--面包屑位置-->
                        <div class="breadcrumb-card">
                            <el-breadcrumb class="bread" separator-class="el-icon-arrow-right">
                                <el-breadcrumb-item><a href="/">首页</a></el-breadcrumb-item>
                                <el-breadcrumb-item>示例页</el-breadcrumb-item>
                            </el-breadcrumb>
                        </div>
                        
                    </section>
                    <section class="el-main container-main">
                        <section class="container-main-content">
                            <div class="content"></div>
                        </section>
                    </section>
                    <footer class="el-footer app-content-footer" data-role="footer" v-cloak >
                        <div class="container">
                            <span class="pull-left"> Copyright © 2018		&nbsp;&nbsp;&nbsp;服务代码：3582293262</span>
                        </div>
                    </footer>                </div>
            </section>
        </section>
    </main>

</body>
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui.common-86b6cb60abfdfeb60858.js"></script>
<!--统计-->

<!--资源位置-->
<!-- INLINE layouts/bottom/bottom.view -->
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui.common-86b6cb60abfdfeb60858.js"></script>
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui/layouts/bottom.bottom-a0d290beaaa0d2209ec9.js"></script>
<!--设置Vue全局参数-->
<script>
  (function () {
    var GlobalMinxin = {
      delimiters: ['{%', '%}'],
      data: function(){
        return {
          PAGELODING: true
        }
      },
      mounted: function(){
        var self = this;
        var el = self.$el;
        if(el.id == 'app'){
          self.PAGELODING = false;
        }
        
      }
    };

    Vue.mixin(GlobalMinxin);
  })()
</script>
<!--头部bar地址-->
<script>
    (function () {
      if (!document.querySelector('#header')) {
        return;
      }

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

          window.addEventListener('menu_show', function (e) { self.header_isCollapse = true; }, false);
          window.addEventListener('menu_hide', function (e) { self.header_isCollapse = false; }, false);
        },

        methods: {

          toggleMenu: function () {
            var self = this;
            self.header_isCollapse = !self.header_isCollapse;
            return window.vm_ercp_menu ? vm_ercp_menu.toggleMenu() : false;
          }

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

      if (!document.querySelector('#menu')) {
        return;
      }


      var menuData = {
        list: [
          {
            icon: "dc-icon-mendianxinxi",
            id: "1",
            jump: false,
            show: true,
            text: "主面板",
            url: "http://hudingwen.r.zuzuche.com/backend.php/site/index"
          },
          {
            icon: "dc-icon-dingdan",
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

      var companyLogo = '/static/up/company_2/logo/20161217/e7c394072c33b5ed_1481968843_3.png';

      window.vm_ercp_menu = new Vue({
        el: '#menu',

        data: function () {
          return {
            menu_menuData: menuData,
            menu_isCollapse: false,
            menu_iconList: [],
            menu_companyImg: ''
          }
        },

        watch: {
          menu_isCollapse: function (data) {

            {
              /**
              if (data) {
                window.dispatchEvent(DC.event('menu_hide'));
              } else {
                window.dispatchEvent(DC.event('menu_show'));
              }
              **/
            }

          }
        },

        methods: {
          handleOpen: function(key, keyPath) {
            var self = this;
          },
          handleClose: function(key, keyPath) {
            // console.log(key, keyPath);

          },
          menu_clickItem: function(url, jump) {
            if (jump) {
              window.open(url)
            } else {
              window.location.href = url;
            }
          },
          hideMenu: function(){
            this.toggleMenu();
          },
          toggleMenu: function() {
            var contentDom = document.querySelector('.app-content-container');
            if(DC.UA.isMobile){
                          
              if (!hasClass(contentDom, 'expand')) {                
                contentDom.className += ' mobile expand';
              } else {
                removeClass(contentDom, 'expand')
                removeClass(contentDom, 'mobile');
              }
            }
            else{
              this.menu_isCollapse = !this.menu_isCollapse;

              if (this.menu_isCollapse) {
                removeClass(contentDom, 'expand')
              } else {
                contentDom.className += ' expand'
              }
            }

            
            
          },
          menuStatu: function() {
            return this.menu_isCollapse;
          },
          gotoIndex: function() {
            console.log('click')
            window.location.href = indexUrl
          }
        },

        mounted: function() {
          var self = this;
          var img = new Image()
          var contentDom = document.querySelector('.app-content-container');
          
          if(DC.UA.isMobile){
            contentDom.className += ' mobile'
          }          
          else{
            contentDom.className += ' expand'
          }

          var footer = document.querySelector('[data-role="footer"]');
          if (footer) {
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
</script><!-- INLINE -->

<script>
    (function () {

        // 当前页面实例
        new Vue({
            el: '#app',
            data: function () {
                return {}
            }
        })
    })()
</script>

</html>