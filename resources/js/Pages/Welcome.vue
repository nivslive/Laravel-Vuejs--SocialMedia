<script setup>
import { Head, Link } from '@inertiajs/vue3';
import moment from 'moment';

defineProps({
    variations: Object,
    id: Object,
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
<template>
    <section class="flex">



    <Head title="Welcome" />
    <div class="width: 50px">
        <div style="width:100px" :key="key" v-for="(variation, key) in variations">
            <a :href="route('rooms', {slug: variation.slug})">
                <button class="button-variation px-4 text-stone-600	border border-gray-600">
                    {{ variation.title }} <b>[Msgs: {{  variation.allsums }}]</b></button>
            </a>
        </div>
    </div>
    <!--<a :href="`${route('subject.post')}`">POST SUBJECT</a>
    <a :href="`${route('message.post')}`">POST MESSAGE</a>-->
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>
        <div v-for="subject in id[0].subjects" :key="subject.id">
        <a :href="route('room', {'chat': id[0].slug, 'subject': subject.slug })">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex">
                    <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <p v-if="subject.user">Usuário: {{    subject.user.name}} </p>
                            <p>Hora: {{  moment(subject.created_at ).format('HH:mm')}}</p>
                            <p>Mensagens: {{  subject.messages_count  }}</p>
                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"> {{ subject.title }}  </h2>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                {{ subject.description }}
                            </p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </div>
                </div>
        </div>
    </a>

    </div>
</div>

    </section>

</template>

<style>
section {
    background: rgb(47, 0, 53);
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
