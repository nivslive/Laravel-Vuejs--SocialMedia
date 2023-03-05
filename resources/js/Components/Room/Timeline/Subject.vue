<template>
<!-- Card header-->
<header class="flex w-100 flex-col justify-center items-unset pt-6 pb-4 px-5 border-b border-gray-200 m-auto">
  <!-- Image + name-->
  <div class="flex items-center"><a class="inline-flex items-start mr-3" href="#0"></a><img class="rounded-full" src="https://res.cloudinary.com/dc6deairt/image/upload/v1638102932/user-48-01_nugblk.jpg" width="48" height="48" alt="Lauren Marsano"/>
     <a class="inline-flex text-gray-800 hover:text-gray-900" href="#0">
      <h2 class="text-xl leading-snug font-bold" v-if="subject.user">{{  subject.user.name }}</h2></a>

      <a class="block text-sm font-medium hover:text-cyan-500" href="#0">@lauren.mars</a>

  </div>
    <div class="flex flex-col items-unset">
        <span class="text-lg whitespace-nowrap ml-2">{{  subject.title  }}</span>
        <span class="text-sm whitespace-wrap ml-2 break-words">{{  subject.description  }}</span>
    </div>
</header>

</template>
<script setup>
let subject = {};
/*
fetch("http://127.0.0.1:8000/chat/2", {
    })
      .then((message) => message.json())
      .then((json) => {
        subject = json[1];
});*/
</script>

<style lang="sass" scoped></style>
