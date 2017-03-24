<template>
  <div>
    <h2>Your Articles</h2>
    <router-link to="/articles/new">New item</router-link>
    <nav>
      <ul class="pager">
        <li class="previous" v-if="current_page_num > 1">
          <a aria-label="Previous" @click="prevPage">
            <span aria-hidden="true">Prev</span>
          </a>
        </li>
        <li class="next" v-if="current_page_num < last_page_num">
          <a aria-label="Next" @click="nextPage">
            <span aria-hidden="true">Next</span>
          </a>
        </li>
      </ul>
    </nav>

    <div v-for="article in articles">
      <div class="panel panel-default" @click="goToArticle(article.id)">
        <div class="panel-heading">
          <h3>{{ article.title }}</h3>
        </div>
        <div class="panel-body">
          <p>{{ article.summary }} ...</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import http from '../services/http'
  import userStore from '../stores/userStore'

  export default {
    mounted() {
      console.log(this.$route.query.page)
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
          console.log(res.data)
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
