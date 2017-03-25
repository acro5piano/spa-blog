<template>
  <el-row class="navbar">
    <el-menu :default-active="'/'" :router="true" mode="horizontal" @select="handleSelect">
      <el-col :span="20">
        <el-menu-item index="/">Codecheer</el-menu-item>
        <el-menu-item index="/home">Home</el-menu-item>
      </el-col>
      <el-col :span="4">
        <el-submenu index="#" v-if="userState.authenticated">
          <template index="#" slot="title">{{ userState.user.name }}</template>
          <el-menu-item index="/about">About</el-menu-item>
          <el-menu-item index="#" @click="logout">Log out</el-menu-item>
        </el-submenu>
        <el-menu-item index="/login" v-else>Log in</el-menu-item>
      </el-col>
    </el-menu>
  </el-row>
</template>

<script>
  import userStore from '../stores/userStore'

  export default {
    data (){
      return {
        userState: userStore.state
      }
    },
    methods: {
      logout() {
        userStore.logout( () => {
          this.$router.push('/login')
        })
      },
      handleSelect() {
      },
    },
  }
</script>

