<script setup>
import { Head, Link } from "@inertiajs/vue3";
import moment from "moment";
import Menu from "@/Inertia/Components/Menu.vue";
import Sender from "@/App/Components/Welcome/Sender.vue"
import { onMounted, ref, watch } from "vue";

onMounted(() => {
  const lasts = document.querySelector(".popular-lasts");
  lasts.style.width = "100%";
  const initWidth = Number(lasts.style.width.replace("%", ""));
  let partsByItem = initWidth / lasts.children.length;
  //let partsByItemMovel = partsByItem;
  let init = 0;
  //console.log(partsByItem)
  let parts = initWidth / lasts.children.length;
  setInterval(() => {
    const items = document.querySelectorAll(".popular-lasts-items");
    lasts.style.transition = "100s";
    //lasts.style.transform = `translateX(-${parts}%)`
    parts++;
    init++;
    //console.log(init, partsByItem)
    if (init === partsByItem) {
      const firstItem = items[0];
      //const lastItem = items[items.length - 1]
      lasts.removeChild(firstItem);
      lasts.append(firstItem);
      if (partsByItem >= initWidth) {
        partsByItem = initWidth / lasts.children.length;
        init = 0;
        parts = initWidth / lasts.children.length;
      } else {
        partsByItem += partsByItem;
      }
    }
  }, 100);
});
defineProps({
  variations: Object,
  chat: Object,
  id: Object,
  canLogin: Boolean,
  canRegister: Boolean,
});

setTimeout(() => {
    const app = document.querySelector('#app');
    app.removeAttribute('data-page');
}, 1)

const showSenderRef = ref(false);
function showSender() {
    showSenderRef.value = showSenderRef.value === true ? false : true;
    console.log(showSenderRef.value)
    const sender = document.querySelector('.sender-container')
    sender.style.opacity = showSenderRef.value ? '1' : '0'
    sender.style.height = showSenderRef.value ? '87px' : '0'
}

</script>



<style>
section {
  background: rgb(1, 0, 22);
}
.sender-container {
    opacity: 0;
    height: 0;
    transition: .4s;
}
.button-variation {
  padding: 5px 10px;
  margin: 3px;
  font-size: 9px;
  border-radius: 2px;
  transition: 0.5s;
  color: white;
}

.button-variation:hover {
  padding: 5px 14px;
}

.bg-dots-darker {
  background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-dots-lighter {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
  }
}
</style>



<template>
    <Menu @showSender="showSender()" />
    <Sender class="sender-container" :user="$page.props.auth.user ? $page.props.auth.user : {}" :chat="chat.id" :visible="showSenderRef.value" />
  <div>
    <section>
      memories
    </section>
      <section>
      <Head title="Welcome" />
      <div class="popular-lasts flex justify-center">
        <div class="popular-lasts-items" :key="key" v-for="(variation, key) in variations">
          <a :href="route('rooms', { slug: variation.slug })">
            <button class="button-variation px-4 text-stone-600 flex items-center">
              <h1 class="text-xl">{{ variation.title }}</h1>
              <b class="pl-1">Msgs: {{ variation.allsums }}</b>
            </button>
          </a>
        </div>
      </div>
  
      <div class="bests w-4/5 mx-auto">
        <h2
          class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-7xl sm:tracking-tight"
        >
          {{ chat.title }}
        </h2>
        <h2
          class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-2xl sm:tracking-tight"
        >
          {{ chat.description }}
        </h2>
      </div>
  
      <div class="bests">
        <a v-if="id[0].subjects[0]" :href="route('room', { chat: id[0].slug, subject: id[0].subjects[0].slug })">
          <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex">
              <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
              >
                <div>
                  <p v-if="id[0].subjects[0].user">
                    Usuário: {{ id[0].subjects[0].user.name }}
                  </p>
                  <p>Hora: {{ moment(id[0].subjects[0].created_at).format("HH:mm") }}</p>
                  <p>Mensagens: {{ id[0].subjects[0].messages_count }}</p>
                  <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    {{ id[0].subjects[0].title }}
                  </h2>
                  <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ id[0].subjects[0].description }}
                  </p>
                </div>
  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                      <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                  </svg>
              </div>
            </div>
          </div>
        </a>
      </div>
  
      <div class="bg-white flex">
        <a  v-if="id[0].subjects[1]"  :href="route('room', { chat: id[0].slug, subject: id[0].subjects[1].slug })">
          <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex">
              <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
              >
                <div>
                  <p v-if="id[0].subjects[1].user">
                    Usuário: {{ id[0].subjects[1].user.name }}
                  </p>
                  <p>Hora: {{ moment(id[0].subjects[1].created_at).format("HH:mm") }}</p>
                  <p>Mensagens: {{ id[0].subjects[1].messages_count }}</p>
                  <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    {{ id[0].subjects[1].title }}
                  </h2>
                  <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ id[0].subjects[1].description }}
                  </p>
                </div>
  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                      <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                  </svg>
              </div>
            </div>
          </div>
        </a>
  
        <a v-if="id[0].subjects[2]" :href="route('room', { chat: id[0].slug, subject: id[0].subjects[2].slug })">
          <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex">
              <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
              >
                <div>
                  <p v-if="id[0].subjects[2].user">
                    Usuário: {{ id[0].subjects[2].user.name }}
                  </p>
                  <p>Hora: {{ moment(id[0].subjects[2].created_at).format("HH:mm") }}</p>
                  <p>Mensagens: {{ id[0].subjects[2].messages_count }}</p>
                  <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    {{ id[0].subjects[2].title }}
                  </h2>
                  <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ id[0].subjects[2].description }}
                  </p>
                </div>
  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                      <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                  </svg>
              </div>
            </div>
          </div>
        </a>
  
        <a v-if="id[0].subjects[3]" :href="route('room', { chat: id[0].slug, subject: id[0].subjects[3].slug })">
          <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex">
              <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
              >
                <div>
                  <p v-if="id[0].subjects[3].user">
                    Usuário: {{ id[0].subjects[3].user.name }}
                  </p>
                  <p>Hora: {{ moment(id[0].subjects[3].created_at).format("HH:mm") }}</p>
                  <p>Mensagens: {{ id[0].subjects[3].messages_count }}</p>
                  <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                    {{ id[0].subjects[3].title }}
                  </h2>
                  <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    {{ id[0].subjects[3].description }}
                  </p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                      <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                  </svg>
              </div>
            </div>
          </div>
        </a>
      </div>
  
      <!--<a :href="`${route('subject.post')}`">POST SUBJECT</a>
      <a :href="`${route('message.post')}`">POST MESSAGE</a>-->
      <div
        class="relative overflow-x-auto sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
      >
  
        <div v-for="subject in id[0].subjects" :key="subject.id">
          <a :href="route('room', { chat: id[0].slug, subject: subject.slug })">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
              <div class="flex">
                <div
                  class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"
                >
                  <div>
                    <p v-if="subject.user">Usuário: {{ subject.user.name }}</p>
                    <p>Hora: {{ moment(subject.created_at).format("HH:mm") }}</p>
                    <p>Mensagens: {{ subject.messages_count }}</p>
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                      {{ subject.title }}
                    </h2>
                    <p v-if="subject.description"
                      class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                    >
                      {{ subject.description }}
                    </p>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                      <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                  </svg>
  
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
  </div>

</template>

