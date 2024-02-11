<script setup>
import { BaseTransitionPropsValidators, onMounted, ref } from 'vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
const headerHeight = ref('');
const footerHeight = ref('');
const formHeight = ref('');

const props =  defineProps({
  isLoggedIn : Boolean,
  memory: Object,
  dateId : Number,
  errors: Object
});

const form = useForm({
  title: props.memory.title,
  text: props.memory.text,
  imgPath: props.memory.img_path,
  file: null,
  dateId: props.memory.date_id
});

const formData = new FormData();
formData.append('image', form.file);

const makeMemory = (() => {
  router.post(route('memory.update',{memory: props.memory.id}), {
    _method: 'put',
    title: form.title,
    text: form.text,
    imgPath: props.memory.img_path,
    file: form.file,
    dateId: props.memory.date_id
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
  <GuestLayout :isLoggedIn = props.isLoggedIn>
    <div class="form-wrapper" :style=formHeight>
      <form @submit.prevent="makeMemory" class="form-main" enctype="multipart/form-data">
        <h1 class="form-title">メモリー編集</h1>
        <div class="form-contents">
          <InputLabel for="title" value="タイトル" />

          <TextInput
            id="title"
            type="text"
            class="mt-1 block w-full"
            v-model="form.title"
            required
            autofocus
          />
          <InputError class="mt-2" :message="errors.title" />
          <p class="error-message"></p>
          <InputLabel for="text" value="テキスト" />

          <TextInput
            id="text"
            type="text"
            class="mt-1 block w-full"
            v-model="form.text"
            required
            autofocus
          />
          <InputError class="mt-2" :message="errors.text" />
          <div class="error-placeholder">
            <p class="error-message"></p>
          </div>
          <div class="form-content">
            <label for="img">画像</label>
            <input type="file" name="img" @input="form.file = $event.target.files[0]">
          </div>
          <p>※画像が選択がされていない場合、元の画像が設定されます</p>
          <p class="error-message"></p>
        </div>
        <div class="form-button-wrapper">
          <button type="submit" class="form-button">
            作成
          </button>
        </div>
      </form>
    </div>
  </GuestLayout>
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