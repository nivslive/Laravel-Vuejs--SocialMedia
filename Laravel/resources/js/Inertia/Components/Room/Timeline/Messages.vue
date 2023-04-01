<script setup>
import moment from "moment";
import Favorite from "./Messages/Favorite.vue";
import { defineProps, reactive, watch, ref } from "vue";

const props = defineProps({
  att: Boolean,
  data: Object,
});

const state = reactive({
  reactiveAtt: props.att,
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
const add = "a a";
const postAdd = "a e";
let addFriendDataButton = ref(add);
function addFriend(el) {
  console.log(el);
  addFriendDataButton.value = addFriendDataButton.value === add ? postAdd : add;
  if (addFriendDataButton.value === postAdd) {
    fetch("http://127.0.0.1:8000/api/user-friends/", {
      method: "POST",
      body: JSON.stringify({ fodase: "oi" }),
    });
  }
}

const follow = "0";
const postFollow = "1";
let followUserDataButton = ref(follow);
function followUser(el) {
  console.log(el);
  followUserDataButton.value =
    followUserDataButton.value === follow ? postFollow : follow;
  if (followUserDataButton.value === postFollow) {
    fetch("http://127.0.0.1:8000/api/user-followers/", {
      method: "POST",
      body: JSON.stringify({ fodase: "oi" }),
    });
  }
}
</script>
<template>
  {{ props.att }}
  <!-- Card body-->
  <h3 class="text-xs font-semibold uppercase text-gray-400 mb-1">MENSAGENS</h3>
  <!-- Chat list-->
  <div class="divide-y divide-gray-200"></div>
  <!-- User-->
  <ul class="">
    <li
      class="flex w-full text-left my-2 py-2 bg-blue-500 bg-opacity-10 rounded-md border border-transparent"
      v-for="message in props.data"
      :key="message.id"
    >
      <div
        class="flex items-center flex-col bg-blue-400 bg-opacity-10 shadow-md rounded-lg p-4 m-4"
        v-if="message.user.profile_photo_url"
      >
        <img
          class="rounded-full items-start flex-shrink-0 mb-3"
          :src="message.user.profile_photo_url"
          width="50"
          height="50"
          alt="Marie Zulfikar"
        />
        <div class="w-6/6">
          <span
            class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center"
            v-if="message.user.type === 'admin'"
          >
            Administrador
          </span>

          <span
            class="bg-purple-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center"
            v-if="message.user.type === 'vip'"
          >
            VIP
          </span>

          <span
            class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center juhstify-center"
            v-if="message.user.type === 'guest'"
          >
            Convidado
          </span>

          <!--<h4 class="text-sm font-bold text-white flex items-center"> {{message.user.name}} </h4>-->
          <h4
            class="text-sm font-semibold text-blue-300 justify-center flex items-center"
          >
            @{{ message.user.slug }}
          </h4>
          <!-- <Favorite :quantify="message.likes" :id="message.id" :favorite="message.already_liked"></Favorite>-->
        </div>
        <div class="pt-2">
            <button @click="addFriend(message.user.id)" class="pr-2 btn click-add-friend">
            <i class='fas fa-user-plus'></i>  {{ addFriendDataButton }}
        </button>
        <button @click="followUser(message.user.id)" class="btn click-add-friend">
            <i class="fas fa-user-friends"></i> {{ followUserDataButton }}
        </button>
        </div>

      </div>

      <div class="my-auto mr-auto px-3">
        <div class="text-[13px]">
          Há alguns minutos atrás &middot;
          {{ moment(message.created_at).format("HH:mm DD/MM") }}
        </div>
        <div class="text-[16px]">{{ message.message }}</div>
        <div class="ml-auto">
            <Favorite class="pt-3" :id="message.id" /> <i class="fas fa-reply" aria-hidden="true"></i>
        </div>

      </div>
    </li>
  </ul>
  <div class="flex items-center justify-center py-3">
    <button
      class="btn btn-blue text-sm"
      v-if="previous_page"
      @click="moreMessages(previous_page)"
    >
      Página anterior
    </button>
    <button
      class="btn btn-blue text-sm btn-blue:hover"
      v-if="next_page"
      @click="moreMessages(next_page)"
    >
      Próxima página
    </button>
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
