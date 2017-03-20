<template>
  <div>
    <div v-for="article in articles">
      <h1>{{ article.title }}</h1>
      <p>{{ article.content }}</p>
    </div>
  </div>
</template>

<script>
  import http from '../services/http'
  import userStore from '../stores/userStore'
  import PulseLoader from 'vue-spinner/src/PulseLoader.vue'

  export default {
    mounted() {
      this.fetchArticles()
    },
    data() {
      return {
        userState: userStore.state,
        articles: [],
        title: '',
        show_alert: false,
        alert_message: '',
      }
    },
    methods: {
      fetchArticles () {
        // TODO: not to send request when the user is not authenticated
        http.get('articles', res => {
          this.articles = res.data
        })
      },
      addArticle () {
        if (this.title === '') {
          this.show_alert = true
          this.alert_message = 'Article title should not be blank.'
          return false
        }
        http.post('articles', {title: this.title}, res => {
          this.articles[res.data.id] = res.data
          this.title = ''
          this.show_alert = false
          this.alert_message = ''
        })
      },
      completeArticle (article) {
        http.put('articles/' + article.id, {is_done: !article.is_done}, res => {
          this.articles[article.id] = res.data
          this.$forceUpdate()
        })
      },
      removeArticle (article) {
        http.delete('articles/' + article.id, {}, () => {
          delete this.articles[article.id]
          this.$forceUpdate()
        })
      },
    }
  }
</script>
