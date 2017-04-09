<template>
  <div>
    <articles v-if="userState.authenticated"/>

    <div v-else>
      <div class="top-wrapper">
        <div class="container">
          <h1>猫に小判。豚に真珠。<br>あなたにコード。</h1>
          <p>codecheerはプログラミングを学習する人々を繋ぐコミュニケーションサイトです。<br>登録ユーザーと応援し合い、学習ペースを共有する中で自分の技術力を高めよう！</p>
          <div class="btn-wrapper">
            <a href="#" class="btn signup">新規登録はこちら</a>
            <p>or</p>
            <a href="#" class="btn facebook">Facebookで登録</a>
          </div>
        </div>
      </div>
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
