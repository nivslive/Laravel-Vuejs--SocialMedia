<script setup>
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
</script>


<template>
<div>

   <Subject/>
   <Messages :attData="att"/>
   <Sender @messageSended="(n) => attTimeline(n)" />
</div>
</template>
