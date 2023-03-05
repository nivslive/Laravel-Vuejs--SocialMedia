<template>
<input class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-on:keyup.enter="send()" v-model="message" type="text" placeholder="escreva algo aqui:"/>
<!-- Bottom right button-->
<button class="absolute bottom-5 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 rounded-full text-center px-3 py-2 shadow-lg hover:bg-indigo-600 focus:outline-none focus-visible:ring-2" @click="send()"><span>Enviar Mensagem</span></button>
</template>
<script setup>
import { reactive, defineEmits } from 'vue';
const state = reactive({
    message: "",
});

const emit = defineEmits(['messageSended']);
function send() {
    fetch("http://127.0.0.1:8000/message/2", {
        method: "POST",
        body: new URLSearchParams({
          message: state.message,
        }),
      }).then((e) => {
        state.message = "";
        let heightPage = document.body.scrollHeight;
        setTimeout(() => {
          window.scrollTo(0, heightPage);
        }, 1000);
       emit("messageSended", e.json());
      });
}
</script>
