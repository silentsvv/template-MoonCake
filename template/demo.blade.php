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
    <link rel="stylesheet" href="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/css/ui/layouts/header.header-6cfd12e3258b25b5d7a73ecfbd54f894.css">
    <script src="//imgcdn50.zuzuche.com/assets/hydra/m/vueui/js/vue.min.js"></script>
    <!-- INLINE -->

    <!-- INLINE layouts/meta/meta.view -->
    <meta name="viewport" content="width=device-width,initial-scale=1">    <!-- INLINE -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <style>
        .demo-cnt .row{
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="hidden-xscroll">
    <main class="app demo-cnt">
        <section class="app-content el-container is-vertical" direction="vertical">

            <header id="header" class="el-header app-content-header" v-cloak>
              <div class="btn-info">    
                <div class="ui-ml-l theme-color-primary ui-fb">DC-UI 管理后台</div>
                <i :class="{'header-icon-close':!header_isCollapse, 'header-icon-open':header_isCollapse}" class="ui-ml-l dc-icon-caidan"
                  @click="toggleMenu"> </i>
              </div>
              <div class="user-info">
                <el-menu mode="horizontal" class="ui-mr-l">
                  <el-menu-item index="1"><a href="#">处理中心</a></el-menu-item>      
                  <el-menu-item index="2"><a href="#">消息中心</a></el-menu-item>      
                </el-menu>
                <div class="login">
                  <span>肥龙在天</span> | <span><a class="link-color" href="javascript:;">退出</a></span>
                </div>
              </div>
            </header>            <section class="app-content-container el-container expand">
                <!-- INLINE layouts/menu/menu.view -->
                <aside id="menu" class="el-aside" v-cloak>
                  <el-scrollbar class="asideScroll" tag="section">
                    <section class="container-menu">
                      <el-menu :default-active="menu_menuData.defaultIndex" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose"
                        :collapse="menu_isCollapse" :collapse-transition="true" :unique-opened="true">
                       
                        <template v-for="(item,index) in menu_menuData.list">
                          <el-menu-item :key="index" :index="item.id" v-if="item.show && !item.sub_menu" @click="menu_clickItem(item.url,item.jump)">
                            <i :class="item.icon" class="icon-color" ></i>
                            <span slot="title">
                              <a v-if="item.jump" target="_blank">${item.text}</a>
                              <a v-else>${item.text}</a>
                            </span>
                          </el-menu-item>
                          <el-submenu :index="item.id" v-else>
                            <template slot="title">
                              <i :class="item.icon" class="icon-color"></i>
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
                </aside>                <!-- INLINE -->
                <div class="wrapper" id="app" v-cloak>
                    <section class="container-main-bread">
                        <!--面包屑位置-->
                        <div class="breadcrumb-card">
                            <el-breadcrumb class="bread" separator-class="el-icon-arrow-right">
                                <el-breadcrumb-item><a href="/">首页</a></el-breadcrumb-item>
                                <el-breadcrumb-item>示例页</el-breadcrumb-item>
                            </el-breadcrumb>
                        </div>
                        <div class="btn-list">
                            <el-button type="primary" size="small">新增门店</el-button>
                            <el-button type="default" size="small">设置门店</el-button>
                        </div>
                    </section>
                    <section class="el-main container-main">
                        <section class="container-main-content">
                            <div class="content">
                                <!--主题内容位置-->
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            字体
                                        </h2>
                                    </div>
                                    <section>
                                        <div>
                                            <div class="ui-f20">这是正文字体大小，样式名是ui-f20</div>
                                            <div class="ui-f18">这是正文字体大小，样式名是ui-f18</div>
                                            <div class="ui-f16">这是正文字体大小，样式名是ui-f16</div>
                                            <div class="ui-f14">这是正文字体大小，样式名是ui-f14</div>
                                            <div class="ui-f12">这是正文字体大小，样式名是ui-f12</div>
                                        </div>
                                    </section>
                                </el-card>
                                <br>
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            色彩
                                        </h2>
                                    </div>
                                    <section>
                                        <div class="color-type">
                                            <h5>主色</h5>
                                            <el-row>
                                                <el-col :span="6" class="color-type-detail theme-color-primary">
                                                    <p>theme-color-primary</p>
                                                </el-col>
                                            </el-row>
                                        </div>
                                        <br>
                                        <div class="color-type">
                                            <h5>配色</h5>
                                            <el-row>
                                                <el-col :span="6" class="color-type-detail ui-font-color-success">
                                                    <p>Success</p>
                                                    <p>ui-font-color-success</p>
                                                </el-col>
                                                <el-col :span="6" class="color-type-detail ui-font-color-warning">
                                                    <p>Warning</p>
                                                    <p>ui-font-color-warning</p>
                                                </el-col>
                                                <el-col :span="6" class="color-type-detail ui-font-color-danger">
                                                    <p>Danger</p>
                                                    <p>ui-font-color-danger</p>
                                                </el-col>
                                                <el-col :span="6" class="color-type-detail ui-font-color-info">
                                                    <p>Info</p>
                                                    <p>ui-font-color-info</p>
                                                </el-col>
                                            </el-row>
                                        </div>
                                    </section>
                                </el-card>
                                <br>
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            间距
                                        </h2>
                                    </div>
                                    <section>
                                        <div>
                                            页面中使用的间距样式，有
                                            <pre>
.ui-m-l  等同于 margin:20px; 
.ui-mt-s 等同于 margin-top:5px;
.ui-mt-m 等同于 margin-top:10px;
.ui-mt-l 等同于 margin-top:20px;

.ui-p-l  等同于 padding:20px; 
.ui-pt-s 等同于 padding-top:5px;
.ui-pt-m 等同于 padding-top:10px;
.ui-pt-l 等同于 padding-top:20px;
                                            </pre>
                                            <p style="font-weight:bold">这是框架推荐的间距设置，布局灵活使用即可</p>
                                        </div>
                                    </section>
                                </el-card>
                                <br>
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            按钮
                                        </h2>
                                    </div>
                                    <section>
                                        <el-row class="row">
                                            <el-button>默认按钮</el-button>
                                            <el-button type="primary" @click="handleBtnClick">主要按钮</el-button>
                                            <el-button type="success">成功按钮</el-button>
                                            <el-button type="info">信息按钮</el-button>
                                            <el-button type="warning">警告按钮</el-button>
                                            <el-button type="danger">危险按钮</el-button>
                                        </el-row>

                                        <el-row class="row">
                                            <el-button plain>朴素按钮</el-button>
                                            <el-button type="primary" plain>主要按钮</el-button>
                                            <el-button type="success" plain>成功按钮</el-button>
                                            <el-button type="info" plain>信息按钮</el-button>
                                            <el-button type="warning" plain>警告按钮</el-button>
                                            <el-button type="danger" plain>危险按钮</el-button>
                                        </el-row>

                                        <el-row class="row">
                                            <el-button round>圆角按钮</el-button>
                                            <el-button type="primary" round>主要按钮</el-button>
                                            <el-button type="success" round>成功按钮</el-button>
                                            <el-button type="info" round>信息按钮</el-button>
                                            <el-button type="warning" round>警告按钮</el-button>
                                            <el-button type="danger" round>危险按钮</el-button>
                                        </el-row>

                                        <el-row class="row">
                                            <el-button icon="dc-icon-xitongshezhi">dsdsds</el-button>
                                            <el-button icon="el-icon-search" circle></el-button>
                                            <el-button type="primary" icon="el-icon-edit" circle></el-button>
                                            <el-button type="success" icon="el-icon-check" circle></el-button>
                                            <el-button type="info" icon="el-icon-message" circle></el-button>
                                            <el-button type="warning" icon="el-icon-star-off" circle></el-button>
                                            <el-button type="danger" icon="el-icon-delete" circle></el-button>
                                        </el-row>

                                        <el-row class="row">
                                            <el-alert title="提醒" type="warning" description="类型为primary的主要按钮的颜色跟随主题变化。其他类型需要通过基本配置才能改变。"
                                                show-icon>
                                        </el-row>
                                    </section>
                                </el-card>
                                <br>
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            表单
                                        </h2>
                                    </div>
                                    <section>
                                        <el-main>
                                            <el-form ref="form" style="width: 800px" :model="form" label-width="80px">
                                                <el-form-item label="活动名称">
                                                    <el-input v-model="form.name"></el-input>
                                                </el-form-item>
                                                <el-form-item label="活动区域">
                                                    <el-select v-model="form.region" placeholder="请选择活动区域">
                                                        <el-option label="区域一" value="shanghai"></el-option>
                                                        <el-option label="区域二" value="beijing"></el-option>
                                                    </el-select>
                                                </el-form-item>
                                                <el-form-item label="活动时间">
                                                    <el-col :span="11">
                                                        <el-date-picker type="date" placeholder="选择日期" v-model="form.date1"
                                                            style="width: 100%;"></el-date-picker>
                                                    </el-col>
                                                    <el-col class="line" :span="2">-</el-col>
                                                    <el-col :span="11">
                                                        <el-time-picker type="fixed-time" placeholder="选择时间" v-model="form.date2"
                                                            style="width: 100%;"></el-time-picker>
                                                    </el-col>
                                                </el-form-item>
                                                <el-form-item label="即时配送">
                                                    <el-switch v-model="form.delivery"></el-switch>
                                                </el-form-item>
                                                <el-form-item label="活动性质">
                                                    <el-checkbox-group v-model="form.type">
                                                        <el-checkbox label="美食/餐厅线上活动" name="type"></el-checkbox>
                                                        <el-checkbox label="地推活动" name="type"></el-checkbox>
                                                        <el-checkbox label="线下主题活动" name="type"></el-checkbox>
                                                        <el-checkbox label="单纯品牌曝光" name="type"></el-checkbox>
                                                    </el-checkbox-group>
                                                </el-form-item>
                                                <el-form-item label="特殊资源">
                                                    <el-radio-group v-model="form.resource">
                                                        <el-radio label="线上品牌商赞助"></el-radio>
                                                        <el-radio label="线下场地免费"></el-radio>
                                                    </el-radio-group>
                                                </el-form-item>
                                                <el-form-item label="活动形式">
                                                    <el-input type="textarea" v-model="form.desc"></el-input>
                                                </el-form-item>
                                                <el-form-item>
                                                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                                                    <el-button>取消</el-button>
                                                </el-form-item>
                                            </el-form>

                                        </el-main>
                                    </section>
                                </el-card>
                                <br>
                                <el-card>
                                    <div slot="header">
                                        <h2 class="ui-card-title">
                                            表格
                                        </h2>
                                    </div>
                                    <section>
                                        <el-big-table :options="options" :columns="columns" :parameters="parameters"
                                            :url="url" @sort-change="sortChange" @success="success" ref="custom-table">
                                        </el-big-table>
                                    </section>
                                </el-card>
                            </div>
                        </section>
                    </section>
                    <footer class="el-footer app-content-footer" data-role="footer" v-cloak >
                        <div class="container">
                            <span class="pull-left"> Copyright © 2018		</span>
                            <span class="pull-right"> &nbsp;&nbsp;&nbsp;服务代码：3582293262        </span>
                            <span class="pull-right"> &nbsp;&nbsp;&nbsp;当地时间 (GMT -07:00)：2018-09-27 01:58	</span>
                        </div>
                    </footer>                </div>
            </section>
        </section>
    </main>

</body>

<!--资源位置-->
<!-- INLINE layouts/bottom/bottom.view -->
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui.common-86b6cb60abfdfeb60858.js"></script>
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui/layouts/bottom.bottom-f863da7140c1cb0e1450.js"></script>
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
      if(!document.querySelector('#header')){
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

      if(!document.querySelector('#menu')){
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
</script><!-- INLINE -->
<script src="//imgcdn50.zuzuche.com/assets/hydra/m_v2/hb2018/quicskin/js/ui.demo-8b0dacca70ae17929667.js"></script>
<script>
    (function () {

        var item = {
            date: '2016-05-02',
            name: '王小虎',
            address: '上海市普陀区金沙江路 1518 弄'
        };

        // 当前页面实例
        new Vue({
            el: '#app',
            data: function () {
                return {
                    visible: false,
                    tableData: Array(20).fill(item),
                    form: {
                        name: '',
                        region: '',
                        date1: '',
                        date2: '',
                        delivery: false,
                        type: [],
                        resource: '',
                        desc: ''
                    }, 
                    url: '',
                    columns: [
                        {
                            prop: 'username',
                            label: '用户名',
                            width: '200',
                            sortable:'custom'

                        }
                    ],
                    parameters: {

                    },

                    options: {
                        ref: 'custom-table',
                        border: true,//此处需要注意原有的Table组件按照属性传入的布尔值这里都需要传入对应的值
                        selection: false,
                        cellClassName: self.ttt,

                    },
                }
            },
            methods: {
                handleBtnClick: function () {
                    var self = this;

                    self.$message('这是主要按钮')
                },
                onSubmit: function () {
                    console.log('submit!');
                },
                sortChange: function(){

                },
                success: function(){

                }
            }
        })
    })()
</script>

</html>