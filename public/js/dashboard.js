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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
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
    monthlyDividends: [],
    sectorBreakdown: [],
    // barChartData: [],
    selectedMonth: moment().month()
  },
  computed: {
    total: function total() {
      var t = 0;
      this.portfolio.forEach(function (x) {
        return t += x.converted_quote * x.quantity;
      });
      return t.toFixed(2);
    },
    growth: function growth() {
      var t = 0;
      this.portfolio.forEach(function (x) {
        return t += x.converted_cost * x.quantity;
      });
      return (this.total - t).toFixed(2);
    },
    month: function month() {
      var _this = this;

      var data = [];

      var _loop = function _loop(i) {
        _this.portfolio.forEach(function (position) {
          if (position.monthly['month' + (i + 1)]) {
            if (i == _this.selectedMonth) data.push(position);
          }
        });
      };

      for (var i = 0; i < 12; i++) {
        _loop(i);
      }

      return data;
    }
  },
  methods: {
    loadPortfolio: function loadPortfolio() {
      var _this2 = this;

      this.loadingPortfolio = true;
      return axios.get('/my-portfolio').then(function (response) {
        _this2.portfolio = response.data.data;
        _this2.loadingPortfolio = false;

        _this2.getMonthlyDividends();

        _this2.getValueBySector();
      });
    },
    getMonthlyDividends: function getMonthlyDividends() {
      var _this3 = this;

      var months = []; // let data = []

      var _loop2 = function _loop2(i) {
        var total = 0;

        _this3.portfolio.forEach(function (position) {
          if (position.monthly['month' + (i + 1)]) {
            total += position.monthly['month' + (i + 1)].user_currency; // if (i == 5) data.push(position)
          }
        });

        months[i] = total.toFixed(2);
      };

      for (var i = 0; i < 12; i++) {
        _loop2(i);
      }

      this.monthlyDividends = months; // this.barChartData = data
    },
    getValueBySector: function getValueBySector() {
      var sectors = {};
      this.portfolio.forEach(function (position) {
        if (position.industry) {
          sectors[position.industry.name] = 0;
        }
      });
      this.portfolio.forEach(function (position) {
        if (position.industry) {
          sectors[position.industry.name] += position.converted_quote * position.quantity;
        }
      });
      this.sectorBreakdown = sectors;
    }
  },
  created: function created() {
    this.loadPortfolio();
  }
});

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/views/dashboard ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Projects\onemoore\onemoore\resources\js\views\dashboard */"./resources/js/views/dashboard.js");


/***/ })

/******/ });