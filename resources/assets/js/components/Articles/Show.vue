<template>
  <div>
    <el-row type="flex" justify="center" class="wrapper">
      <el-col :span="20">
        <el-card class="box-card">
          <div slot="header" class="clearfix" @click="goToArticle(article.id)">
            <el-row>
              <el-col :span="22">
                <h1>{{ article.title }}</h1>
              </el-col>
              <el-col v-if="userState.authenticated && userState.user.id == article.user_id" :span="2">
                <el-button size="small" type="primary" icon="edit"
                           @click="$router.push(`/articles/${article.id}/edit`)">Edit</el-button>
              </el-col>
            </el-row>
          </div>
          <div class="markdown-body" v-html="marked(article.content)"></div>
        </el-card>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  import http from '@/services/http'
  import userStore from '@/stores/userStore'
  import markdown from '@/utils/markdown'

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
      marked: (text) => {
        return markdown(text)
      },
    }
  }
</script>

<style lang="scss">
.markdown-body {
  pre {
    background-color: #333;
    padding: 10px;
    code {
      color: white;
    }
  }
  h4 {
    text-decoration: underline;
  }
  li {
    margin: 0.8em 0 0.8em 0;
  }
}
</style>
