<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props =  defineProps({
  isLoggedIn : Boolean,
  targetDate : Object,
  memories : Object
});
const deleteTargetDate = id => {
    console.log(id);
  Inertia.delete(route('target-date.destroy', { target_date: id }),{
    onBefore: () => confirm('本当に削除しますか？')
  });
};

</script>
<template>
  <Head title="ターゲット日詳細" />
  <GuestLayout :isLoggedIn = props.isLoggedIn>
    <div class="main-target-show" :key="reloadKey">
      <div class="target-date-content">
        <div class="target-date-head">
          <p>{{ targetDate.title }}</p>
          <div class="target-date-head-link-wrapper">
            <Link :href="route('target-date.edit', {id: targetDate.id})" class="target-date-head-link">編集</Link>
            <button @click="deleteTargetDate(props.targetDate.id)" class="target-date-head-link">削除</button>
            <Link :href="route('memory.create', {id: targetDate.id})" class="target-date-head-link">メモリー作成</Link>
          </div>
        </div>
        <div class="target-date-body">
          <p>{{ targetDate.target_date }}</p><p>残り{{ targetDate.target_date_count }}日</p>
        </div>
      </div>
      <div class="memory-contents">
        <div v-for="memory in props.memories" class="memory-content">
          <div class="memory-head">
            <Link :href="route('memory.show', {id: memory.id})"><p>{{ memory.title }}</p></Link>
            <div class="">
              <Link :href="route('top')" class="memory-head-link">編集</Link>
              <Link :href="route('top')" class="memory-head-link">削除</Link>
            </div>
          </div>
          <div class="memory-body">
            <p>{{ memory.created_at }}</p>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
<style scoped>
.main-target-show{
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
.target-date-head-link-wrapper{
  display: flex;
  justify-content: center;
  align-items: center;
}
.target-date-head-link{
  font-size: 30px;
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