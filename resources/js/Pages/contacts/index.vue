<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { ref, onMounted, watch, reactive } from 'vue';

const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
const headerHeight = ref('');
const footerHeight = ref('');
const formHeight = ref('');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const form = reactive({
  email: '',
  title: '',
  text: ''
});
const error = reactive({
  email: null,
  title: null,
  text: null
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

watch(form, () => {
  validateForm();
});

function validateForm() {
  if(form.email == ''){
    error.email = 'メールは必須項目です。';
  } else if (!regex.test(form.email)) {
    error.email = 'メールの形式が違います。';
  } else {
    error.email = null;
  }
  if(form.title == ''){
    error.title = 'タイトルは必須項目です。';
  } else {
    error.title = null;
  }
  if(form.text == ''){
    error.text = 'お問い合わせ内容は必須項目です。';
  } else {
    error.text = null;
  }
};

const contact = (() => {
    validateForm();
    if(error.email !== null){
      alert(error.email);
      return;
    } else if(error.title !== null){
      alert(error.title);
      return;
    } else if(error.text !== null){
      alert(error.text);
      return;
    }
    // console.log(csrfToken);
  axios.post('/contact/thanks', { data: form, _token: csrfToken })
    .then(response => {
        Inertia.post('/contact/thanks', form);
    })
    .catch(error => {
        console.error(error);
    });
});

</script>
<template>
  <Head title="トップページ" />
  <Header />
  <div class="form-wrapper" :style=formHeight>
    <form @submit.prevent="contact" class="form-main">
      <h1 class="form-title">お問い合わせ</h1>
      <div class="form-contents">
        <div class="form-content">
          <label>メールアドレス[必須]</label>
          <input
            v-model="form.email"
            name="email"
            type="text">
        </div>
        <p class="error-message">{{ error.email }}</p>
        <div class="form-content">
          <label>タイトル[必須]</label>
          <input
            v-model="form.title"
            name="title"
            type="text">
        </div>
        <p class="error-message">{{ error.title }}</p>
        <div class="form-content">
          <label>お問い合わせ内容[必須]</label>
          <textarea v-model="form.text"></textarea>
        </div>
        <div class="error-placeholder">
          <p class="error-message">{{ error.text }}</p>
        </div>
      </div>
      <div class="form-button-wrapper">
        <button type="submit" class="form-button">
          入力内容確認
        </button>
      </div>
    </form>
  </div>
  <Footer />
</template>

<style scoped>
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