<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
  <footer id="footer">
    <div class="footer-main">
      <div class="footer-left">
        <!-- // flex title-font font-medium items-center md:justify-start justify-center text-gray-900 -->
        <Link class="top-link" :href="route('top')">
          <img src="/images/main-logo.png" class="main-logo">
          <span class="main-title">Anniv</span>
        </Link>
      </div>
      <div class="footer-right">
        <!-- <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start"> -->
        <!-- Facebook -->
        <!-- <Link class="text-gray-500">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
          </Link> -->
        <!-- X(Twitter) -->
        <!-- Instagram -->
        <!-- <Link class="ml-3 text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
          </Link> -->
        <!-- LinkedIn -->
        <!-- <Link class="ml-3 text-gray-500">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
              <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </Link> -->
        <!-- </span> -->
        <p class="contact-title">お問い合わせ</p>
        <Link :href="route('contact.index')" class="sns-icon-wrapper">
          <svg fill="currentColor" class="mail-icon" viewBox="0 0 64 64">
            <path d="M14,18 L49,18 L32,34 Z M14,20 L32,36 L49,20 L49,45 L14,45 Z"/>
          </svg>
        </Link>
        <a href="https://twitter.com/umeduck_0116" class="sns-icon-wrapper">
          <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="twitter-icon" viewBox="0 0 24 24">
            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
          </svg>
        </a>
      </div>
    </div>
  </footer>
</template>

<style scoped>
@font-face {
  font-family: 'MochiyPopOne';
  src: url(/fonts/MochiyPopOne-Regular.ttf);
}
footer{
  width: 100%;
  background-image: linear-gradient(to bottom, #f810f44f, #f0f0f0, #f810f44f);
}
.footer-main{
  display: flex;
  padding: 2rem 1.25rem;
  align-items: center;
  justify-content: space-between;
}
.footer-left,.footer-right{
  display: flex;
  align-items: center;
}
.top-link{
  display: flex;
  align-items: center;
  padding-left: 2rem;
}
.main-logo{
  width: 4rem;
}
.main-title{
  font-size: 3rem;
  line-height: 1rem;
  margin-left: 1.5rem;
  font-family: 'Ephesis', cursive;
}
.contact-title{
  padding-right: 1rem;
  font-size: 1rem;
}
.sns-icon-wrapper{
  padding-right: 1rem;
}
.mail-icon{
  width: 3.5rem;
  height: 3.5rem;
}
.twitter-icon{
  width: 2.5rem;
  height: 2.5rem;
}

</style>