import { ssrRenderAttrs, ssrRenderList, ssrRenderComponent, ssrInterpolate } from "vue/server-renderer";
import { _ as _sfc_main$1 } from "./NavLink-ea838e6e.mjs";
import { useSSRContext } from "vue";
import "@inertiajs/vue3";
const _sfc_main = {
  __name: "Principal",
  __ssrInlineRender: true,
  props: {
    data: Object
  },
  setup(__props) {
    return (_ctx, _push, _parent, _attrs) => {
      _push(`<div${ssrRenderAttrs(_attrs)}><!--[-->`);
      ssrRenderList(__props.data, (theme, value) => {
        _push(`<div>`);
        _push(ssrRenderComponent(_sfc_main$1, null, null, _parent));
        _push(`<b> TEMAS QUE ESTÃO MAIS BOMBANDO: (TOP ${ssrInterpolate(value + 1)})</b> ${ssrInterpolate(theme.title)} <br> Quantidade de Mensagens em todas as salas: ${ssrInterpolate(theme.subjectsMessages)} <br><br> Mensagem mais curtida: ${ssrInterpolate(theme.messageWithMoreLikes.message)} Curtidas: ${ssrInterpolate(theme.messageWithMoreLikes.likes)} <br><br><br><br><hr><hr><hr><br><br><br><br></div>`);
      });
      _push(`<!--]--></div>`);
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Pages/Principal.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as default
};
