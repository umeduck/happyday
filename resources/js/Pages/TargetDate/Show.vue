<script setup>
import { onMounted } from 'vue';

defineProps({
  targetDate : Object
});
</script>
<template>
  {{ targetDate.id }}
</template>
