/**
 * Adds the promise polyfill for IE 11
 */
require('es6-promise').polyfill();

import Vue from 'vue'
import Vuex from "vuex"
//使用 Vuex 作为数据存储器
Vue.use(Vuex)
export default new Vuex.Store({
    modules: {}
});
