<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { ref, onMounted } from 'vue';

const headerHeight = ref('');
const footerHeight = ref('');
const completionHeight = ref('');
onMounted(() => {
  const header = document.querySelector('#header');
  const footer = document.querySelector('#footer');
  headerHeight.value = header.clientHeight + 'px';
  footerHeight.value = footer.clientHeight + 'px';
  completionHeight.value = {
    height: `calc(100vh - (${headerHeight.value} + ${footerHeight.value}))`
  };
});

</script>
<template>
  <Head title="トップページ" />
  <Header />
  <div class="completion-wrapper" :style=completionHeight>
    <div class="completion-main">
      <h1 class="completion-title">送信が完了しました</h1>
      <div class="completion-button-wrapper">
        <Link :href="route('top')" class="completion-button">トップページへ</Link>
      </div>
    </div>
  </div>
  <Footer />
</template>

<style scoped>
.completion-wrapper{
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.completion-main{
  width: max-content;
  padding: 20px 50px;
  border: 1px solid #000000;
}
.completion-title{
  text-align: center;
  font-size: 70px;
}
.completion-button-wrapper{
  width: 100%;
  text-align: center;
  font-size: 30px;
  height: 50px;
  margin: 23px 0;
}
.completion-button{
  border: 1px solid #000000;
  border-radius: 10px;
  background-color: #0000006b;
  padding: 20px;
  transition: all 1s;
}
.completion-button:hover{
  background-color: #000000b0;
}
</style>