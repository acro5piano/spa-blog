<template>
  <div>
    <articles v-if="userState.authenticated"/>

    <div class="top-wrapper" v-else>
      <el-row type="flex" justify="center">

        <el-col :span="12">
          <h1>猫に小判。豚に真珠。<br>あなたにコード。</h1>
          <p>codecheerはプログラミングを学習する人々を繋ぐコミュニケーションサイトです。<br>登録ユーザーと応援し合い、学習ペースを共有する中で自分の技術力を高めよう！</p>
        </el-col>

        <el-col :span="8" type="flex" justify="center">
          <div class="form-group">
            <el-alert
              v-if="showAlert"
              :title="alertMessage"
              type="warning"
              :closable="false"
              show-icon/>
          </div>

          <div class="form-group">
            <el-input id="name" type="text" v-model="name" @keyup.enter.native="register"
              placeholder="Your name"
              required autofocus>
            </el-input>
          </div>

          <div class="form-group">
            <el-input id="email" type="email" required autofocus
              placeholder="you@example.com"
              v-model="email" @keyup.enter.native="register">
            </el-input>
          </div>

          <div class="form-group">
            <el-input id="password" type="password" required autofocus
              placeholder="Password"
              v-model="password" @keyup.enter.native="register">
            </el-input>
          </div>

          <div class="form-group">
            <el-input id="password_confirmation" type="password" v-model="password_confirmation" @keyup.enter.native="register"
              placeholder="Retype password..."
              required autofocus>
            </el-input>
          </div>

          <div class="form-group">
            <el-button type="primary" @click="register">Register</el-button>
          </div>
        </el-col>

      </el-row>
    </div>
  </div>
</template>

<script>
  import userStore from '@/stores/userStore'

  export default {
    components: {
      articles: require('./Articles/Index.vue')
    },
    mounted() {
    },
    data() {
      return {
        userState: userStore.state,
      }
    },
    methods: {
    }
  }
</script>

<style>
.top-wrapper {
  min-height: 100vh;
  padding: 150px 0 100px 0;
  background-image: url(/images/sunsetwithboy.png);
  background-size: cover;
  color: white;
  height:750px;
}
</style>
