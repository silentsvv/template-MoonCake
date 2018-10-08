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