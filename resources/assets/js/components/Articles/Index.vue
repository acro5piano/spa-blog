<template>
  <div>
    <el-row>
      <el-col :span=20>
        <h2>New posts</h2>
      </el-col>

      <el-col :span=4>
        <pagination :current-page-num="currentPageNum" :page-count="pageCount"
                    @change-current="changePage"></pagination>
      </el-col>
    </el-row>


    <div v-for="article in articles">
      <el-card class="box-card">
        <div slot="header" class="clearfix" @click="goToArticle(article.id)">
          {{ article.title }}
        </div>
        <p>{{ article.summary }} ...</p>
      </el-card>
    </div>

    <el-row>
      <el-col :span=4 :push=20>
        <pagination :current-page-num="currentPageNum" :page-count="pageCount"
                    @change-current="changePage"></pagination>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import http from '@/services/http'
  import userStore from '@/stores/userStore'
  import pagination from './Pagination.vue'

  export default {
    mounted() {
      this.fetchArticles()
    },
    components: {
      pagination: pagination
    },
    data() {
      return {
        userState: userStore.state,
        articles: [],
        currentPageNum: Number(this.$route.query.page) || 1,
        last_page_num: 0,
        pageCount: 0,
      }
    },
    methods: {
      // TODO: not to send request when the user is not authenticated
      // TODO: なぜか2回リクエストが飛んでしまう
      fetchArticles () {
        http.get(`articles?page=${this.currentPageNum}`, res => {
          this.articles = res.data.data
          this.pageCount = res.data.last_page
        })
      },
      goToArticle (id) {
        this.$router.push(`/articles/${id}`)
      },
      changePage(newPageNum){
        this.currentPageNum = newPageNum
        this.$router.push(`/?page=${this.currentPageNum}`)
        this.fetchArticles()
      }
    }
  }
</script>

<style>
.box-card {
  margin-top: 20px;
  margin-bottom: 48px;
}
</style>
