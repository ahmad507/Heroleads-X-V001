import axios from "axios";

const state = {
    sourceData: []
};
const getters = {
    allSource: state => state.sourceData
};
const actions = {
    async getSourceData({ commit }) {
        const response = await axios.get('http://heroleadsx.test/api/source');
        console.log(response.data)
        commit('setDataSource', response.data);
    },
    async addSource({ commit }, source_name) {
        const response = await axios.post('http://heroleadsx.test/api/source', {
            source_name,
        }).then(response => response.data)
        commit('newSource', response.data);
    }
};
const mutations = {
    setDataSource: (state, sourceData) => (state.sourceData = sourceData.data),
    newSource: (state, source) => state.sourceData.push(source)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}