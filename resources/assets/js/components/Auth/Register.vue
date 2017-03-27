<template>
  <el-row type="flex" justify="center">
    <el-col :span="14" type="flex" justify="center">
      <el-card class="box-card">
        <div slot="header" class="clearfix" @click="goToArticle(article.id)">
          Register
        </div>

        <div class="form-group">
          <el-alert
            v-if="showAlert"
            :title="alertMessage"
            type="warning"
            :closable="false"
            show-icon/>
        </div>

        <div class="form-group">
          <el-input id="name" type="text" v-model="name" @keyup.enter.native="register" required autofocus>
            <template slot="prepend">Email</template>
          </el-input>
        </div>

        <div class="form-group">
          <el-input id="email" type="email" v-model="email" @keyup.enter.native="register" required autofocus>
            <template slot="prepend">Email</template>
          </el-input>
        </div>

        <div class="form-group">
          <el-input id="password" type="password" v-model="password" @keyup.enter.native="register" required autofocus>
            <template slot="prepend">Password</template>
          </el-input>
        </div>

        <div class="form-group">
          <el-input id="password_confirmation" type="password" v-model="password_confirmation" @keyup.enter.native="register" required autofocus>
            <template slot="prepend">Password Confirm</template>
          </el-input>
        </div>

        <div class="form-group">
          <el-button type="primary" @click="register">Register</el-button>
        </div>

      </el-card>
    </el-col>
  </el-row>
</template>

<script>
  import userStore from '../../stores/userStore'
  import http from '../../services/http'

  export default {
    mounted () {
    },
    data() {
      return {
        name: 'Kazuya Gosho',
        email: 'test@example.com',
        password: 'secret',
        password_confirmation: 'secret',
        showAlert: false,
        alertMessage: '',
      }
    },
    methods: {
      register () {
        var params = {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation,
        }

        http.post('register', params, res => {
          this.$router.push('/home')
          userStore.login(this.email, this.password, res => {
            this.$router.push('/')
          }, error => {
            this.showAlert = true
            this.alertMessage = 'Wrong email or password.'
          })
        }, error => {
          this.showAlert = true
          this.alertMessage = 'Wrong email or password.'
        })
      },
    }
  }

</script>

<style>
  .form-group {
    margin-bottom: 10px;
  }
</style>

