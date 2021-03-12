const vueList = ({
    namespaced: true,
    state:{
        list:[]
    },
    mutations: {
        setList (state, list){
            state.list = list
        }
    },
    actions: {
        loadGroups: async function({commit, rootState}) {
            axios
                .get(rootState.url + rootState.endPoint)
                .then((response) => {
                    commit('setList',response.data.groups)
                    console.log(response.data.groups)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
})