var vm = new Vue({
    el: '#app',
    store: store,
    components: {
        'vueList': vueList
    },
    data: {

    },
    created: function () {
        this.url = window.location.protocol + "//" + window.location.hostname;
        store.state.url = this.url
        store.state.endPoint = '/GroupsRes/getList'
        store.dispatch('groupsList/loadGroups')

    },

})