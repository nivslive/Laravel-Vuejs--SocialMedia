<script setup>
import {defineProps} from 'vue';
import Timeline from "@/Inertia/Components/Room/Timeline.vue";
import Menu from "@/Inertia/Components/Menu.vue";
defineProps({
    room: Object,
    canLogin: String,
});
</script>

<template>
  <Menu />
  <div id="room" class="w-5/6 m-auto">
   <Timeline :data="room" />
  </div>
</template>

<!--
<style lang="sass" scoped>
#room
  //background: red
</style>
-->
