<template>
  <div style="height:80vh" class="container">
    <h2>New item</h2>
    <div class="col-md-6">
      <textarea style="height:80vh; " class="editor form-control" id="content" debounce="100"
        v-model="content">
      </textarea>
    </div>
    <div class="col-md-6" style="overflow:scroll; max-height:80vh">
      <div v-html="marked(content)"></div>
    </div>
    <div class="text-right">
      <button class="btn btn-primary" @click="createPost">Create post</button>
    </div>
  </div>
</template>

<script>
  import http from '../../services/http'
  import userStore from '../../stores/userStore'
  import marked from 'marked'

  export default {
    mounted() {
    },
    data() {
      return {
        userState: userStore.state,
        content: '',
      }
    },
    methods: {
      marked (text) {
        return marked(text)
      },
      createPost () {
        var params = {
          content: this.article.content,
          title: this.article.title,
          published: true,
        }

        http.post(`articles`, params, res => {
          this.$router.push(`/articles/${res.article.id}`)
        })
      },
    }
  }
</script>


