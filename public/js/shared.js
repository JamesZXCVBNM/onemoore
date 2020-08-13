/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DetailTable.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DetailTable.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['portfolio', 'loading'],
  data: function data() {
    return {
      fields: [{
        key: 'logo',
        label: '',
        "class": 'w--1 m-0 p-2'
      }, {
        key: 'symbol.ticker',
        label: 'Stock',
        "class": ''
      }, {
        key: 'quantity',
        label: 'Units'
      }, {
        key: 'price',
        label: 'Cost'
      }, {
        key: 'symbol.quote',
        label: 'Quote'
      }, {
        key: 'div_per_share',
        label: 'Div/Share (Base)'
      }, {
        key: 'yoc',
        label: 'Yield On Cost'
      }, {
        key: 'yoq',
        label: 'Yield On Quote'
      }, {
        key: 'gain',
        label: 'Gain / Loss'
      }]
    };
  },
  methods: {
    calculateYOC: function calculateYOC(position) {
      return (position.year_total / position.quantity / position.converted_cost * 100).toFixed(1);
    },
    calculateYOQ: function calculateYOQ(position) {
      return (position.year_total / position.quantity / position.converted_quote * 100).toFixed(1);
    },
    calculateGain: function calculateGain(position) {
      var diff = position.symbol.quote - position.price;
      return (diff / position.price * 100).toFixed(0);
    },
    getClass: function getClass(a, b) {
      return parseFloat(a) < parseFloat(b) ? 'success' : 'danger';
    },
    rowClicked: function rowClicked(row) {
      this.$emit('selected', row);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DividendTable.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DividendTable.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['loading', 'portfolio'],
  data: function data() {
    return {
      showSaveMessage: false,
      showAddPosition: false,
      visibleRows: [],
      fields: [{
        key: 'logo',
        label: '',
        "class": 'w--1 m-0 p-2'
      }, {
        key: 'symbol.ticker',
        label: 'Ticker',
        "class": ''
      }, {
        key: 'quantity',
        label: 'Units'
      }, {
        key: 'monthly.month1.user_currency',
        label: 'JAN'
      }, {
        key: 'monthly.month2.user_currency',
        label: 'FEB'
      }, {
        key: 'monthly.month3.user_currency',
        label: 'MAR'
      }, {
        key: 'monthly.month4.user_currency',
        label: 'APR'
      }, {
        key: 'monthly.month5.user_currency',
        label: 'MAY'
      }, {
        key: 'monthly.month6.user_currency',
        label: 'JUN'
      }, {
        key: 'monthly.month7.user_currency',
        label: 'JUL'
      }, {
        key: 'monthly.month8.user_currency',
        label: 'AUG'
      }, {
        key: 'monthly.month9.user_currency',
        label: 'SEP'
      }, {
        key: 'monthly.month10.user_currency',
        label: 'OCT'
      }, {
        key: 'monthly.month11.user_currency',
        label: 'NOV'
      }, {
        key: 'monthly.month12.user_currency',
        label: 'DEC'
      }]
    };
  },
  methods: {
    total: function total(col) {
      var map = this.visibleRows.map(function (x) {
        return x.monthly[col] ? x.monthly[col].user_currency : 0;
      });
      return map.reduce(function (accum, x) {
        return accum + parseFloat(x);
      }, 0.00);
    },
    rowClicked: function rowClicked(row) {
      this.$emit('selected', row);
    },
    positionAdded: function positionAdded() {
      var _this = this;

      this.showAddPosition = false;
      this.showSaveMessage = true;
      this.loadPortfolio();
      setTimeout(function () {
        _this.showSaveMessage = false;

        _this.loadPortfolio();
      }, 6000);
    }
  },
  created: function created() {// this.loadPortfolio()
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DetailTable.vue?vue&type=template&id=40347262&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DetailTable.vue?vue&type=template&id=40347262& ***!
  \**************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("b-table", {
        staticClass: "mb-0",
        attrs: {
          items: _vm.portfolio,
          fields: _vm.fields,
          busy: _vm.loading,
          bordered: "",
          hover: "",
          responsive: "",
          "tbody-class": "cursor-pointer",
          "thead-class": "thead-light"
        },
        on: {
          "update:busy": function($event) {
            _vm.loading = $event
          },
          "row-clicked": _vm.rowClicked
        },
        scopedSlots: _vm._u([
          {
            key: "cell(logo)",
            fn: function(d) {
              return [
                _c("b-img-lazy", {
                  attrs: {
                    src: d.item.symbol.logo
                      ? "https://static.finnhub.io/logo/" + d.item.symbol.logo
                      : "/images/anon.png",
                    alt: "logo",
                    width: "30px"
                  }
                })
              ]
            }
          },
          {
            key: "cell(symbol.ticker)",
            fn: function(d) {
              return [
                _c("span", {
                  directives: [
                    {
                      name: "b-popover",
                      rawName: "v-b-popover.hover",
                      value: d.item.symbol.name,
                      expression: "d.item.symbol.name",
                      modifiers: { hover: true }
                    }
                  ],
                  staticClass: "font-weight-bold cursor-help",
                  domProps: { textContent: _vm._s(d.item.symbol.ticker) }
                })
              ]
            }
          },
          {
            key: "cell(price)",
            fn: function(d) {
              return [
                _c("span", { domProps: { textContent: _vm._s(d.item.price) } }),
                _vm._v(" "),
                _c("small", {
                  staticClass: "text-muted",
                  domProps: { textContent: _vm._s(d.item.symbol.currency) }
                })
              ]
            }
          },
          {
            key: "cell(symbol.quote)",
            fn: function(d) {
              return [
                _c("span", {
                  domProps: { textContent: _vm._s(d.item.symbol.quote) }
                }),
                _vm._v(" "),
                _c("small", {
                  staticClass: "text-muted",
                  domProps: { textContent: _vm._s(d.item.symbol.currency) }
                })
              ]
            }
          },
          {
            key: "cell(div_per_share)",
            fn: function(d) {
              return [
                _c("span", {
                  domProps: {
                    textContent: _vm._s(
                      (d.item.year_total / d.item.quantity).toFixed(2)
                    )
                  }
                })
              ]
            }
          },
          {
            key: "cell(yoc)",
            fn: function(d) {
              return [
                _c("span", {
                  domProps: {
                    textContent: _vm._s(_vm.calculateYOC(d.item) + "%")
                  }
                })
              ]
            }
          },
          {
            key: "cell(yoq)",
            fn: function(d) {
              return [
                _c("span", {
                  domProps: {
                    textContent: _vm._s(_vm.calculateYOQ(d.item) + "%")
                  }
                })
              ]
            }
          },
          {
            key: "cell(gain)",
            fn: function(d) {
              return [
                _c("span", {
                  class:
                    "text-" + _vm.getClass(d.item.price, d.item.symbol.quote),
                  domProps: {
                    textContent: _vm._s(_vm.calculateGain(d.item) + "%")
                  }
                })
              ]
            }
          }
        ])
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "b-table",
        {
          staticClass: "mb-0",
          attrs: {
            items: _vm.portfolio,
            fields: _vm.fields,
            busy: _vm.loading,
            bordered: "",
            hover: "",
            responsive: "",
            "tbody-class": "cursor-pointer",
            "thead-class": "thead-light"
          },
          on: {
            "update:busy": function($event) {
              _vm.loading = $event
            },
            "row-clicked": _vm.rowClicked
          },
          scopedSlots: _vm._u([
            {
              key: "cell(symbol.ticker)",
              fn: function(d) {
                return [
                  _c("span", {
                    directives: [
                      {
                        name: "b-popover",
                        rawName: "v-b-popover.hover",
                        value: d.item.symbol.name,
                        expression: "d.item.symbol.name",
                        modifiers: { hover: true }
                      }
                    ],
                    staticClass: "cursor-help font-weight-bold",
                    domProps: { textContent: _vm._s(d.item.symbol.ticker) }
                  })
                ]
              }
            },
            {
              key: "cell(quantity)",
              fn: function(d) {
                return [
                  _c("div", { staticClass: "text-align-end" }, [
                    _c("span", {
                      domProps: { textContent: _vm._s(d.item.quantity) }
                    })
                  ])
                ]
              }
            },
            {
              key: "cell(logo)",
              fn: function(d) {
                return [
                  _c("b-img-lazy", {
                    attrs: {
                      src: d.item.symbol.logo
                        ? "https://static.finnhub.io/logo/" + d.item.symbol.logo
                        : "/images/anon.png",
                      alt: "logo",
                      width: "30px"
                    }
                  })
                ]
              }
            }
          ]),
          model: {
            value: _vm.visibleRows,
            callback: function($$v) {
              _vm.visibleRows = $$v
            },
            expression: "visibleRows"
          }
        },
        [
          _vm._v(" "),
          _vm._v(" "),
          _vm._v(" "),
          _c(
            "template",
            { slot: "custom-foot" },
            [
              _c(
                "b-tr",
                {
                  staticStyle: { "border-top": "2px solid #E9ECEF !important" }
                },
                [
                  _c(
                    "b-td",
                    {
                      staticClass: "text-align-end font-weight-bold",
                      attrs: { colspan: "3" }
                    },
                    [_vm._v("Total:")]
                  ),
                  _vm._v(" "),
                  _vm._l(12, function(i) {
                    return _c("b-td", { key: i }, [
                      _c("span", {
                        domProps: {
                          textContent: _vm._s(_vm.total("month" + i).toFixed(2))
                        }
                      })
                    ])
                  })
                ],
                2
              )
            ],
            1
          )
        ],
        2
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/DetailTable.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/DetailTable.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DetailTable.vue?vue&type=template&id=40347262& */ "./resources/js/components/DetailTable.vue?vue&type=template&id=40347262&");
/* harmony import */ var _DetailTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DetailTable.vue?vue&type=script&lang=js& */ "./resources/js/components/DetailTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DetailTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/DetailTable.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/DetailTable.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/DetailTable.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DetailTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DetailTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/DetailTable.vue?vue&type=template&id=40347262&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/DetailTable.vue?vue&type=template&id=40347262& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./DetailTable.vue?vue&type=template&id=40347262& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DetailTable.vue?vue&type=template&id=40347262&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DetailTable_vue_vue_type_template_id_40347262___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/DividendTable.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/DividendTable.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./DividendTable.vue?vue&type=template&id=b9cde578& */ "./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578&");
/* harmony import */ var _DividendTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./DividendTable.vue?vue&type=script&lang=js& */ "./resources/js/components/DividendTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _DividendTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__["render"],
  _DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/DividendTable.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/DividendTable.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/DividendTable.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DividendTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./DividendTable.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DividendTable.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_DividendTable_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./DividendTable.vue?vue&type=template&id=b9cde578& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/DividendTable.vue?vue&type=template&id=b9cde578&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_DividendTable_vue_vue_type_template_id_b9cde578___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/shared.js":
/*!**************************************!*\
  !*** ./resources/js/views/shared.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_DetailTable__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/DetailTable */ "./resources/js/components/DetailTable.vue");
/* harmony import */ var _components_DividendTable__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/DividendTable */ "./resources/js/components/DividendTable.vue");


new Vue({
  el: '#middle',
  components: {
    DetailTable: _components_DetailTable__WEBPACK_IMPORTED_MODULE_0__["default"],
    DividendTable: _components_DividendTable__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: {
    loading: true,
    users: [],
    selectedUser: null
  },
  methods: {
    showPortfolio: function showPortfolio(item) {
      this.selectedUser = item;
    }
  },
  created: function created() {
    var _this = this;

    axios.get('users/shared').then(function (response) {
      _this.users = response.data.data;
      _this.loading = false;
    });
  }
});

/***/ }),

/***/ 6:
/*!*****************************************!*\
  !*** multi ./resources/js/views/shared ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Projects\onemoore\onemoore\resources\js\views\shared */"./resources/js/views/shared.js");


/***/ })

/******/ });