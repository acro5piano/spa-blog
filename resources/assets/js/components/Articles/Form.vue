<template>
  <el-row>
    <el-col :span="12">
      <el-input
        type="textarea"
        class="markdown-editor" id="content" debounce="100"
        :value="value" :rows="20"
        @input.native="$emit('input', $event.target.value)"></el-input>
    </el-col>
    <el-col :span="12">
        <el-card class="markdown-body markdown-preview box-card">
        <div v-html="marked(value)"></div>
      </el-card>
    </el-col>
  </el-row>
</template>

<script>
  import markdown from '@/utils/markdown'

  export default {
    props: ['value'],
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
