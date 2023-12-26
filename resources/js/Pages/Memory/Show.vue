<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '../../Components/Header.vue';
import Footer from '../../Components/Footer.vue';
import { Inertia } from '@inertiajs/inertia';

const props =  defineProps({
  isLoggedIn : Boolean,
  memory : Object
});

const deleteMemory = id => {
    console.log(id);
  Inertia.delete(route('memory.destroy', { memory: id }),{
    onBefore: () => confirm('本当に削除しますか？')
  });
};

</script>
<template>
  <Head title="思い出 詳細" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        <img class="object-cover object-center rounded" alt="hero" :src="memory.img_path">
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ memory.title }}</h1>
        <p class="mb-8 leading-relaxed">{{ memory.text }}</p>
        <div class="flex justify-center">
          <button class="inline-flex text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg">編集</button>
          <button @click="deleteMemory(memory.id)" class="inline-flex text-white bg-pink-500 border-0 py-2 px-6 focus:outline-none hover:bg-pink-600 rounded text-lg">削除</button>
        </div>
      </div>
    </div>
  </section>
  <Footer></Footer>
</template>
<style>

</style>