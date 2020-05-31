window.Vue = require('vue')
window.moment = require('moment')
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

require('./bootstrap')
require('./core.min')
// require('./vendor_bundle.min')
// require('./sow.header')

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


// import Typed from 'typed.js'

// let typed = new Typed('.typed', {
//     // stringsElement: 'typed-strings',
//     strings: ['Hello, World', 'Home'],
//     typeSpeed: 300,
//     // backSpeed: 150,
//     // backDelay: 900,
//     cursorChar: '_',
// })

// const app = new Vue({
//     el: '#app',
//     created() {

//     }
// })
