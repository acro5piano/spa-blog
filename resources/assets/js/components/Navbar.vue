<template>
  <el-row class="navbar">
    <el-menu theme="dark" :default-active="'/'" :router="true" mode="horizontal" @select="handleSelect">
      <el-col :span="20">
        <el-menu-item index="/">Codecheer</el-menu-item>
        <el-menu-item index="/home">Home</el-menu-item>
      </el-col>
      <el-col :span="4" v-if="userState.authenticated">
        <el-submenu index="#">
          <template index="#" slot="title">{{ userState.user.name }}</template>
          <el-menu-item index="#" @click="logout">Log out</el-menu-item>
        </el-submenu>
      </el-col>
      <el-col :span="4" v-else>
        <el-menu-item index="/login">Log in</el-menu-item>
        <el-menu-item index="">
          <a href="/auth/register" target="_blank">Register</a>
        </el-menu-item>
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

