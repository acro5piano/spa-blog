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
        class="markdown-editor" id="content" debounce="100"
        :value="content" :rows="20"
        @change="text => {$emit('input-content', text)}"></el-input>
    </el-col>
    <el-col :span="12">
        <el-card class="markdown-body markdown-preview box-card">
        <div v-html="marked(content)"></div>
      </el-card>
    </el-col>
  </el-row>
</template>

<script>
  import markdown from '@/utils/markdown'

  export default {
    props: ['title', 'content'],
    methods: {
      marked (text) {
        return markdown(text)
      },
    }
  }
</script>

<style>
.markdown-editor {
  height: 70vh;
  width: 95%;
  padding: 20px;
}

.markdown-preview {
  overflow-y: scroll;
  height: 75vh;
}

</style>
