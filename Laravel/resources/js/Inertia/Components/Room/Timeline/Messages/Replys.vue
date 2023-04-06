<script setup>
import moment from "moment";
import { defineProps, reactive, watch, ref } from "vue";
const route = window.location.origin
const props = defineProps({
  id: Number,
  att: Boolean,
  data: Object,
  message: Object,
});

console.log(props.id, 'oi')

const reactiveAtt = ref(props.att);


watch(() => props.att, (newVal, oldVal) => {
  // watch it
  reactiveAtt.value = newVal;
  console.log("Prop changed: ", newVal, " | was: ", oldVal);
  if (reactiveAtt.value) {
    att();
  }
});

const state = reactive({
      more: false,
      messages: [],
      next_page: "",
      previous_page: "",
});

function att() {
    fetch( route  + "/subject/by-id/" + props.id)
    .then((message) => message)
    .then((json) => {
      console.log(json.text)
        state.more = true;
        state.messages = json.messages.data;
        state.next_page = json.messages.next_page_url;
        state.previous_page = json.messages.prev_page_url;
        console.log(json);
    });
}

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
    fetch( route  + "/chat/2")
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
    fetch( route + "/api/user-friends/", {
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
    fetch( route  + "/api/user-followers/", {
      method: "POST",
      body: JSON.stringify({ fodase: "oi" }),
    }).then((e) => {
    console.log(e)});
  }
}
</script>
<template>


          <!-- REPLY PARENT -->
          <div class="flex border-t border-r border-b border-l-0 border-blue-600  border-opacity-20 pt-2 mt-8 rounded-2xl">




            <div
                  class="flex items-center flex-col  p-4 m-4"
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
                  <div class="text-[16px]">{{ message.message }}
          
          
                    <div>
          
          
          
          
          
          
          
          
          
                      
                    </div>
                  
                    
                  </div>
                  <div class="ml-auto">
                      <Favorite class="pt-3" :id="message.id" /> <i @click="() => openReply()" class="fas fa-reply" aria-hidden="true"></i>
                  </div>
          
                </div>
          
          
          
          
          
          
                    </div>
                  

</template>

