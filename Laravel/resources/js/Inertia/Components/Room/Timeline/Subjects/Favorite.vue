<script setup>
import { defineProps, reactive } from "vue";


const props = defineProps({
    quantify: String,
    id: String,
    favorite: String,
});
const state = reactive({
      favorited: false,
      idData: null,
      quantifyData: null,
});
state.favorited = props.favorite;

function like() {
    state.favorited = state.favorited ? false : true;
    state.quantifyData = !state.favorited
    ? state.quantifyData - 1
    : state.quantifyData + 1;

    fetch(
    `http://127.0.0.1:8000/message/${props.id}/${
        state.favorited ? "like" : "deslike"
    }`, { method: "POST", cors: "no-cors",});
}

</script>


<template>
<span class="flex">
  <h4 class="favorite-icon text-rose-600  font-bold cursor-pointer" v-if="state.favorited" @click="like()">♥</h4>
  <h4 class="favorite-icon text-gray-600  font-bold cursor-pointer" v-if="!state.favorited" @click="like()">♥</h4>
  <h4 class="pl-1 pb-1 favorite-icon-text font-bold flex items-center">  {{ state.quantifyData }}</h4></span>
</template>



<style>
.favorite-icon {
    font-size: 3rem;
}
.favorite-icon-text {
    font-size: 1.5rem;
}
</style>
