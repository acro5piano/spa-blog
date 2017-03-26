<template>
  <el-row>
    <el-input
      type="text"
      class="editor" id="title" debounce="100"
      :value="title" :rows="20"
      @change="text => {$emit('input-title', text)}"></el-input>
    <el-col :span="12">
      <el-input
        type="textarea"
        style="width: 90%; height:80vh;"
        class="editor" id="content" debounce="100"
        :value="content" :rows="20"
        @change="text => {$emit('input-content', text)}"></el-input>
    </el-col>
    <el-col :span="12">
      <div style="overflow-y:scroll; height:80vh" v-html="marked(content)"></div>
    </el-col>
  </el-row>
</template>

<script>
  import marked from 'marked'

  export default {
    props: ['title', 'content'],
    methods: {
      marked (text) {
        return marked(text || '')
      },
    }
  }
</script>
