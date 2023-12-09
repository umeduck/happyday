<script setup>
import { onMounted, ref } from 'vue';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const props =  defineProps({
  isLoggedIn : Boolean,
  targetDate : Object
});


</script>
<template>
  <Head title="Anniv" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  <div class="main" :key="reloadKey">
    <div class="target-date-content">
      <div class="target-date-head">
        <p>{{ targetDate.title }}</p>
        <div class="">
          <Link :href="route('top')" class="target-date-head-link">編集</Link>
          <Link :href="route('top')" class="target-date-head-link">削除</Link>
        </div>
      </div>
      <div class="target-date-body">
        <p>{{ targetDate.target_date }}</p><p>残り{{ targetDate.target_date_count }}日</p>
      </div>
    </div>
    <div class="memory-contents">
      <div class="memory-content">
        <div class="memory-head">
          <p>タイトル</p>
          <div class="">
            <Link :href="route('top')" class="memory-head-link">編集</Link>
            <Link :href="route('top')" class="memory-head-link">削除</Link>
          </div>
        </div>
        <div class="memory-body">
          <p>日付</p>
        </div>
      </div>
      <div class="memory-content">
        <div class="memory-head">
          <p>タイトル</p>
          <div class="">
            <Link :href="route('top')" class="memory-head-link">編集</Link>
            <Link :href="route('top')" class="memory-head-link">削除</Link>
          </div>
        </div>
        <div class="memory-body">
          <p>日付</p>
        </div>
      </div>
      <div class="memory-content">
        <div class="memory-head">
          <p>タイトル</p>
          <div class="">
            <Link :href="route('top')" class="memory-head-link">編集</Link>
            <Link :href="route('top')" class="memory-head-link">削除</Link>
          </div>
        </div>
        <div class="memory-body">
          <p>日付</p>
        </div>
      </div>
      <div class="memory-content">
        <div class="memory-head">
          <p>タイトル</p>
          <div class="">
            <Link :href="route('top')" class="memory-head-link">編集</Link>
            <Link :href="route('top')" class="memory-head-link">削除</Link>
          </div>
        </div>
        <div class="memory-body">
          <p>日付</p>
        </div>
      </div>
    </div>
  </div>
  <Footer></Footer>
</template>
<style scoped>
.main{
  padding: 30px 250px 30px 250px;
  min-height: 554px;
}
.target-date-content{
  border: 1px #000000 solid;
  width: 80%;
  height: 100%;
  padding: 10px 20px;
  margin-bottom: 30px;
}
.target-date-head{
  font-size: 35px;
  margin-bottom: 10px;
  display: flex;
  justify-content: space-between;
}
.target-date-head-link{
  margin-right: 10px;
  font-family: serif;
}
.target-date-body{
  font-size: 25px;
  display: flex;
  justify-content: space-between;
}
.memory-content{
  border: 1px solid #000000;
  width: 70%;
  padding: 10px 20px;
  margin-bottom: 20px;
}
.memory-head{
  font-size: 25px;
  display: flex;
  justify-content: space-between;
}
.memory-head-link{
  margin-right: 10px;
  font-family: serif;
}
.memory-body{
  font-size: 20px;
}
</style>