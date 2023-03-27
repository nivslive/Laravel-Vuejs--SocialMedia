<template>
    <div class="bg-black w-5/5">
        <div class="flex items-center justify-center py-3 bg-black w-4/5 m-auto">
        <input class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-on:keyup.enter="send()" v-model="state.subject" type="text" placeholder="Tem algum assunto em mente?"/>
        <!-- Bottom right button-->
        <button class="bottom-5 mx-2 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 rounded-full text-center px-3 py-2 shadow-lg hover:bg-indigo-600 focus:outline-none focus-visible:ring-2" @click="send()"><span>Começar um assunto</span></button>
    </div>
    </div>


</template>
<script setup>
    import { reactive, defineEmits, defineProps } from 'vue';
    const state = reactive({
        subject: "",
    });

    const props = defineProps({
        subject: String,
    });
    console.log(props.subject);
    const emit = defineEmits(['messageSended']);
    function send() {
        fetch("http://127.0.0.1:8000/api/subject/", {
            method: "POST",
            body: new URLSearchParams({
              'subject': state.subject,
              'user': ''
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
