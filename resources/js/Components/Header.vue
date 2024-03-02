<script setup>
import { Link } from '@inertiajs/vue3';
const props = defineProps({
  isLoggedIn: Boolean
});
</script>
<template>
  <header id="header">
    <div class="header-main">
      <div class="header-left">
        <div class="top-links">
          <img src="/images/main-logo.png" class="main-logo" alt="">
          <Link :href="route('top', '', true)" class="top-link-text">Anniv</Link>
        </div>
      </div>
      <div class="header-right">
        <!-- ログアウト状態 -->
        <Link v-if="!props.isLoggedIn" :href="route('login')" class="header-left-link">ログイン</Link>
        <Link v-if="!props.isLoggedIn" :href="route('register')" class="header-left-link">新規登録</Link>
        <!-- ログイン状態 -->
        <Link v-if="props.isLoggedIn" :href="route('target-date.create')" class="header-left-link">ターゲット日作成</Link>
        <Link v-if="props.isLoggedIn" :href="route('profile.edit')" class="header-left-link">ユーザー編集</Link>
        <Link v-if="props.isLoggedIn" method="post" :href="route('logout')" class="header-left-link">ログアウト</Link>
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
  background-image: linear-gradient(to bottom, #f810f44f, #f0f0f0, #f810f44f);
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