<template>
  <div style="height:80vh" class="container">
    <h2>New item</h2>
    <el-input
      type="text"
      class="editor" id="title" debounce="100"
      v-model="article.title"></el-input>
    <el-input
    <article-form v-model="article.content"></article-form>
    <el-button type="primary" @click="createPost">Create post</el-button>
  </div>
</template>

<script>
  import http from '@/services/http'
  import userStore from '@/stores/userStore'

  export default {
    components: {
      articleForm: require('./Form')
    },
    data() {
      return {
        userState: userStore.state,
        article: {
          title: '',
          content: '',
        },
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
