<template>
  <div class="block">
    <el-pagination
      layout="prev, pager, next"
      :page-count="pageCount"
      :current-page="currentPageNum"
      @current-change="changePage"
      >
    </el-pagination>
  </div>
</template>

<script>
  export default {
    // Tips. kebab-case will be converted to camelCase automatically.
    // current-page-num -> currentPageNum
    props: ['current-page-num', 'page-count'],
    methods: {
      changePage(newPageNum) {
        this.$emit('change-current', newPageNum)
      }
    }
  }
</script>

<style>
.block {
  margin-top: 20px;
}
</style>
