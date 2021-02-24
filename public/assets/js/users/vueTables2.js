Vue.use(VueTables.ClientTable);

const vueTables2 = {
    namespaced: true,
    state: {
        columns: [],
        data: [
            0
        ],
        options: {
            sortable: [],
            texts: {
                filterPlaceholder: 'filtro'
            }
        }
    },
    mutations: {
        setHeader(state, header){
            state.columns = header
            state.options.sortable = header
        },
        setData(state, users) {
            state.data = users
        }
    },
    actions: {
        loadUsers: async function({commit, rootState}) {
            axios
                .get(rootState.url + '/UsersRes/getUsersList')
                .then((response) => {
                    commit('setHeader', response.data.header)
                    commit('setData', response.data.users)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
}


