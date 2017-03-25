<template>
  <div>
    <h2>{{ article.title }}</h2>
    <p class="text-right" v-if="userState.authenticated && userState.user.id == article.user_id">
      <router-link :to="`/articles/${article.id}/edit`">Edit</router-link>
    </p>

    <div v-html="marked(article.content)"></div>
  </div>
</template>

<script>
  import http from '../../services/http'
  import userStore from '../../stores/userStore'
  import marked from 'marked'

  export default {
    mounted() {
      this.fetchArticle()
    },
    data() {
      return {
        userState: userStore.state,
        article: {},
      }
    },
    methods: {
      fetchArticle () {
        http.get('articles/' + this.$route.params.id, res => {
          this.article = res.data
        })
      },
      marked: (text) => { return marked(text || '') },
    }
  }
</script>

