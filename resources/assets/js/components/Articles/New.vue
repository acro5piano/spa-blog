<template>
  <div style="height:80vh" class="container">
    <h2>New item</h2>
    <article-form :content="article.content" :title="article.title"
      @input-title="text => {article.title = text}"
      @input-content="text => {article.content = text}"/>
    <el-button type="primary" @click="createPost">Create post</el-button>
  </div>
</template>

<script>
  import http from '../../services/http'
  import userStore from '../../stores/userStore'
  import form from './Form.vue'

  export default {
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
      createPost () {
        var params = {
          title: this.article.title,
          content: this.article.content,
          published: true,
        }
        http.post('articles', params, res => {
          this.$router.push(`/articles/${res.data.id}`)
        })
      },
    }
  }
</script>
