<template>
  <div id="app">
      <navbar></navbar>
      <clip-loader v-if="loading" :size="size" class="loader"></clip-loader>
      <div class="container">
        <router-view></router-view>
      </div>
      <hr>
      <div class="container">
        <a href="https://github.com/acro5piano/spa-blog" target="_blank">
            <img src="/images/github.svg" width="30" height="20">
        </a>
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
    top:55px;
  }
</style>
