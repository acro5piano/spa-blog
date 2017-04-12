<template>
  <div class="footer">
    <hr>
    <el-row class="footer-content">
      <el-col :span="20">
        &copy; 2017 - Codecheer
      </el-col>
      <el-col :span="4">
        <router-link  to="/about">About</router-link>
        /
        <a href="https://github.com/acro5piano/spa-blog" target="_blank"> GitHub </a>
      </el-col>
    </el-row>
  </div>
</template>

<style>
.footer {
  margin: 120px 0 60px 0;
}
.footer-content {
  margin: 120px 0 60px 0;
}
</style>
