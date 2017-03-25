<template>
  <el-row>
    <el-col :span="12">
      <textarea style="width: 90%; height:80vh; " class="editor" id="content" debounce="100"
        v-model="article.content">
      </textarea>
    </el-col>
    <el-col :span="12">
      <div class="col-md-6" style="overflow:scroll; height:80vh">
        <div v-html="marked(article.content)"></div>
      </div>
      <div class="text-right">
        <button class="btn btn-primary" @click="updatePost">Update post</button>
      </div>
    </el-col>
  </el-row>
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


