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
        setLanguage(state, language){
            state.options.texts = language
        },
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
                    commit('setLanguage', response.data.vueTable2Language)
                    commit('setHeader', response.data.header)
                    commit('setData', response.data.users)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
}


