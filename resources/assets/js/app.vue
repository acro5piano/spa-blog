<template>
  <div id="app">
    <header-nav/>
    <clip-loader v-if="loading" :size="size" class="loader"></clip-loader>
    <el-row type="flex" justify="center" class="wrapper">
      <el-col :span="23">
        <router-view />
        <footer-nav/>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import ClipLoader from 'vue-spinner/src/ClipLoader.vue'
  import event from './utils/event'

  export default {
    created () {
      event.on('spinner:start', () => this.loading = true)
      event.on('spinner:stop',  () => this.loading = false)
    },
    components: {
      ClipLoader,
      headerNav: require('./components/Navbar.vue'),
      footerNav: require('./components/Footer.vue'),
    },
    data () {
      return {
        loading: false,
        size: '15px',
      }
    },
  }

</script>

<style lang="scss">
.loader {
  position:absolute;
  left:10px;
  top:70px;
}
body {
  margin: 0;
  color: #666;
  background: #f5f8fa;
  line-height: 1.5em;
}
h1, h2, h3, h4, h5, h6 {
  font-weight: normal;
  line-height: 1.5em;
}

.wrapper {
  margin-top: 20px;
}
a {
  text-decoration: none;
}

</style>

