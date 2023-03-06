<script setup>
import moment from "moment";
import Favorite from "./Messages/Favorite.vue";
import { defineProps, reactive, watch  } from "vue";

const props = defineProps({
    att: Boolean,
    data: Object,
});


const state = reactive({
    reactiveAtt: props.att
});
watch(props.att, (newVal, oldVal) => {
      // watch it
      state.reactiveAtt = newVal;
      console.log("Prop changed: ", newVal, " | was: ", oldVal);
      if (state.reactiveAtt) {
        att();
      }
});


/*
const props = defineProps({
    data: Object,
    attData: Boolean,
});
const state = reactive({
      more: false,
      messages: [],
      next_page: "",
      previous_page: "",
      attD: props.attData,
});
state.favorited = props.favorite;

att();
setInterval(() => {
    console.log("atualizado 1 minuto depois");
    att();
}, 60000);

watch(state.attD, (newVal, oldVal) => {
      // watch it
      state.attD = newVal;
      console.log("Prop changed: ", newVal, " | was: ", oldVal);
      if (state.attD) {
        this.att();
      }
});

function att() {
    fetch("http://127.0.0.1:8000/chat/2")
    .then((message) => message.json())
    .then((json) => {
        state.more = true;
        state.messages = json[1].messages.data;
        state.next_page = json[1].messages.next_page_url;
        state.previous_page = json[1].messages.prev_page_url;
        console.log(json);
    });
}
function moreMessages(url) {
    fetch(url)
    .then((message) => message.json())
    .then((json) => {
        state.messages = json[1].messages.data;
        state.next_page = json[1].messages.next_page_url;
        state.previous_page = json[1].messages.prev_page_url;
    });
}*/


</script>
<template>
    {{  props.att }}
<!-- Card body-->
<h3 class="text-xs font-semibold uppercase text-gray-400 mb-1">MENSAGENS</h3>
<!-- Chat list-->
<div class="divide-y divide-gray-200"></div>
<!-- User-->
<ul>
  <li class="flex w-full text-left py-2 focus:outline-none focus-visible:bg-indigo-50" v-for="message in props.data" :key="message.id">
    <div class="flex items-center"></div><img class="w-9 h-9 rounded-full items-start flex-shrink-0 mr-3" :src="message.user.profile_photo_url" width="32" height="32" alt="Marie Zulfikar"/>
    <div>
      <div class="flex">
        <h4 class="text-sm font-semibold text-gray-900 flex items-center"> {{message.user.name}} </h4>
        <h4 class="text-sm font-semibold text-pink-400 pl-2 flex items-center">@mariezulfika</h4>
        <!-- <Favorite :quantify="message.likes" :id="message.id" :favorite="message.already_liked"></Favorite>-->
      </div>
      <div class="text-[13px]">Há alguns minutos atrás &middot; {{ moment(message.created_at).format("HH:mm DD/MM") }}</div>
      <div class="text-[14px]"> {{  message.message }}</div>
    </div>
  </li>
</ul>
<div class="flex items-center justify-center py-3">
  <button class="btn btn-blue text-sm" v-if="previous_page" @click="moreMessages(previous_page)">Página anterior</button>
  <button class="btn btn-blue text-sm btn-blue:hover" v-if="next_page" @click="moreMessages(next_page)">Próxima página</button>
</div>
</template>

<!--
<style lang="sass" scoped>
.btn
  @apply font-bold py-2 px-4 rounded
.btn-blue
  @apply border-stone-400	 text-stone-600

.btn-blue:hover
  @apply bg-indigo-700
</style>
-->
