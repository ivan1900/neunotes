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
        },
        setHeading(state, heading){
            state.options.headings = heading
        }
    },
    actions: {
        loadUsers: async function({commit, rootState}) {
            axios
                .get(rootState.url + rootState.endPoint)
                .then((response) => {
                    commit('setLanguage', response.data.vueTable2Language)
                    commit('setHeader', response.data.header)
                    commit('setHeading', response.data.heading)
                    commit('setData', response.data.users)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
}


