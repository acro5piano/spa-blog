<template>
  <el-row>
    <article-form :content="article.content" :title="article.title"
      @input-title="text => {article.title = text}"
      @input-content="text => {article.content = text}"/>
    <el-button type="primary" @click="updatePost">Update post</el-button>
  </el-row>
</template>

<script>
  import http from '@/services/http'
  import userStore from '@/stores/userStore'
  import form from './Form.vue'

  export default {
    mounted() {
      this.fetchArticle()
    },
    components: {
      articleForm: form
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
      updatePost () {
        var params = {
          content: this.article.content,
          title: this.article.title,
          published: true,
        }
        http.put(`articles/${this.article.id}`, params, () => {
          this.$router.push(`/articles/${this.article.id}`)
        })
      },
    }
  }
</script>
