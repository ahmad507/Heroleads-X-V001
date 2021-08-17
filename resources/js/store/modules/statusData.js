import axios from "axios";

const state = {
    statusData: []
};
const getters = {
    allStatus: state => state.statusData
};
const actions = {
    async getStatusData({ commit }) {
        const response = await axios.get('http://heroleadsx.test/api/status');
        console.log(response.data)
        commit('setDataStatus', response.data);
    },
    async addStatus({ commit }, status_name) {
        const response = await axios.post('http://heroleadsx.test/api/status', {
            status_name,
        }).then(response => response.data)
        commit('newStatus', response.data);
    }
};
const mutations = {
    setDataStatus: (state, statusData) => (state.statusData = statusData.data),
    newStatus: (state, status) => state.statusData.push(status)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}