<script setup>
    import {
        Head,
        Link
    } from "@inertiajs/vue3";
    import moment from "moment";
    import Menu from "@/Inertia/Components/Menu.vue";
    import Sender from "@/App/Components/Welcome/Sender.vue"
    import {
        onMounted,
        ref,
        watch
    } from "vue";



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
        theme: Object,
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
    section.custom-bg {
        background: linear-gradient(-45deg, #010000, #0c001c, #00051e, #000000);
        background-size: 400% 400%;
        animation: gradient 10s ease-in-out infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }


    .box {
        --border-size: 1px;
        --border-angle: 0turn;
        --color-bg: rgb(0, 0, 40);
        background-image: conic-gradient(from var(--border-angle), var(--color-bg), var(--color-bg) 50%, var(--color-bg)), conic-gradient(from var(--border-angle), transparent 20%, #08f, rgb(0, 9, 31));
        background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
        background-position: center center;
        background-repeat: no-repeat;
        border-radius: 3px;
        -webkit-animation: bg-spin 10s linear infinite;
        animation: bg-spin 10s linear infinite;
    }



    .box-2 {
        --border-size: 1px;
        --border-angle: 2turn;
        --color-bg: rgba(15, 13, 75, 0.546);
        background-image: conic-gradient(from var(--border-angle), var(--color-bg), var(--color-bg) 30%, var(--color-bg)), conic-gradient(from var(--border-angle), transparent 20%, rgb(5, 0, 137), rgb(0, 9, 31));
        background-size: calc(100% - (var(--border-size) * 2)) calc(100% - (var(--border-size) * 2)), cover;
        background-position: center center;
        background-repeat: no-repeat;
        border-radius: 3px;
        -webkit-animation: bg-spin 10s linear infinite;
        animation: bg-spin 20s linear infinite;
    }

    @-webkit-keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

    @keyframes bg-spin {
        to {
            --border-angle: 1turn;
        }
    }

    .box:hover {
        -webkit-animation-play-state: paused;
        animation-play-state: paused;
    }

    @property --border-angle {
        syntax: "<angle>";
        inherits: true;
        initial-value: 0turn;
    }


    .bg-custom-blue-gradient {
        /*background: linear-gradient(180deg, rgb(10 8 38) 0%, rgb(15 38 80) 100%);*/
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
    <Sender class="sender-container" :user="$page.props.auth.user ? $page.props.auth.user : {}" :theme="theme.id"
        :visible="showSenderRef.value" />
    <div>
        <section>
            memories
        </section>
        <section class="custom-bg">

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
                <h2 class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-7xl sm:tracking-tight">
                    {{ theme.title }}
                </h2>
                <h2 class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-2xl sm:tracking-tight">
                    {{ theme.description }}
                </h2>
            </div>

            <div class="bests">
                <a class="m-10" v-if="id[0].subjects[0]"
                    :href="route('room', { theme: id[0].slug, subject: id[0].subjects[0].slug })">
                    <div class="max-w-7xl mx-auto p-2 m-3 lg:p-8">
                        <div class="flex">
                            <div
                                class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none 
                flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col">
                                <div class="flex">



                                    <p class="flex py-2 px-5 mx-3 box-2 justify-center items-center"
                                        v-if="id[0].subjects[0].user">
                                        <!--<svg width="20px" style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                  viewBox="0 0 448 512">
                                  <path d="M224 256A128 114 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 
          512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" fill="white" /></svg>-->
                                        <img class="rounded-full mr-3" style="width: 35px"
                                            :src="id[0].subjects[0].user.profile_photo_url">
                                        {{ id[0].subjects[0].user.name }}
                                    </p>



                                    <p class="flex py-2 px-5 mx-3 box-2 justify-center items-center"><svg width="20px"
                                            style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512">
                                            <path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 
          243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" fill="white" /></svg>
                                        {{ moment(id[0].subjects[0].created_at).format("HH:mm") }}
                                    </p>


                                    <p class="flex py-2 px-5 mx-3 box-2 justify-center items-center">


                                        <svg fill="#000000" height="20px" width="30px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 458 458"
                                            xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M428,41.534H30c-16.569,0-30,13.431-30,30v252c0,16.568,13.432,30,30,30h132.1l43.942,52.243
            c5.7,6.777,14.103,10.69,22.959,10.69c8.856,0,17.258-3.912,22.959-10.69l43.942-52.243H428c16.568,0,30-13.432,30-30v-252
            C458,54.965,444.568,41.534,428,41.534z M323.916,281.534H82.854c-8.284,0-15-6.716-15-15s6.716-15,15-15h241.062
            c8.284,0,15,6.716,15,15S332.2,281.534,323.916,281.534z M67.854,198.755c0-8.284,6.716-15,15-15h185.103c8.284,0,15,6.716,15,15
            s-6.716,15-15,15H82.854C74.57,213.755,67.854,207.039,67.854,198.755z M375.146,145.974H82.854c-8.284,0-15-6.716-15-15
            s6.716-15,15-15h292.291c8.284,0,15,6.716,15,15C390.146,139.258,383.43,145.974,375.146,145.974z"
                                                        fill="white" />
                                                </g>
                                            </g>
                                        </svg>
                                        {{ id[0].subjects[0].messages_count }}</p>

                                </div>
                                <div class="" style="display: inline">
                                    <h2 class="mt-6 text-xl font-semibold text-slate-50 dark:text-white">
                                        {{ id[0].subjects[0].title }}
                                    </h2>
                                    <p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">
                                        {{ id[0].subjects[0].description }}
                                    </p>
                                </div>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="self-center shrink-0 stroke-white w-6 h-6 mx-6">
                                    <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="bg-white flex">
                <a v-if="id[0].subjects[1]"
                    :href="route('room', { theme: id[0].slug, subject: id[0].subjects[1].slug })">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <div class="flex">
                            <div
                                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
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

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                                    <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a v-if="id[0].subjects[2]"
                    :href="route('room', { theme: id[0].slug, subject: id[0].subjects[2].slug })">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <div class="flex">
                            <div
                                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
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

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                                    <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>

                <a v-if="id[0].subjects[3]"
                    :href="route('room', { theme: id[0].slug, subject: id[0].subjects[3].slug })">
                    <div class="max-w-7xl mx-auto p-6 lg:p-8">
                        <div class="flex">
                            <div
                                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                                    <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div
                class="relative overflow-x-auto sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

                <div v-for="subject in id[0].subjects" :key="subject.id">
                    <a :href="route('room', { theme: id[0].slug, subject: subject.slug })">
                        <div class="max-w-7xl mx-auto p-6 lg:p-8">
                            <div class="flex">
                                <div
                                    class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                    <div>
                                        <p v-if="subject.user">Usuário: {{ subject.user.name }}</p>
                                        <p>Hora: {{ moment(subject.created_at).format("HH:mm") }}</p>
                                        <p>Mensagens: {{ subject.messages_count }}</p>
                                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                            {{ subject.title }}
                                        </h2>
                                        <p v-if="subject.description"
                                            class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                            {{ subject.description }}
                                        </p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6">
                                        <path class="stroke-2" stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
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
