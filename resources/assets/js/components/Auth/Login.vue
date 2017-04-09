<template>
  <el-row type="flex" justify="center">
    <el-col :span="14" type="flex" justify="center">
      <el-card class="box-card">
        <div slot="header" class="clearfix" @click="goToArticle(article.id)">
          Login
        </div>
        <div class="alert alert-danger" role="alert" v-if="show_alert">
          {{ alert_message }}
        </div>

        <div class="form-group">
          <el-input id="email" type="text" v-model="email" @keyup.enter.native="login" required autofocus>
            <template slot="prepend">Email</template>
          </el-input>
        </div>

        <div class="form-group">
          <el-input id="password" type="password" v-model="password" @keyup.enter.native="login" required autofocus>
            <template slot="prepend">Password</template>
          </el-input>
        </div>

        <div class="form-group">
          <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
          <el-button type="primary" @click="login">Login</el-button>
        </div>

        <!-- <a class="btn btn&#45;link" href="#"> -->
        <!--   Forgot Your Password? -->
        <!-- </a> -->
      </el-card>
    </el-col>
  </el-row>
</template>

<script>
  import userStore from '@/stores/userStore'
  import http from '@/services/http'

  export default {
    mounted () {
      this.fetchUsers()
    },
    data() {
      return {
        email: 'test@example.com',
        password: 'secret',
        users: [],
        show_alert: false,
        alert_message: '',
      }
    },
    methods: {
      login () {
        userStore.login(this.email, this.password, res => {
          this.$router.push('/')
        }, error => {
          this.show_alert = true
          this.alert_message = 'Wrong email or password.'
        })
      },
      fetchUsers () {
        http.get('users', res => {
          this.users = res.data.users
          this.email = this.users[0].email
        })
      }
    }
  }
</script>

<style>
  .form-group {
    margin-bottom: 10px;
  }
</style>
