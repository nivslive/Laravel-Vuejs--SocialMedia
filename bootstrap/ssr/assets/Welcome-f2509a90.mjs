import { reactive, watch, mergeProps, unref, useSSRContext, onMounted, ref } from "vue";
import { ssrRenderAttrs, ssrRenderAttr, ssrInterpolate, ssrRenderComponent, ssrRenderList, ssrRenderStyle } from "vue/server-renderer";
import { useForm, Head } from "@inertiajs/vue3";
import moment from "moment";
import { _ as _sfc_main$2 } from "./Menu-616b1640.mjs";
import "@headlessui/vue";
import "@heroicons/vue/24/outline";
const Sender_vue_vue_type_style_index_0_lang = "";
const _sfc_main$1 = {
  __name: "Sender",
  __ssrInlineRender: true,
  props: {
    subject: String,
    user: Object,
    theme: Number,
    visible: Boolean
  },
  emits: ["messageSended"],
  setup(__props, { emit }) {
    const props = __props;
    const state = reactive({
      subject: ""
    });
    const form = useForm({
      photo: null,
      title: state.subject,
      user_id: props.user.id,
      theme_id: props.theme
    });
    watch(() => form.photo, (newValue, oldValue) => {
      if (newValue !== oldValue) {
        console.log(newValue);
        form.title = newValue;
      }
    });
    watch(() => state.subject, (newValue, oldValue) => {
      if (newValue !== oldValue) {
        console.log(newValue);
        form.title = newValue;
      }
    });
    watch(() => props.visible, (newValue, oldValue) => {
      if (newValue !== oldValue) {
        console.log('A prop "visible" foi alterada!');
      }
    });
    console.log(props.visible, "visible");
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "bg-black w-5/5" }, _attrs))}><div class="flex items-center justify-center py-3 bg-black w-4/5 m-auto text-white"><input class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"${ssrRenderAttr("value", state.subject)} type="text" placeholder="Tem algum assunto em mente?"><input type="file">`);
      if (unref(form).photo) {
        _push(`<img width="40" class="image-bar"${ssrRenderAttr("src", unref(form).photoUrl)}>`);
      } else {
        _push(`<!---->`);
      }
      if (unref(form).progress) {
        _push(`<progress${ssrRenderAttr("value", unref(form).progress.percentage)} max="100">${ssrInterpolate(unref(form).progress.percentage)}% </progress>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<button class="bottom-5 mx-2 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 rounded-full text-center px-3 py-2 shadow-lg hover:bg-indigo-600 focus:outline-none focus-visible:ring-2"><span>Começar um assunto</span></button></div></div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/App/Components/Welcome/Sender.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const Welcome_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Welcome",
  __ssrInlineRender: true,
  props: {
    variations: Object,
    theme: Object,
    id: Object,
    canLogin: Boolean,
    canRegister: Boolean
  },
  setup(__props) {
    onMounted(() => {
      const lasts = document.querySelector(".popular-lasts");
      lasts.style.width = "100%";
      const initWidth = Number(lasts.style.width.replace("%", ""));
      let partsByItem = initWidth / lasts.children.length;
      let init = 0;
      initWidth / lasts.children.length;
      setInterval(() => {
        const items = document.querySelectorAll(".popular-lasts-items");
        lasts.style.transition = "100s";
        init++;
        if (init === partsByItem) {
          const firstItem = items[0];
          lasts.removeChild(firstItem);
          lasts.append(firstItem);
          if (partsByItem >= initWidth) {
            partsByItem = initWidth / lasts.children.length;
            init = 0;
            initWidth / lasts.children.length;
          } else {
            partsByItem += partsByItem;
          }
        }
      }, 100);
    });
    setTimeout(() => {
      const app = document.querySelector("#app");
      app.removeAttribute("data-page");
    }, 1);
    const showSenderRef = ref(false);
    function showSender() {
      showSenderRef.value = showSenderRef.value === true ? false : true;
      console.log(showSenderRef.value);
      const sender = document.querySelector(".sender-container");
      sender.style.opacity = showSenderRef.value ? "1" : "0";
      sender.style.height = showSenderRef.value ? "87px" : "0";
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_sfc_main$2, {
        onShowSender: ($event) => showSender()
      }, null, _parent));
      _push(ssrRenderComponent(_sfc_main$1, {
        class: "sender-container",
        user: _ctx.$page.props.auth.user ? _ctx.$page.props.auth.user : {},
        theme: __props.theme.id,
        visible: showSenderRef.value.value
      }, null, _parent));
      _push(`<div><section> memories </section><section class="custom-bg">`);
      _push(ssrRenderComponent(unref(Head), { title: "Welcome" }, null, _parent));
      _push(`<div class="popular-lasts flex justify-center"><!--[-->`);
      ssrRenderList(__props.variations, (variation, key) => {
        _push(`<div class="popular-lasts-items"><a${ssrRenderAttr("href", _ctx.route("rooms", { slug: variation.slug }))}><button class="button-variation px-4 text-stone-600 flex items-center"><h1 class="text-xl">${ssrInterpolate(variation.title)}</h1><b class="pl-1">Msgs: ${ssrInterpolate(variation.allsums)}</b></button></a></div>`);
      });
      _push(`<!--]--></div><div class="bests w-4/5 mx-auto"><h2 class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-7xl sm:tracking-tight">${ssrInterpolate(__props.theme.title)}</h2><h2 class="text-2xl font-bold leading-7 text-stone-50 sm:truncate sm:text-2xl sm:tracking-tight">${ssrInterpolate(__props.theme.description)}</h2></div><div class="bests">`);
      if (__props.id[0].subjects[0]) {
        _push(`<a class="m-10"${ssrRenderAttr("href", _ctx.route("room", { theme: __props.id[0].slug, subject: __props.id[0].subjects[0].slug }))}><div class="max-w-7xl mx-auto p-2 m-3 lg:p-8"><div class="flex"><div class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col"><div class="flex">`);
        if (__props.id[0].subjects[0].user) {
          _push(`<p class="flex py-2 px-5 mx-3 box-2 justify-center items-center"><img class="rounded-full mr-3" style="${ssrRenderStyle({ "width": "35px" })}"${ssrRenderAttr("src", __props.id[0].subjects[0].user.profile_photo_url)}> ${ssrInterpolate(__props.id[0].subjects[0].user.name)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<p class="flex py-2 px-5 mx-3 box-2 justify-center items-center"><svg width="20px" style="${ssrRenderStyle({ "margin-right": "5px" })}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 
          243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" fill="white"></path></svg> ${ssrInterpolate(unref(moment)(__props.id[0].subjects[0].created_at).format("HH:mm"))}</p><p class="flex py-2 px-5 mx-3 box-2 justify-center items-center"><svg fill="#000000" height="20px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 458 458" xml:space="preserve"><g><g><path d="M428,41.534H30c-16.569,0-30,13.431-30,30v252c0,16.568,13.432,30,30,30h132.1l43.942,52.243
            c5.7,6.777,14.103,10.69,22.959,10.69c8.856,0,17.258-3.912,22.959-10.69l43.942-52.243H428c16.568,0,30-13.432,30-30v-252
            C458,54.965,444.568,41.534,428,41.534z M323.916,281.534H82.854c-8.284,0-15-6.716-15-15s6.716-15,15-15h241.062
            c8.284,0,15,6.716,15,15S332.2,281.534,323.916,281.534z M67.854,198.755c0-8.284,6.716-15,15-15h185.103c8.284,0,15,6.716,15,15
            s-6.716,15-15,15H82.854C74.57,213.755,67.854,207.039,67.854,198.755z M375.146,145.974H82.854c-8.284,0-15-6.716-15-15
            s6.716-15,15-15h292.291c8.284,0,15,6.716,15,15C390.146,139.258,383.43,145.974,375.146,145.974z" fill="white"></path></g></g></svg> ${ssrInterpolate(__props.id[0].subjects[0].messages_count)}</p></div><div class="" style="${ssrRenderStyle({ "display": "inline" })}"><h2 class="mt-6 text-xl font-semibold text-slate-50 dark:text-white">${ssrInterpolate(__props.id[0].subjects[0].title)}</h2><p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">${ssrInterpolate(__props.id[0].subjects[0].description)}</p></div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-white w-6 h-6 mx-6"><path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div></div></div></a>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="bg-white flex">`);
      if (__props.id[0].subjects[1]) {
        _push(`<a${ssrRenderAttr("href", _ctx.route("room", { theme: __props.id[0].slug, subject: __props.id[0].subjects[1].slug }))}><div class="max-w-7xl mx-auto p-6 lg:p-8"><div class="flex"><div class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col"><div>`);
        if (__props.id[0].subjects[1].user) {
          _push(`<p> Usuário: ${ssrInterpolate(__props.id[0].subjects[1].user.name)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<p>Hora: ${ssrInterpolate(unref(moment)(__props.id[0].subjects[1].created_at).format("HH:mm"))}</p><p>Mensagens: ${ssrInterpolate(__props.id[0].subjects[1].messages_count)}</p><h2 class="mt-6 text-xl font-semibold text-slate-50">${ssrInterpolate(__props.id[0].subjects[1].title)}</h2><p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">${ssrInterpolate(__props.id[0].subjects[1].description)}</p></div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6"><path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div></div></div></a>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.id[0].subjects[2]) {
        _push(`<a${ssrRenderAttr("href", _ctx.route("room", { theme: __props.id[0].slug, subject: __props.id[0].subjects[2].slug }))}><div class="max-w-7xl mx-auto p-6 lg:p-8"><div class="flex"><div class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col"><div>`);
        if (__props.id[0].subjects[2].user) {
          _push(`<p> Usuário: ${ssrInterpolate(__props.id[0].subjects[2].user.name)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<p>Hora: ${ssrInterpolate(unref(moment)(__props.id[0].subjects[2].created_at).format("HH:mm"))}</p><p>Mensagens: ${ssrInterpolate(__props.id[0].subjects[2].messages_count)}</p><h2 class="mt-6 text-xl font-semibold text-slate-50">${ssrInterpolate(__props.id[0].subjects[2].title)}</h2><p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">${ssrInterpolate(__props.id[0].subjects[2].description)}</p></div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6"><path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div></div></div></a>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.id[0].subjects[3]) {
        _push(`<a${ssrRenderAttr("href", _ctx.route("room", { theme: __props.id[0].slug, subject: __props.id[0].subjects[3].slug }))}><div class="max-w-7xl mx-auto p-6 lg:p-8"><div class="flex"><div class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col"><div>`);
        if (__props.id[0].subjects[3].user) {
          _push(`<p> Usuário: ${ssrInterpolate(__props.id[0].subjects[3].user.name)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<p>Hora: ${ssrInterpolate(unref(moment)(__props.id[0].subjects[3].created_at).format("HH:mm"))}</p><p>Mensagens: ${ssrInterpolate(__props.id[0].subjects[3].messages_count)}</p><h2 class="mt-6 text-xl font-semibold text-slate-50">${ssrInterpolate(__props.id[0].subjects[3].title)}</h2><p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">${ssrInterpolate(__props.id[0].subjects[3].description)}</p></div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6"><path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div></div></div></a>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</div><div class="relative overflow-x-auto sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"><!--[-->`);
      ssrRenderList(__props.id[0].subjects, (subject) => {
        _push(`<div><a${ssrRenderAttr("href", _ctx.route("room", { theme: __props.id[0].slug, subject: subject.slug }))}><div class="max-w-7xl mx-auto p-6 lg:p-8"><div class="flex"><div class="box scale-100 p-5 bg-custom-blue-gradient text-slate-50 dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-indigo-500 flex-col"><div>`);
        if (subject.user) {
          _push(`<p>Usuário: ${ssrInterpolate(subject.user.name)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<p>Hora: ${ssrInterpolate(unref(moment)(subject.created_at).format("HH:mm"))}</p><p>Mensagens: ${ssrInterpolate(subject.messages_count)}</p><h2 class="mt-6 text-xl font-semibold text-slate-50">${ssrInterpolate(subject.title)}</h2>`);
        if (subject.description) {
          _push(`<p class="mt-4 text-gray-500 text-slate-50 text-sm leading-relaxed">${ssrInterpolate(subject.description)}</p>`);
        } else {
          _push(`<!---->`);
        }
        _push(`</div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-black w-6 h-6 mx-6"><path class="stroke-2" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path></svg></div></div></div></a></div>`);
      });
      _push(`<!--]--></div></section></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Welcome.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
