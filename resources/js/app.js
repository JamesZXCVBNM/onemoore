window.Vue = require('vue')
window.moment = require('moment')
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.prototype.moment = require('moment')

require('./bootstrap')
require('./core')


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
