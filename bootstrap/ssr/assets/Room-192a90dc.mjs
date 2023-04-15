import { ssrRenderAttrs, ssrInterpolate, ssrRenderAttr, ssrRenderComponent, ssrRenderList, ssrRenderClass, ssrRenderStyle } from "vue/server-renderer";
import { reactive, mergeProps, useSSRContext, ref, watch, resolveComponent, unref } from "vue";
import moment from "moment";
import { _ as _export_sfc } from "./_plugin-vue_export-helper-cc2b3d55.mjs";
import { _ as _sfc_main$9 } from "./Menu-616b1640.mjs";
import "@headlessui/vue";
import "@heroicons/vue/24/outline";
const Favorite_vue_vue_type_style_index_0_lang$1 = "";
const _sfc_main$8 = {
  __name: "Favorite",
  __ssrInlineRender: true,
  props: {
    quantify: String,
    id: String,
    favorite: String
  },
  setup(__props) {
    const props = __props;
    const state = reactive({
      favorited: false,
      idData: null,
      quantifyData: null
    });
    state.favorited = props.favorite;
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<span${ssrRenderAttrs(mergeProps({ class: "flex" }, _attrs))}>`);
      if (state.favorited) {
        _push(`<h4 class="favorite-icon text-rose-600 font-bold cursor-pointer">♥</h4>`);
      } else {
        _push(`<!---->`);
      }
      if (!state.favorited) {
        _push(`<h4 class="favorite-icon text-gray-600 font-bold cursor-pointer">♥</h4>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<h4 class="pl-1 pb-1 text-sm font-bold flex items-center">${ssrInterpolate(state.quantifyData)}</h4></span>`);
    };
  }
};
const _sfc_setup$8 = _sfc_main$8.setup;
_sfc_main$8.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Messages/Favorite.vue");
  return _sfc_setup$8 ? _sfc_setup$8(props, ctx) : void 0;
};
const _sfc_main$7 = {
  __name: "Replys",
  __ssrInlineRender: true,
  props: {
    id: Number,
    att: Boolean,
    data: Object,
    message: Object
  },
  setup(__props) {
    const props = __props;
    const route = window.location.origin;
    console.log(props.id, "oi");
    const reactiveAtt = ref(props.att);
    watch(() => props.att, (newVal, oldVal) => {
      reactiveAtt.value = newVal;
      console.log("Prop changed: ", newVal, " | was: ", oldVal);
      if (reactiveAtt.value) {
        att();
      }
    });
    const state = reactive({
      more: false,
      messages: [],
      next_page: "",
      previous_page: ""
    });
    function att() {
      fetch(route + "/subject/by-id/" + props.id).then((message) => message).then((json) => {
        console.log(json.text);
        state.more = true;
        state.messages = json.messages.data;
        state.next_page = json.messages.next_page_url;
        state.previous_page = json.messages.prev_page_url;
        console.log(json);
      });
    }
    const add = "a a";
    let addFriendDataButton = ref(add);
    const follow = "0";
    let followUserDataButton = ref(follow);
    return (_ctx, _push, _parent, _attrs) => {
      const _component_Favorite = resolveComponent("Favorite");
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex border-t border-r border-b border-l-0 border-blue-600 border-opacity-20 pt-2 mb-10 rounded-2xl" }, _attrs))}>`);
      if (__props.message.user.profile_photo_url) {
        _push(`<div class="flex items-center flex-col p-4 m-4"><img class="rounded-full items-start flex-shrink-0 mb-3"${ssrRenderAttr("src", __props.message.user.profile_photo_url)} width="50" height="50" alt="Marie Zulfikar"><div class="w-6/6">`);
        if (__props.message.user.type === "admin") {
          _push(`<span class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center"> Administrador </span>`);
        } else {
          _push(`<!---->`);
        }
        if (__props.message.user.type === "vip") {
          _push(`<span class="bg-purple-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center"> VIP </span>`);
        } else {
          _push(`<!---->`);
        }
        if (__props.message.user.type === "guest") {
          _push(`<span class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center juhstify-center"> Convidado </span>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<h4 class="text-sm font-semibold text-blue-300 justify-center flex items-center"> @${ssrInterpolate(__props.message.user.slug)}</h4></div><div class="pt-2"><button class="pr-2 btn click-add-friend"><i class="fas fa-user-plus"></i> ${ssrInterpolate(unref(addFriendDataButton))}</button><button class="btn click-add-friend"><i class="fas fa-user-friends"></i> ${ssrInterpolate(unref(followUserDataButton))}</button></div></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="my-auto mr-auto px-3"><div class="text-[13px]"> Há alguns minutos atrás · ${ssrInterpolate(unref(moment)(__props.message.created_at).format("HH:mm DD/MM"))}</div><div class="text-[16px]">${ssrInterpolate(__props.message.message)} <div></div></div><div class="ml-auto">`);
      _push(ssrRenderComponent(_component_Favorite, {
        class: "pt-3",
        id: __props.message.id
      }, null, _parent));
      _push(` <i class="fas fa-reply" aria-hidden="true"></i></div></div></div>`);
    };
  }
};
const _sfc_setup$7 = _sfc_main$7.setup;
_sfc_main$7.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Messages/Replys.vue");
  return _sfc_setup$7 ? _sfc_setup$7(props, ctx) : void 0;
};
const _sfc_main$6 = {};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs) {
  _push(`<div${ssrRenderAttrs(mergeProps({ class: "w-full flex my-3" }, _attrs))}><input class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" placeholder="escreva algo aqui"><button class="bottom-5 mx-2 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 rounded-full text-center px-3 py-2 shadow-lg hover:bg-indigo-600 focus:outline-none focus-visible:ring-2"><span>Enviar</span></button></div>`);
}
const _sfc_setup$6 = _sfc_main$6.setup;
_sfc_main$6.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Messages/Sender.vue");
  return _sfc_setup$6 ? _sfc_setup$6(props, ctx) : void 0;
};
const Sender = /* @__PURE__ */ _export_sfc(_sfc_main$6, [["ssrRender", _sfc_ssrRender]]);
const Messages_vue_vue_type_style_index_0_scoped_16b14201_lang = "";
const _sfc_main$5 = {
  __name: "Messages",
  __ssrInlineRender: true,
  props: {
    id: Number,
    att: Boolean,
    data: Object
  },
  setup(__props) {
    const props = __props;
    const route = window.location.origin;
    console.log(props.id, "oi");
    const reactiveAtt = ref(props.att);
    watch(() => props.att, (newVal, oldVal) => {
      reactiveAtt.value = newVal;
      console.log("Prop changed: ", newVal, " | was: ", oldVal);
      if (reactiveAtt.value) {
        att();
      }
    });
    const state = reactive({
      more: false,
      messages: [],
      next_page: "",
      previous_page: ""
    });
    function att() {
      fetch(route + "/subject/by-id/" + props.id).then((message) => message).then((json) => {
        console.log(json.text);
        state.more = true;
        state.messages = json.messages.data;
        state.next_page = json.messages.next_page_url;
        state.previous_page = json.messages.prev_page_url;
        console.log(json);
      });
    }
    const add = "a a";
    let addFriendDataButton = ref(add);
    const follow = "0";
    let followUserDataButton = ref(follow);
    ref(false);
    ref(0);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[--><h3 class="text-xs font-semibold uppercase text-gray-400 mb-1" data-v-16b14201>MENSAGENS</h3><div class="divide-y divide-gray-200" data-v-16b14201></div><ul class="" data-v-16b14201><!--[-->`);
      ssrRenderList(props.data, (message) => {
        _push(`<li class="flex flex-col" data-v-16b14201><article class="flex w-full text-left my-2 rounded-md border border-transparent" data-v-16b14201>`);
        if (message.user.profile_photo_url) {
          _push(`<div class="flex flex-col items-center shadow-md rounded-lg p-4 m-4 shadow-lg flex border-t border-r border-t-0 border-b-0 border-l-0 border-blue-600 pt-2 mt-3 border-opacity-30 rounded-2xl" data-v-16b14201><img class="rounded-full items-start flex-shrink-0 mb-3"${ssrRenderAttr("src", message.user.profile_photo_url)} width="50" height="50" alt="Marie Zulfikar" data-v-16b14201><div class="w-6/6" data-v-16b14201>`);
          if (message.user.type === "admin") {
            _push(`<span class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center" data-v-16b14201> Administrador </span>`);
          } else {
            _push(`<!---->`);
          }
          if (message.user.type === "vip") {
            _push(`<span class="bg-purple-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center justify-center" data-v-16b14201> VIP </span>`);
          } else {
            _push(`<!---->`);
          }
          if (message.user.type === "guest") {
            _push(`<span class="bg-gray-900 text-[15px] text-[#ffff] px-3 rounded-full flex items-center juhstify-center" data-v-16b14201> Convidado </span>`);
          } else {
            _push(`<!---->`);
          }
          _push(`<h4 class="text-sm font-semibold text-blue-300 justify-center flex items-center" data-v-16b14201> @${ssrInterpolate(message.user.slug)}</h4></div><div class="pt-2" data-v-16b14201><button class="pr-2 btn click-add-friend" data-v-16b14201><i class="fas fa-user-plus" data-v-16b14201></i> ${ssrInterpolate(unref(addFriendDataButton))}</button><button class="btn click-add-friend" data-v-16b14201><i class="fas fa-user-friends" data-v-16b14201></i> ${ssrInterpolate(unref(followUserDataButton))}</button></div></div>`);
        } else {
          _push(`<!---->`);
        }
        _push(`<div class="my-auto mr-auto px-10 w-full bg-blue-500 bg-opacity-5 py-10 rounded-2xl" data-v-16b14201><div class="text-[13px]" data-v-16b14201> Há alguns minutos atrás · ${ssrInterpolate(unref(moment)(message.created_at).format("HH:mm DD/MM"))}</div><div class="text-[16px]" data-v-16b14201>${ssrInterpolate(message.message)} <div class="${ssrRenderClass("show-sender show-sender-" + message.id)}" data-v-16b14201>`);
        _push(ssrRenderComponent(Sender, null, null, _parent));
        _push(`</div><div class="ml-auto flex my-auto justify-between" data-v-16b14201>`);
        _push(ssrRenderComponent(_sfc_main$8, {
          class: "pt-3",
          id: message.id
        }, null, _parent));
        _push(`<button class="btn" data-v-16b14201><i class="fas fa-reply" aria-hidden="true" data-v-16b14201></i> Responder</button></div></div></div></article>`);
        _push(ssrRenderComponent(_sfc_main$7, {
          class: "ml-[15%]",
          message
        }, null, _parent));
        _push(`</li>`);
      });
      _push(`<!--]--></ul><!--]-->`);
    };
  }
};
const _sfc_setup$5 = _sfc_main$5.setup;
_sfc_main$5.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Messages.vue");
  return _sfc_setup$5 ? _sfc_setup$5(props, ctx) : void 0;
};
const Messages = /* @__PURE__ */ _export_sfc(_sfc_main$5, [["__scopeId", "data-v-16b14201"]]);
const Favorite_vue_vue_type_style_index_0_lang = "";
const _sfc_main$4 = {
  __name: "Favorite",
  __ssrInlineRender: true,
  props: {
    quantify: String,
    id: String,
    favorite: String
  },
  setup(__props) {
    const props = __props;
    const state = reactive({
      favorited: false,
      idData: null,
      quantifyData: null
    });
    state.favorited = props.favorite;
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<span${ssrRenderAttrs(mergeProps({ class: "flex" }, _attrs))}>`);
      if (state.favorited) {
        _push(`<h4 class="favorite-icon text-rose-600 font-bold cursor-pointer">♥</h4>`);
      } else {
        _push(`<!---->`);
      }
      if (!state.favorited) {
        _push(`<h4 class="favorite-icon text-gray-600 font-bold cursor-pointer">♥</h4>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<h4 class="pl-1 pb-1 favorite-icon-text font-bold flex items-center">${ssrInterpolate(state.quantifyData)}</h4></span>`);
    };
  }
};
const _sfc_setup$4 = _sfc_main$4.setup;
_sfc_main$4.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Subjects/Favorite.vue");
  return _sfc_setup$4 ? _sfc_setup$4(props, ctx) : void 0;
};
const _sfc_main$3 = {
  __name: "Subject",
  __ssrInlineRender: true,
  props: { data: Object },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<header${ssrRenderAttrs(mergeProps({ class: "flex w-100 flex-col justify-center items-unset pt-10 pb-10 px-5 p-12 border-b border-blue-600 border-opacity-20 mb-10 shadow-lg m-auto" }, _attrs))}>`);
      if (__props.data.user) {
        _push(`<div class="flex items-center"><a class="inline-flex items-start mr-3" href="#0"><img class="rounded-full"${ssrRenderAttr("src", __props.data.user.profile_photo_url)} width="48" height="48" alt="Lauren Marsano"></a><a class="inline-flex text-gray-800 hover:text-indigo-900 pr-3" href="#0"><h2 class="text-xl leading-snug font-bold text-white">${ssrInterpolate(__props.data.user.name)}</h2></a><a class="block text-sm font-medium hover:text-cyan-500" href="#0">@${ssrInterpolate(__props.data.user.slug)}</a></div>`);
      } else {
        _push(`<!---->`);
      }
      _push(`<div class="flex flex-col items-unset"><span class="text-lg whitespace-wrap break-words ml-2 flex justify-center">${ssrInterpolate(__props.data.title)}</span><span class="text-sm whitespace-wrap ml-2 break-words flex flex-col items-center justify-center">${ssrInterpolate(__props.data.description)} `);
      if (__props.data.photo) {
        _push(`<img id="file-input" class="rounded-full"${ssrRenderAttr("src", __props.data.photo.full_image_path)} width="800" height="auto" alt="Lauren Marsano">`);
      } else {
        _push(`<!---->`);
      }
      if (__props.data.links && __props.data.links.soundcloud_adjusted) {
        _push(`<iframe style="${ssrRenderStyle({ "border-radius": "30px", "border": "1.2px solid purple" })}" width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay"${ssrRenderAttr("src", __props.data.links.soundcloud_adjusted)}></iframe>`);
      } else {
        _push(`<!---->`);
      }
      if (__props.data.links && __props.data.links.youtube_adjusted) {
        _push(`<iframe style="${ssrRenderStyle({ "border-radius": "30px", "border": "1.2px solid purple" })}" width="560" height="315" class="my-10"${ssrRenderAttr("src", __props.data.links.youtube_adjusted)} title="YouTube video player" frameborder="0" allowfullscreen></iframe>`);
      } else {
        _push(`<!---->`);
      }
      _push(`</span><p class="text-sm whitespace-nowrap ml-2">${ssrInterpolate(unref(moment)(__props.data.created_at).format("HH:mm DD/MM"))}</p></div><div class="flex items-unset justify-between">`);
      _push(ssrRenderComponent(_sfc_main$4, {
        class: "pt-3",
        id: "0"
      }, null, _parent));
      _push(`<button class="btn"><i class="fas fa-reply" aria-hidden="true"></i> Responder</button></div></header>`);
    };
  }
};
const _sfc_setup$3 = _sfc_main$3.setup;
_sfc_main$3.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Subject.vue");
  return _sfc_setup$3 ? _sfc_setup$3(props, ctx) : void 0;
};
const _sfc_main$2 = {
  __name: "Sender",
  __ssrInlineRender: true,
  props: {
    subject: String
  },
  emits: ["messageSended"],
  setup(__props, { emit }) {
    const props = __props;
    const state = reactive({
      message: ""
    });
    console.log(props.subject);
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(mergeProps({ class: "flex items-center justify-center py-3" }, _attrs))}><input class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"${ssrRenderAttr("value", state.message)} type="text" placeholder="escreva algo aqui"><button class="bottom-5 mx-2 right-5 inline-flex items-center text-sm font-medium text-white bg-indigo-500 rounded-full text-center px-3 py-2 shadow-lg hover:bg-indigo-600 focus:outline-none focus-visible:ring-2"><span>Enviar</span></button></div>`);
    };
  }
};
const _sfc_setup$2 = _sfc_main$2.setup;
_sfc_main$2.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline/Sender.vue");
  return _sfc_setup$2 ? _sfc_setup$2(props, ctx) : void 0;
};
const _sfc_main$1 = {
  __name: "Timeline",
  __ssrInlineRender: true,
  props: {
    data: Object
  },
  setup(__props) {
    const props = __props;
    const att = ref(false);
    console.log(app, "oi??");
    function attTimeline(message) {
      console.log(message, "messages");
      att.value = true;
      setTimeout(() => {
        att.value = false;
      }, 10);
    }
    function _objectWithoutProperties(obj, keys) {
      var target = {};
      for (var i in obj) {
        if (keys.indexOf(i) >= 0)
          continue;
        if (!Object.prototype.hasOwnProperty.call(obj, i))
          continue;
        target[i] = obj[i];
      }
      return target;
    }
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(_attrs)}>`);
      _push(ssrRenderComponent(_sfc_main$3, {
        data: _objectWithoutProperties(props.data, ["messages"])
      }, null, _parent));
      _push(ssrRenderComponent(Messages, {
        att: att.value,
        id: props.data.id,
        data: props.data.messages
      }, null, _parent));
      _push(ssrRenderComponent(_sfc_main$2, {
        subject: props.data.id,
        onMessageSended: (n) => attTimeline(n)
      }, null, _parent));
      _push(`</div>`);
    };
  }
};
const _sfc_setup$1 = _sfc_main$1.setup;
_sfc_main$1.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Room/Timeline.vue");
  return _sfc_setup$1 ? _sfc_setup$1(props, ctx) : void 0;
};
const _sfc_main = {
  __name: "Room",
  __ssrInlineRender: true,
  props: {
    room: Object,
    canLogin: String
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<!--[-->`);
      _push(ssrRenderComponent(_sfc_main$9, null, null, _parent));
      _push(`<div class="w-6/6 bg-custom-internal text-white"><div id="room" class="w-5/6 m-auto h-full bg-black bg-custom-internal">`);
      _push(ssrRenderComponent(_sfc_main$1, { data: __props.room }, null, _parent));
      _push(`</div></div><!--]-->`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Room.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
