Vue.use(VueTables.ClientTable);

const vueTables2 = {
    namespaced: true,
    state: {
        columns: [
            'id'
        ],
        data: [
            0
        ],
        options: {
            headings: {
                id: 'id',
            },
            sortable: [
                'id'
            ],
            texts: {
                filterPlaceholder: 'filtro'
            }
        }
    },
    mutations: {
        setHeader(state, header){
            state.columns = header
        },
        setData(state, users) {
            const arr = []
            for (i = 0; i < 20; i++) {
                arr.push({
                    'id': i,
                    'name': `sample${i}`,
                    'email': `sample${i}@example.com`,
                    'group_name': 'Personnel'
                });
            }
            console.log('se ejecuta')
            state.data = arr
            this.$refs.mytable.refresh()
        }
    },
    actions: {
        loadUsers: async function({commit, rootState}) {
            axios
                .get(rootState.url + '/UsersRes/getUsersList')
                .then((response) => {
                    var header = response.data.header
                    var users = response.data.users
                    console.log(header)
                    console.log(users)
                    commit('setData', response.data)
                    //commit('setHeader', response.header)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    }
}


