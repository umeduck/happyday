<script setup>
import { onMounted, ref, reactive } from 'vue';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const headerHeight = ref('');
const footerHeight = ref('');
const formHeight = ref('');

const props =  defineProps({
  isLoggedIn : Boolean
});

const form = useForm({
  title: '',
  text: '',
  img: '',
  file: null
});

const makeMemory = (() => {
  router.post(route('memory.store'), {
    _method: 'post',
    title: form.title,
    text: form.text,
    file: form.file,
  });
});

onMounted(() => {
  const header = document.querySelector('#header');
  const footer = document.querySelector('#footer');
  headerHeight.value = header.clientHeight + 'px';
  footerHeight.value = footer.clientHeight + 'px';
  formHeight.value = {
    height: `calc(100vh - (${headerHeight.value} + ${footerHeight.value}))`
  };
});
</script>

<template>
  <Head title="memory create" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  <div class="form-wrapper" :style=formHeight>
    <form @submit.prevent="makeMemory" class="form-main" enctype="multipart/form-data">
      <h1 class="form-title">メモリー作成</h1>
      <div class="form-contents">
        <div class="form-content">
          <label for="title">タイトル</label>
          <input name="title" type="text" v-model="form.title">
        </div>
        <p class="error-message"></p>
        <div class="form-content">
          <label for="text">テキスト</label>
          <textarea name="text" v-model="form.text"></textarea>
        </div>
        <div class="error-placeholder">
          <p class="error-message"></p>
        </div>
        <div class="form-content">
          <label for="img">画像</label>
          <input type="file" name="img" @input="form.file = $event.target.files[0]">
        </div>
        <p class="error-message"></p>
      </div>
      <div class="form-button-wrapper">
        <button type="submit" class="form-button">
          作成
        </button>
      </div>
    </form>
  </div>
  <Footer></Footer>
</template>
<style>
.form-wrapper{
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.form-main{
  width: max-content;
  padding: 20px 100px;
  border: 1px solid #000000;
}
.form-title{
  font-size: 50px;
  text-align: center;
}
.form-content{
  display: flex;
  justify-content: space-between;
}
label{
  padding-right: 20px;
}
input{
width: 300px;
}
textarea{
  height: 134px;
  width: 300px;
}
.error-message{
  text-align: right;
  color: #ff0000;
  height: 26px;
}
.form-button-wrapper{
  text-align: center
}
.form-button{
  border: 1px solid #000000;
  padding: 5px;
}
</style>