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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/views/dashboard.js":
/*!*****************************************!*\
  !*** ./resources/js/views/dashboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

new Vue({
  el: '#middle',
  data: {
    search: '',
    portfolio: [],
    visibleRows: [],
    tables: {
      portfolio: {
        fields: [{
          key: 'logo',
          label: '',
          "class": 'w--1'
        }, {
          key: 'symbol.ticker',
          label: 'Ticker',
          "class": ''
        }, {
          key: 'quantity',
          label: 'Units'
        }, {
          key: 'monthly.month1.total',
          label: 'JAN',
          "class": 'w--1'
        }, {
          key: 'monthly.month2.total',
          label: 'FEB',
          "class": 'w--1'
        }, {
          key: 'monthly.month3.total',
          label: 'MAR',
          "class": 'w--1'
        }, {
          key: 'monthly.month4.total',
          label: 'APR',
          "class": 'w--1'
        }, {
          key: 'monthly.month5.total',
          label: 'MAY',
          "class": 'w--1'
        }, {
          key: 'monthly.month6.total',
          label: 'JUN',
          "class": 'w--1'
        }, {
          key: 'monthly.month7.total',
          label: 'JUL',
          "class": 'w--1'
        }, {
          key: 'monthly.month8.total',
          label: 'AUG',
          "class": 'w--1'
        }, {
          key: 'monthly.month9.total',
          label: 'SEP',
          "class": 'w--1'
        }, {
          key: 'monthly.month10.total',
          label: 'OCT',
          "class": 'w--1'
        }, {
          key: 'monthly.month11.total',
          label: 'NOV',
          "class": 'w--1'
        }, {
          key: 'monthly.month12.total',
          label: 'DEC',
          "class": 'w--1'
        }]
      }
    }
  } // computed: {
  // },
  // methods: {
  // 	total(col) {
  // 		let map = this.visibleRows.map(x => x.monthly[col] ? x.monthly[col].total : 0)
  // 		return map.reduce((accum, x) => accum + parseFloat(x), 0.00)
  // 	},
  // },
  // created() {
  // 	axios.get('/my-portfolio').then(response => {
  // 		this.portfolio = response.data.data
  // 	})
  // }

});

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/views/dashboard ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Projects\onemoore\onemoore\resources\js\views\dashboard */"./resources/js/views/dashboard.js");


/***/ })

/******/ });