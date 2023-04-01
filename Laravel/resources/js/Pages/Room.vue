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
  <div class="w-6/6 bg-custom-internal">
    <div id="room" class="w-5/6 m-auto h-full bg-black bg-custom-internal">
        <Timeline :data="room" />
    </div>
  </div>

</template>
<style>
</style>
