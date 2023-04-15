import { reactive, onMounted, unref, mergeProps, withCtx, createVNode, openBlock, createBlock, Transition, createTextVNode, toDisplayString, Fragment, renderList, createCommentVNode, useSSRContext } from "vue";
import { ssrRenderComponent, ssrRenderList, ssrRenderAttr, ssrRenderClass, ssrInterpolate } from "vue/server-renderer";
import { Disclosure, DisclosureButton, Menu, MenuButton, MenuItems, MenuItem, DisclosurePanel } from "@headlessui/vue";
import { Bars3Icon, XMarkIcon, BellIcon } from "@heroicons/vue/24/outline";
const Menu_vue_vue_type_style_index_0_lang = "";
const _sfc_main = {
  __name: "Menu",
  __ssrInlineRender: true,
  props: {
    subject: String
  },
  emits: ["showSender"],
  setup(__props, { emit }) {
    const props = __props;
    const navigation = [
      { name: "Criar Assunto", href: "#", current: false, class: "create_subject" },
      { name: "Home", href: "#", current: true }
    ];
    reactive({
      subject: ""
    });
    console.log(props.subject);
    onMounted(() => {
      document.querySelector(".create_subject").onclick = () => {
        console.log("oi");
        emit("showSender");
      };
    });
    return (_ctx, _push, _parent, _attrs) => {
      _push(ssrRenderComponent(unref(Disclosure), mergeProps({
        as: "nav",
        class: "bg-gray-800"
      }, _attrs), {
        default: withCtx(({ open }, _push2, _parent2, _scopeId) => {
          if (_push2) {
            _push2(`<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8"${_scopeId}><div class="relative flex h-16 items-center justify-between"${_scopeId}><div class="absolute inset-y-0 left-0 flex items-center sm:hidden"${_scopeId}>`);
            _push2(ssrRenderComponent(unref(DisclosureButton), { class: "inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<span class="sr-only"${_scopeId2}>Open main menu</span>`);
                  if (!open) {
                    _push3(ssrRenderComponent(unref(Bars3Icon), {
                      class: "block h-6 w-6",
                      "aria-hidden": "true"
                    }, null, _parent3, _scopeId2));
                  } else {
                    _push3(ssrRenderComponent(unref(XMarkIcon), {
                      class: "block h-6 w-6",
                      "aria-hidden": "true"
                    }, null, _parent3, _scopeId2));
                  }
                } else {
                  return [
                    createVNode("span", { class: "sr-only" }, "Open main menu"),
                    !open ? (openBlock(), createBlock(unref(Bars3Icon), {
                      key: 0,
                      class: "block h-6 w-6",
                      "aria-hidden": "true"
                    })) : (openBlock(), createBlock(unref(XMarkIcon), {
                      key: 1,
                      class: "block h-6 w-6",
                      "aria-hidden": "true"
                    }))
                  ];
                }
              }),
              _: 2
            }, _parent2, _scopeId));
            _push2(`</div><div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"${_scopeId}><div class="flex flex-shrink-0 items-center text-white"${_scopeId}><b${_scopeId}>YORUS.</b>club </div><div class="hidden sm:ml-6 sm:block"${_scopeId}><div class="flex space-x-4"${_scopeId}><!--[-->`);
            ssrRenderList(navigation, (item) => {
              _push2(`<a${ssrRenderAttr("href", item.href)} class="${ssrRenderClass(
                [
                  item.current ? "bg-gray-900 text-white" : item.class + " text-gray-300 hover:bg-gray-700 hover:text-white",
                  item.class + " rounded-md px-3 py-2 text-sm font-medium"
                ]
              )}"${ssrRenderAttr("aria-current", item.current ? "page" : void 0)}${_scopeId}>${ssrInterpolate(item.name)}</a>`);
            });
            _push2(`<!--]--></div></div></div>`);
            if (_ctx.$page.props.auth.user == null) {
              _push2(`<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"${_scopeId}><a${ssrRenderAttr("href", _ctx.route("login"))} class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"${_scopeId}> Log in</a><a${ssrRenderAttr("href", _ctx.route("register"))} class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"${_scopeId}> Register</a></div>`);
            } else {
              _push2(`<!---->`);
            }
            if (_ctx.$page.props.auth.user !== null) {
              _push2(`<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"${_scopeId}>`);
              _push2(ssrRenderComponent(unref(Menu), {
                as: "div",
                class: "relative ml-3"
              }, {
                default: withCtx((_, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"${_scopeId3}><span class="sr-only"${_scopeId3}>View notifications</span>`);
                          _push4(ssrRenderComponent(unref(BellIcon), {
                            class: "h-6 w-6",
                            "aria-hidden": "true"
                          }, null, _parent4, _scopeId3));
                          _push4(`</button>`);
                        } else {
                          return [
                            createVNode("button", {
                              type: "button",
                              class: "rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            }, [
                              createVNode("span", { class: "sr-only" }, "View notifications"),
                              createVNode(unref(BellIcon), {
                                class: "h-6 w-6",
                                "aria-hidden": "true"
                              })
                            ])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                    _push3(`</div>`);
                    _push3(ssrRenderComponent(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<p${_scopeId3}>Notificações</p>`);
                          _push4(ssrRenderComponent(unref(MenuItem), null, {
                            default: withCtx(({ active }, _push5, _parent5, _scopeId4) => {
                              if (_push5) {
                                _push5(`<a href="#" class="${ssrRenderClass([active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"])}"${_scopeId4}>OI</a>`);
                              } else {
                                return [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "OI", 2)
                                ];
                              }
                            }),
                            _: 2
                          }, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode("p", null, "Notificações"),
                            createVNode(unref(MenuItem), null, {
                              default: withCtx(({ active }) => [
                                createVNode("a", {
                                  href: "#",
                                  class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                }, "OI", 2)
                              ]),
                              _: 1
                            })
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode("div", null, [
                        createVNode(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                          default: withCtx(() => [
                            createVNode("button", {
                              type: "button",
                              class: "rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            }, [
                              createVNode("span", { class: "sr-only" }, "View notifications"),
                              createVNode(unref(BellIcon), {
                                class: "h-6 w-6",
                                "aria-hidden": "true"
                              })
                            ])
                          ]),
                          _: 1
                        })
                      ]),
                      createVNode(Transition, {
                        "enter-active-class": "transition ease-out duration-100",
                        "enter-from-class": "transform opacity-0 scale-95",
                        "enter-to-class": "transform opacity-100 scale-100",
                        "leave-active-class": "transition ease-in duration-75",
                        "leave-from-class": "transform opacity-100 scale-100",
                        "leave-to-class": "transform opacity-0 scale-95"
                      }, {
                        default: withCtx(() => [
                          createVNode(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                            default: withCtx(() => [
                              createVNode("p", null, "Notificações"),
                              createVNode(unref(MenuItem), null, {
                                default: withCtx(({ active }) => [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "OI", 2)
                                ]),
                                _: 1
                              })
                            ]),
                            _: 1
                          })
                        ]),
                        _: 1
                      })
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(ssrRenderComponent(unref(Menu), {
                as: "div",
                class: "relative ml-3"
              }, {
                default: withCtx((_, _push3, _parent3, _scopeId2) => {
                  if (_push3) {
                    _push3(`<div${_scopeId2}>`);
                    _push3(ssrRenderComponent(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`<span class="sr-only"${_scopeId3}>Open user menu</span><img class="h-8 w-8 rounded-full"${ssrRenderAttr("src", _ctx.$page.props.auth.user.profile_photo_url)} alt=""${_scopeId3}>`);
                        } else {
                          return [
                            createVNode("span", { class: "sr-only" }, "Open user menu"),
                            createVNode("img", {
                              class: "h-8 w-8 rounded-full",
                              src: _ctx.$page.props.auth.user.profile_photo_url,
                              alt: ""
                            }, null, 8, ["src"])
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                    _push3(`</div>`);
                    _push3(ssrRenderComponent(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(ssrRenderComponent(unref(MenuItem), null, {
                            default: withCtx(({ active }, _push5, _parent5, _scopeId4) => {
                              if (_push5) {
                                _push5(`<a${ssrRenderAttr("href", _ctx.route("dashboard"))} class="[active ? &#39;bg-gray-100&#39; : &#39;&#39;, &#39;block px-4 py-2 text-sm text-gray-700&#39;]"${_scopeId4}>Meu perfil</a>`);
                              } else {
                                return [
                                  createVNode("a", {
                                    href: _ctx.route("dashboard"),
                                    class: "[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
                                  }, "Meu perfil", 8, ["href"])
                                ];
                              }
                            }),
                            _: 2
                          }, _parent4, _scopeId3));
                          _push4(ssrRenderComponent(unref(MenuItem), null, {
                            default: withCtx(({ active }, _push5, _parent5, _scopeId4) => {
                              if (_push5) {
                                _push5(`<a href="#" class="${ssrRenderClass([active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"])}"${_scopeId4}>Settings</a>`);
                              } else {
                                return [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "Settings", 2)
                                ];
                              }
                            }),
                            _: 2
                          }, _parent4, _scopeId3));
                          _push4(ssrRenderComponent(unref(MenuItem), null, {
                            default: withCtx(({ active }, _push5, _parent5, _scopeId4) => {
                              if (_push5) {
                                _push5(`<a href="#" class="${ssrRenderClass([active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"])}"${_scopeId4}>Deslogar</a>`);
                              } else {
                                return [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "Deslogar", 2)
                                ];
                              }
                            }),
                            _: 2
                          }, _parent4, _scopeId3));
                        } else {
                          return [
                            createVNode(unref(MenuItem), null, {
                              default: withCtx(({ active }) => [
                                createVNode("a", {
                                  href: _ctx.route("dashboard"),
                                  class: "[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
                                }, "Meu perfil", 8, ["href"])
                              ]),
                              _: 1
                            }),
                            createVNode(unref(MenuItem), null, {
                              default: withCtx(({ active }) => [
                                createVNode("a", {
                                  href: "#",
                                  class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                }, "Settings", 2)
                              ]),
                              _: 1
                            }),
                            createVNode(unref(MenuItem), null, {
                              default: withCtx(({ active }) => [
                                createVNode("a", {
                                  href: "#",
                                  class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                }, "Deslogar", 2)
                              ]),
                              _: 1
                            })
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  } else {
                    return [
                      createVNode("div", null, [
                        createVNode(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                          default: withCtx(() => [
                            createVNode("span", { class: "sr-only" }, "Open user menu"),
                            createVNode("img", {
                              class: "h-8 w-8 rounded-full",
                              src: _ctx.$page.props.auth.user.profile_photo_url,
                              alt: ""
                            }, null, 8, ["src"])
                          ]),
                          _: 1
                        })
                      ]),
                      createVNode(Transition, {
                        "enter-active-class": "transition ease-out duration-100",
                        "enter-from-class": "transform opacity-0 scale-95",
                        "enter-to-class": "transform opacity-100 scale-100",
                        "leave-active-class": "transition ease-in duration-75",
                        "leave-from-class": "transform opacity-100 scale-100",
                        "leave-to-class": "transform opacity-0 scale-95"
                      }, {
                        default: withCtx(() => [
                          createVNode(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                            default: withCtx(() => [
                              createVNode(unref(MenuItem), null, {
                                default: withCtx(({ active }) => [
                                  createVNode("a", {
                                    href: _ctx.route("dashboard"),
                                    class: "[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
                                  }, "Meu perfil", 8, ["href"])
                                ]),
                                _: 1
                              }),
                              createVNode(unref(MenuItem), null, {
                                default: withCtx(({ active }) => [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "Settings", 2)
                                ]),
                                _: 1
                              }),
                              createVNode(unref(MenuItem), null, {
                                default: withCtx(({ active }) => [
                                  createVNode("a", {
                                    href: "#",
                                    class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                  }, "Deslogar", 2)
                                ]),
                                _: 1
                              })
                            ]),
                            _: 1
                          })
                        ]),
                        _: 1
                      })
                    ];
                  }
                }),
                _: 2
              }, _parent2, _scopeId));
              _push2(`</div>`);
            } else {
              _push2(`<!---->`);
            }
            _push2(`</div></div>`);
            _push2(ssrRenderComponent(unref(DisclosurePanel), { class: "sm:hidden" }, {
              default: withCtx((_, _push3, _parent3, _scopeId2) => {
                if (_push3) {
                  _push3(`<div class="space-y-1 px-2 pt-2 pb-3"${_scopeId2}><!--[-->`);
                  ssrRenderList(navigation, (item) => {
                    _push3(ssrRenderComponent(unref(DisclosureButton), {
                      key: item.name,
                      as: "a",
                      href: item.href,
                      class: [item.current ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white", "block rounded-md px-3 py-2 text-base font-medium"],
                      "aria-current": item.current ? "page" : void 0
                    }, {
                      default: withCtx((_2, _push4, _parent4, _scopeId3) => {
                        if (_push4) {
                          _push4(`${ssrInterpolate(item.name)}`);
                        } else {
                          return [
                            createTextVNode(toDisplayString(item.name), 1)
                          ];
                        }
                      }),
                      _: 2
                    }, _parent3, _scopeId2));
                  });
                  _push3(`<!--]--></div>`);
                } else {
                  return [
                    createVNode("div", { class: "space-y-1 px-2 pt-2 pb-3" }, [
                      (openBlock(), createBlock(Fragment, null, renderList(navigation, (item) => {
                        return createVNode(unref(DisclosureButton), {
                          key: item.name,
                          as: "a",
                          href: item.href,
                          class: [item.current ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white", "block rounded-md px-3 py-2 text-base font-medium"],
                          "aria-current": item.current ? "page" : void 0
                        }, {
                          default: withCtx(() => [
                            createTextVNode(toDisplayString(item.name), 1)
                          ]),
                          _: 2
                        }, 1032, ["href", "class", "aria-current"]);
                      }), 64))
                    ])
                  ];
                }
              }),
              _: 2
            }, _parent2, _scopeId));
          } else {
            return [
              createVNode("div", { class: "mx-auto max-w-7xl px-2 sm:px-6 lg:px-8" }, [
                createVNode("div", { class: "relative flex h-16 items-center justify-between" }, [
                  createVNode("div", { class: "absolute inset-y-0 left-0 flex items-center sm:hidden" }, [
                    createVNode(unref(DisclosureButton), { class: "inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" }, {
                      default: withCtx(() => [
                        createVNode("span", { class: "sr-only" }, "Open main menu"),
                        !open ? (openBlock(), createBlock(unref(Bars3Icon), {
                          key: 0,
                          class: "block h-6 w-6",
                          "aria-hidden": "true"
                        })) : (openBlock(), createBlock(unref(XMarkIcon), {
                          key: 1,
                          class: "block h-6 w-6",
                          "aria-hidden": "true"
                        }))
                      ]),
                      _: 2
                    }, 1024)
                  ]),
                  createVNode("div", { class: "flex flex-1 items-center justify-center sm:items-stretch sm:justify-start" }, [
                    createVNode("div", { class: "flex flex-shrink-0 items-center text-white" }, [
                      createVNode("b", null, "YORUS."),
                      createTextVNode("club ")
                    ]),
                    createVNode("div", { class: "hidden sm:ml-6 sm:block" }, [
                      createVNode("div", { class: "flex space-x-4" }, [
                        (openBlock(), createBlock(Fragment, null, renderList(navigation, (item) => {
                          return createVNode("a", {
                            key: item.name,
                            href: item.href,
                            class: [
                              item.current ? "bg-gray-900 text-white" : item.class + " text-gray-300 hover:bg-gray-700 hover:text-white",
                              item.class + " rounded-md px-3 py-2 text-sm font-medium"
                            ],
                            "aria-current": item.current ? "page" : void 0
                          }, toDisplayString(item.name), 11, ["href", "aria-current"]);
                        }), 64))
                      ])
                    ])
                  ]),
                  _ctx.$page.props.auth.user == null ? (openBlock(), createBlock("div", {
                    key: 0,
                    class: "absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                  }, [
                    createVNode("a", {
                      href: _ctx.route("login"),
                      class: "font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    }, " Log in", 8, ["href"]),
                    createVNode("a", {
                      href: _ctx.route("register"),
                      class: "ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    }, " Register", 8, ["href"])
                  ])) : createCommentVNode("", true),
                  _ctx.$page.props.auth.user !== null ? (openBlock(), createBlock("div", {
                    key: 1,
                    class: "absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                  }, [
                    createVNode(unref(Menu), {
                      as: "div",
                      class: "relative ml-3"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", null, [
                          createVNode(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                            default: withCtx(() => [
                              createVNode("button", {
                                type: "button",
                                class: "rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                              }, [
                                createVNode("span", { class: "sr-only" }, "View notifications"),
                                createVNode(unref(BellIcon), {
                                  class: "h-6 w-6",
                                  "aria-hidden": "true"
                                })
                              ])
                            ]),
                            _: 1
                          })
                        ]),
                        createVNode(Transition, {
                          "enter-active-class": "transition ease-out duration-100",
                          "enter-from-class": "transform opacity-0 scale-95",
                          "enter-to-class": "transform opacity-100 scale-100",
                          "leave-active-class": "transition ease-in duration-75",
                          "leave-from-class": "transform opacity-100 scale-100",
                          "leave-to-class": "transform opacity-0 scale-95"
                        }, {
                          default: withCtx(() => [
                            createVNode(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                              default: withCtx(() => [
                                createVNode("p", null, "Notificações"),
                                createVNode(unref(MenuItem), null, {
                                  default: withCtx(({ active }) => [
                                    createVNode("a", {
                                      href: "#",
                                      class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                    }, "OI", 2)
                                  ]),
                                  _: 1
                                })
                              ]),
                              _: 1
                            })
                          ]),
                          _: 1
                        })
                      ]),
                      _: 1
                    }),
                    createVNode(unref(Menu), {
                      as: "div",
                      class: "relative ml-3"
                    }, {
                      default: withCtx(() => [
                        createVNode("div", null, [
                          createVNode(unref(MenuButton), { class: "flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" }, {
                            default: withCtx(() => [
                              createVNode("span", { class: "sr-only" }, "Open user menu"),
                              createVNode("img", {
                                class: "h-8 w-8 rounded-full",
                                src: _ctx.$page.props.auth.user.profile_photo_url,
                                alt: ""
                              }, null, 8, ["src"])
                            ]),
                            _: 1
                          })
                        ]),
                        createVNode(Transition, {
                          "enter-active-class": "transition ease-out duration-100",
                          "enter-from-class": "transform opacity-0 scale-95",
                          "enter-to-class": "transform opacity-100 scale-100",
                          "leave-active-class": "transition ease-in duration-75",
                          "leave-from-class": "transform opacity-100 scale-100",
                          "leave-to-class": "transform opacity-0 scale-95"
                        }, {
                          default: withCtx(() => [
                            createVNode(unref(MenuItems), { class: "absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" }, {
                              default: withCtx(() => [
                                createVNode(unref(MenuItem), null, {
                                  default: withCtx(({ active }) => [
                                    createVNode("a", {
                                      href: _ctx.route("dashboard"),
                                      class: "[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
                                    }, "Meu perfil", 8, ["href"])
                                  ]),
                                  _: 1
                                }),
                                createVNode(unref(MenuItem), null, {
                                  default: withCtx(({ active }) => [
                                    createVNode("a", {
                                      href: "#",
                                      class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                    }, "Settings", 2)
                                  ]),
                                  _: 1
                                }),
                                createVNode(unref(MenuItem), null, {
                                  default: withCtx(({ active }) => [
                                    createVNode("a", {
                                      href: "#",
                                      class: [active ? "bg-gray-100" : "", "block px-4 py-2 text-sm text-gray-700"]
                                    }, "Deslogar", 2)
                                  ]),
                                  _: 1
                                })
                              ]),
                              _: 1
                            })
                          ]),
                          _: 1
                        })
                      ]),
                      _: 1
                    })
                  ])) : createCommentVNode("", true)
                ])
              ]),
              createVNode(unref(DisclosurePanel), { class: "sm:hidden" }, {
                default: withCtx(() => [
                  createVNode("div", { class: "space-y-1 px-2 pt-2 pb-3" }, [
                    (openBlock(), createBlock(Fragment, null, renderList(navigation, (item) => {
                      return createVNode(unref(DisclosureButton), {
                        key: item.name,
                        as: "a",
                        href: item.href,
                        class: [item.current ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white", "block rounded-md px-3 py-2 text-base font-medium"],
                        "aria-current": item.current ? "page" : void 0
                      }, {
                        default: withCtx(() => [
                          createTextVNode(toDisplayString(item.name), 1)
                        ]),
                        _: 2
                      }, 1032, ["href", "class", "aria-current"]);
                    }), 64))
                  ])
                ]),
                _: 1
              })
            ];
          }
        }),
        _: 1
      }, _parent));
    };
  }
};
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("resources/js/Inertia/Components/Menu.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
export {
  _sfc_main as _
};
