import axios from "axios";

const state = {
    leadsData: [],
    leadsDetail: [{
        leadsID: "",
        leadsName: "",
        leadsEmail: "",
        leadsPhone: "",
        leadsStatus: "",
        leadsSource: "",
        leadsMedia: ""
    }]
};
const getters = {
    allLeads: state => state.leadsData,
};
const actions = {
    async getLeadsData({ commit }) {
        const response = await axios.get('http://heroleadsx.test/api/leads');
        console.log(response.data)
        commit('setDataLeads', response.data);
    },

    async addLeads({ commit }, leadsDetail) {
        const response = await axios.post('http://heroleadsx.test/api/leads', {
            leadsDetail,
        }).then(response => response.data)
        commit('newLeads', response.data);
    }

};
const mutations = {
    setDataLeads: (state, leadsData) => (state.leadsData = leadsData.data),
    newMedia: (state, leads) => state.leadsData.push(leads)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}