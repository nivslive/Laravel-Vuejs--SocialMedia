<script setup>
import { defineProps } from "vue";
import Messages from "@/Components/Room/Timeline/Messages.vue";
import Subject from "@/Components/Room/Timeline/Subject.vue";
import Sender from "@/Components/Room/Timeline/Sender.vue";
let att = false;
function attTimeline(message) {
    console.log(message);
    att = true;
    setTimeout(() => {
        att = false;
    }, 10);
}
defineProps({
    data: Object,
});
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
   <Subject :data="_objectWithoutProperties(data, ['messages'])"/>
   <Messages :data="data.messages"/>
   <Sender @messageSended="(n) => attTimeline(n)" />
</div>
</template>
