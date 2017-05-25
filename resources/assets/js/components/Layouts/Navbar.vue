<template>
  <el-row class="navbar">
    <el-menu theme="dark" :default-active="'/'" :router="true" mode="horizontal" @select="handleSelect">

      <el-col :span="14">
        <el-menu-item index="/">Codecheer</el-menu-item>
        <el-menu-item index="/articles">Articles</el-menu-item>
        <el-menu-item index="/home" v-if="userState.authenticated">Home</el-menu-item>
        <el-menu-item index="/articles/new" v-if="userState.authenticated">New item</el-menu-item>
      </el-col>

      <el-col :span="4" :push="6" v-if="userState.authenticated">
        <el-submenu index="#">
          <template index="#" slot="title">{{ userState.user.name }}</template>
          <el-menu-item index="#" @click="logout">Log out</el-menu-item>
        </el-submenu>
      </el-col>

      <el-col :span="10" v-if="! userState.authenticated">
        <el-menu-item index="#">
          <el-input id="email" type="text" name="email" v-model="email" placeholder="you@example.com" @keyup.enter.native="login" size="small" required autofocus>
          </el-input>
        </el-menu-item>

        <el-menu-item index="#">
          <el-input id="password" name="password" type="password" v-model="password" placeholder="Password" @keyup.enter.native="login" size="small" required autofocus>
          </el-input>
        </el-menu-item>

        <el-menu-item index="#">
          <!-- <el&#45;button type="primary" @click="login">Login</el&#45;button> -->
          <el-button type="primary" size="small" @click="login">Login</el-button>
        </el-menu-item>
      </el-col>

        <!-- <div class="form&#45;group"> -->
        <!--   <input type="checkbox" name="remember"> Remember Me -->
        <!-- </div> -->

    </el-menu>
  </el-row>
</template>

<script>
  import userStore from '@/stores/userStore'

  export default {
    data (){
      return {
        userState: userStore.state,
        email: '',
        password: ''
      }
    },
    methods: {
      logout() {
        userStore.logout( () => {
          this.$router.push('/')
        })
      },
      login () {
        userStore.login(this.email, this.password, res => {
          this.$router.push('/')
        }, error => {
          this.show_alert = true
          this.alert_message = 'Wrong email or password.'
        })
      },
      handleSelect() {
      },
    },
  }
</script>

