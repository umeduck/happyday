<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
  <header>
    <div class="header-main">
      <div class="header-right">
        <div class="top-links">
          <img src="images/main-logo-3.png" class="main-logo" alt="">
          <Link :href="route('top')" class="top-link-text" style="">Anniv</Link>
        </div>
      </div>
      <div class="header-left">
        <!-- ログアウト状態 -->
        <Link :href="route('top')" class="header-left-link">ログイン</Link>
        <Link :href="route('top')" class="header-left-link">新規登録</Link>
        <!-- ログイン状態 -->
        <!-- <Link :href="route('top')">ログアウト</Link> -->
        <!-- <Link :href="route('top')">ユーザー編集</Link> -->
      </div>
    </div>
  </header>
</template>
<style>
.header-main{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 100px;
  background-image: linear-gradient(90deg, #FFFFFF, #f810f44f);
}
.top-links{
  display: flex;
  align-items: center;
}
.main-logo{
  width: 17%;
  height: 17%;
  margin-right: 20px;
}
.top-link-text{
  font-family: 'Ephesis', cursive;
  font-size: 50px;
}
.header-left-link{
  font-size: 25px;
  margin-right: 40px;
  font-family: serif;
  font-weight: bold;
  border-bottom: 1px solid #000000;
}
.header-left-link:hover{
  border-bottom: none;
}
</style>