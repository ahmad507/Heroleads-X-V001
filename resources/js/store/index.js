import Vue from 'vue'
import Vuex from 'vuex'

import leadsData from './modules/leadsData'
import mediaData from './modules/mediaData'
import sourceData from './modules/sourceData'
import statusData from './modules/statusData'


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        leadsData,
        mediaData,
        sourceData,
        statusData,
    }
});