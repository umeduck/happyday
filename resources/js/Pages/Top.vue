<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '../Components/Header.vue';
import Footer from '../Components/Footer.vue';
const props = defineProps({
  isLoggedIn: Boolean,
  count: Date,
});
</script>
<template>
  <Head title="Anniv" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  {{ count }}
  <Footer></Footer>
</template>