<template>
  <div>
    <h2>Your Articles</h2>
    <router-link to="/articles/new"><el-button type="text">New item</el-button></router-link>

    <div v-for="article in articles">
      <el-card class="box-card">
        <div slot="header" class="clearfix" @click="goToArticle(article.id)">
          {{ article.title }}
        </div>
        <p>{{ article.summary }} ...</p>
      </el-card>
    </div>

  </div>
</template>

<script>
  import http from '../services/http'
  import userStore from '../stores/userStore'

  export default {
    mounted() {
      this.fetchArticles()
    },
    data() {
      return {
        userState: userStore.state,
        articles: [],
        current_page_num: Number(this.$route.query.page) || 1,
        last_page_num: 0,
      }
    },
    methods: {
      // TODO: not to send request when the user is not authenticated
      fetchArticles () {
        http.get('home', res => {
          this.articles = res.data.data
          this.last_page_num = res.data.last_page
        })
      },
      goToArticle (id) {
        this.$router.push(`/articles/${id}`)
      },

      nextPage () {
        this.current_page_num += 1
        this.$router.push(`/?page=${this.current_page_num}`)
        this.fetchArticles()
      },
      prevPage () {
        this.current_page_num -= 1
        this.$router.push(`/?page=${this.current_page_num}`)
        this.fetchArticles()
      },
    }
  }
</script>
