<script setup>
import { defineProps, reactive } from "vue";
import Messages from "@/Inertia/Components/Room/Timeline/Messages.vue";
import Subject from "@/Inertia/Components/Room/Timeline/Subject.vue";
import Sender from "@/Inertia/Components/Room/Timeline/Sender.vue";

const state = reactive({
    att: false,
});
const props = defineProps({
    data: Object,
});

function attTimeline(message) {
    console.log(message, 'messages');
    state.att = true;
    setTimeout(() => {
        state.att = false;
    }, 10);
}
function _objectWithoutProperties(obj, keys) {
  var target = {};
  for (var i in obj) {
    if (keys.indexOf(i) >= 0) continue;
    if (!Object.prototype.hasOwnProperty.call(obj, i)) continue;
    target[i] = obj[i];
  }
  return target;
}

</script>


<template>
<div>
   <Subject :data="_objectWithoutProperties(props.data, ['messages'])"/>
   <Messages :att="att" :data="props.data.messages"/>
   <Sender :subject="props.data.id" @messageSended="(n) => attTimeline(n)" />
</div>
</template>
