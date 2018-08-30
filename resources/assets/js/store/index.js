import Vue from 'vue'
import Vuex from 'vuex'
import ListCate from '../components/category/ListCate.vue'
import storeCate from './modules/category.js'
const debug = process.env.NODE_ENV !== 'production'
import {
    FETCHING_RESOURCES,
    FETCHING_RESOURCES_DONE,
    FETCHING_RESOURCES_FAIL
} from './mutation-type';

Vue.use(Vuex)

const state = {
  iloading: false,
  app_errors: null
}

/**
 * Global app actions
 */
const actions = {}

/**
 * Global app mutations
 */
const mutations = {
    /**
   * Turn on the loading image when resource fetching initial
   */
  [FETCHING_RESOURCES]: (state) => {
    state.iloading = true
  },

  /**
   * Turn of the loading image when resource fetching done
   */
  [FETCHING_RESOURCES_FAIL]: (state, err) => {
    state.iloading = false
    state.app_errors = err.response
  },

  /**
   * Turn of the loading image when resource fetching done
   */
  [FETCHING_RESOURCES_DONE]: (state) => {
    state.iloading = false
  },
}
const getters = {
  loading(state) {
    return state.iloading
  },
  app_errors(state) {
    return state.app_errors
  }
}
//config for axios
window.axios = require('axios')
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
let token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
}

export default new Vuex.Store({
    strict: debug,
    modules: {
      storeCate
    },
    state,
    actions,
    mutations,
     getters,
// plugins: debug ? [createLogger()] : []
    // state,
});
