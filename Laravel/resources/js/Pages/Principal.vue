<script setup>
import NavLink from '@/components/NavLink.vue';
defineProps({
    data: Object,
});
</script>
<template>
    <div>
        <div :key="theme.id" v-for="(theme, value)  in data">
        <NavLink />
        <b> TEMAS QUE ESTÃO MAIS BOMBANDO: (TOP  {{value + 1}})</b>        {{  theme.title  }}
        <br>
        Quantidade de Mensagens em todas as salas: {{  theme.subjectsMessages }} <br><br>
        Mensagem mais curtida: 
        {{ theme.messageWithMoreLikes.message }}
        Curtidas: {{ theme.messageWithMoreLikes.likes }}
        <br><br><br><br><hr><hr><hr><br><br><br><br>
        </div>
        
    </div>
</template>



<style>

</style>