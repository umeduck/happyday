<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import Header from '../Components/Header.vue';
import Footer from '../Components/Footer.vue';

</script>

<template>
  <Header :isLoggedIn = $page.props.isLoggedIn></Header>
  <slot />
  <Footer />
</template>