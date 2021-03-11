const vueList = ({
    namespaced: true,
    state:{
        groups:[]
    },
    actions: {
        loadGroups: async function({commit, rootState}) {
            axios
                .get(rootState.url + rootState.endPoint)
                .then((response) => {
                    console.log(response.data)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
})