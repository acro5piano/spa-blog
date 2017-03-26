<template>
  <div id="app">
    <navbar/>
    <clip-loader v-if="loading" :size="size" class="loader"></clip-loader>

    <el-row type="flex" justify="center" class="wrapper">
      <el-col :span="20">
        <router-view />
      </el-col>
    </el-row>

    <div class="footer">
      <hr>
      <el-row type="flex" justify="center">
        <el-col :span="20">
          <a href="https://github.com/acro5piano/spa-blog" target="_blank">
              <img src="/images/github.svg" width="30" height="20">
          </a>
        </el-col>
      </el-row>
    </div>
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
      navbar: require('./components/Navbar.vue')
    },
    data () {
      return {
        loading: false,
        size: '15px',
      }
    },
  }

</script>

<style>
.loader {
  position:absolute;
  left:10px;
  top:70px;
}
body {
  margin: 0;
  color: #555;
}
h1, h2, h3 {
  font-weight: normal;
}
.footer {
  margin-top: 60px;
}
.wrapper {
  margin-top: 20px;
}

</style>

