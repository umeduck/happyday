<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Header from '../Components/Header.vue';
import Footer from '../Components/Footer.vue';
import { ref, onMounted } from 'vue';
const props = defineProps({
  isLoggedIn: Boolean,
  count: Date,
  userInfo: Object
});

let name = '';
if(props.isLoggedIn){
  name = props.userInfo[0].name;
}
</script>
<template>
  <Head title="Anniv" />
  <Header :isLoggedIn = props.isLoggedIn></Header>
  <div class="main" :style=completionHeight>
    <div class="main-left">
      <div class="anniv-contents">
        <div class="anniv-content">
          <div class="anniv-content-top">
            <p>小説発売日(サンプル)</p>
          </div>
          <div class="anniv-content-bottom">
            <p>2000-01-01</p>
            <p>残り10日</p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-right">
      <div class="user-birthday">
        <p class="user-birthday-text">{{ name }}の誕生日まであと</p>
        <p class="user-birthday-count">{{ count }}日</p>
      </div>
    </div>
  </div>
  <Footer></Footer>
</template>
<style>
.main{
  display: flex;
  padding: 30px 30px 30px 50px;
}
.main-left{
  width: 80%;
  background-color: #ffffff;
  padding: 20px;
}
.anniv-content{
  border: 1px solid black;
  padding: 20px;
}
.anniv-content-top{
  font-size: 30px;

}
.anniv-content-bottom{
  display: flex;
  justify-content: space-between;
  font-size: 30px;
  padding-top: 10px;
}
.main-right{
  margin-left: 5%;
  width: 40%;
  background-color: #ffffff;
}
.user-birthday{
  width: 100%;
  border: 1px black solid;
  padding: 20px;
}
.user-birthday-text{
  text-align: left;
  font-size: 25px;
}
.user-birthday-count{
  text-align: right;
  font-size: 30px;
  font-weight: bold;
}
</style>