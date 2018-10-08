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
</aside>