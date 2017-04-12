<template>
  <el-row>
    <el-input type="text" class="editor" id="title" debounce="100"
      v-model="article.title"></el-input>
    <article-form v-model="article.content"></article-form>
    <el-button type="primary" @click="updatePost">Create post</el-button>
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
