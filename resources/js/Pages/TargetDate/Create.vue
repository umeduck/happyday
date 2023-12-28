<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Inertia } from "@inertiajs/inertia";
import TextInput from '@/Components/TextInput.vue';
import Header from '@/Components/Header.vue';
import Footer from '@/Components/Footer.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  isLoggedIn: Boolean
});

const form = useForm({
    title: 'タイトル',
    targetDate: '2000-01-01',
    targetDateType: '1'
});

const storeTargetDate = () => {
  Inertia.post('/target-date', form);
};
</script>

<template>
  <Head title="target_date create" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  <div class="main-target-create">
    <form @submit.prevent="storeTargetDate" class="target-form">
      <div>
        <InputLabel for="title" value="タイトル" />

        <TextInput
          id="title"
          type="text"
          class="mt-1 block w-full"
          v-model="form.title"
          required
          autofocus
        />

        <InputError class="mt-2" :message="form.errors.title" />
      </div>

      <div class="mt-4">
        <InputLabel for="target_date" value="ターゲット日" />

        <TextInput
          id="targetDate"
          type="date"
          class="mt-1 block w-full"
          v-model="form.targetDate"
          required
        />

        <InputError class="mt-2" :message="form.errors.targetDate" />
      </div>

      <div class="mt-4">
        <InputLabel for="birthday" value="ターゲットタイプ" />

        <select v-model="form.targetDateType" class="mt-1 block w-full" required>
          <option value='' selected>-- 選択してください --</option>
          <option value=1>誕生日</option>
          <option value=2>記念日</option>
        </select>

        <InputError class="mt-2" :message="form.errors.targetDateType" />
      </div>
      <div class="target-create-button">
        <button >登録</button>
      </div>
    </form>
  </div>
  <Footer></Footer>
</template>
<style>
.main-target-create{
  padding: 80px 350px 30px 350px;
  min-height: 554px;
}
.target-form{
  background-color: #FFFFFF;
  padding: 50px 100px;
}
.target-create-button{
  display: flex;
  justify-content: center;
  margin-top: 30px;
}
.target-create-button button{
  background-color: #ffe4e1;
  border-radius: 100vh;
  width: 240px;
  height:  60px;
  text-align: center;
  font-size: 20px;
  text-shadow: #FC0 1px 0 10px;
}
.target-create-button button:hover{
  background-color: #ffb6c1;
}
</style>