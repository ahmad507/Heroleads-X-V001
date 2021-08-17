import axios from "axios";

const state = {
    mediaData: []
};
const getters = {
    allMedia: state => state.mediaData
};
const actions = {
    async getMediaData({ commit }) {
        const response = await axios.get('http://heroleadsx.test/api/media');
        console.log(response.data)
        commit('setDataMedia', response.data);
    },
    async addMedia({ commit }, media_name) {
        const response = await axios.post('http://heroleadsx.test/api/media', {
            media_name,
        }).then(response => response.data)
        commit('newMedia', response.data);
    }
};
const mutations = {
    setDataMedia: (state, mediaData) => (state.mediaData = mediaData.data),
    newMedia: (state, media) => state.mediaData.push(media)
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}