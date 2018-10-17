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
</header>