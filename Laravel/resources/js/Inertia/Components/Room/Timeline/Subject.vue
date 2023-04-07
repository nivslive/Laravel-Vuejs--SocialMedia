<template>
<!-- Card header-->
<header class="flex w-100 flex-col justify-center items-unset pt-10 pb-10 px-5 p-12 border-b border-blue-600  border-opacity-20 mb-10 shadow-lg m-auto">
  <!-- Image + name-->
  <div class="flex items-center" v-if="data.user">
    <a class="inline-flex items-start mr-3" href="#0">
        <img class="rounded-full" :src="data.user.profile_photo_url" width="48" height="48" alt="Lauren Marsano"/>
    </a>
     <a class="inline-flex text-gray-800 hover:text-indigo-900 pr-3" href="#0">
      <h2 class="text-xl leading-snug font-bold text-white">{{ data.user.name }} </h2></a>

      <a class="block text-sm font-medium hover:text-cyan-500" href="#0">@{{  data.user.slug  }}</a>

  </div>
    <div class="flex flex-col items-unset">
        <span class="text-lg whitespace-wrap break-words ml-2">  {{  data.title }}  </span>
        <span class="text-sm whitespace-wrap ml-2 break-words">  {{  data.description }} 


          
        </span>
        <p class="text-sm whitespace-nowrap ml-2">            {{ moment(data.created_at).format("HH:mm DD/MM") }}  </p>
    </div>
    <div class="flex items-unset justify-between">
      <Favorite class="pt-3" :id="'0'" /> 
      <button class="btn"><i @click="() => openReply()" class="fas fa-reply" aria-hidden="true"></i> Responder</button>
    </div>
</header>

</template>
<script setup>
import moment from 'moment'
import Favorite from './Subjects/Favorite.vue';
//let subject = {};
/*
fetch("http://127.0.0.1:8000/chat/2", {
    })
      .then((message) => message.json())
      .then((json) => {
        subject = json[1];
});*/
import { defineProps } from 'vue';

defineProps({ data: Object });
</script>

<style lang="sass" scoped></style>
