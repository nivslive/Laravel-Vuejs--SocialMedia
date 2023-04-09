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
  <Draggable />
    <div class="flex flex-col items-unset">
        <span class="text-lg whitespace-wrap break-words ml-2 flex justify-center">  {{  data.title }}  </span>
        <span class="text-sm whitespace-wrap ml-2 break-words flex flex-col items-center justify-center">  {{  data.description }} 
          <img id="file-input" class="rounded-full" v-if="data.photo" :src="data.photo.full_image_path" width="800" height="auto" alt="Lauren Marsano"/>
          <iframe style="border-radius: 30px; border: 1.2px solid purple" width="100%" height="300" scrolling="no" 
          frameborder="no" allow="autoplay"
          v-if="data.links && data.links.soundcloud_adjusted" :src="data.links.soundcloud_adjusted"></iframe>
        
          <iframe class="my-3" style="border-radius:12px" src="https://open.spotify.com/embed/track/0dpz1f81FVaCZ0Q45oNlGo?utm_source=generator" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
          <iframe style="border-radius: 30px; border: 1.2px solid purple" width="560" height="315" class="my-10" v-if="data.links && data.links.youtube_adjusted" :src="data.links.youtube_adjusted" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
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
import Draggable from './Subjects/Draggable.vue';
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

