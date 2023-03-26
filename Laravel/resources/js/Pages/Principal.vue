<script setup>
import NavLink from '@/components/NavLink.vue';
defineProps({
    data: Object,
});
</script>
<template>
    <div>
        <div :key="chat.id" v-for="(chat, value)  in data">
        <NavLink />
        <b> TEMAS QUE ESTÃO MAIS BOMBANDO: (TOP  {{value + 1}})</b>        {{  chat.title  }}
        <br>
        Quantidade de Mensagens em todas as salas: {{  chat.subjectsMessages }} <br><br>
        Mensagem mais curtida: 
        {{ chat.messageWithMoreLikes.message }}
        Curtidas: {{ chat.messageWithMoreLikes.likes }}
        <br><br><br><br><hr><hr><hr><br><br><br><br>
        </div>
        
    </div>
</template>



<style>

</style>