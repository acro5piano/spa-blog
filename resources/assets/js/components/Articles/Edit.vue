<template>
  <div style="height:80vh" class="container">
    <div class="col-md-6">
      <textarea style="height:80vh; " class="editor form-control" id="content" debounce="100"
        v-model="article.content">
      </textarea>
    </div>
    <div class="col-md-6" style="overflow:scroll; max-height:80vh">
      <div v-html="marked(article.content)"></div>
    </div>
    <div class="text-right">
      <button class="btn btn-primary" @click="updatePost">Update post</button>
    </div>
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
        console.log(this.article)
        http.get('articles/' + this.$route.params.id, res => {
          this.article = res.data
        })
      },
      marked (text) {
        return marked(text)
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


