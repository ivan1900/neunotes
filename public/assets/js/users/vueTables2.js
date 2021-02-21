Vue.use(VueTables.ClientTable);

const vueTables2 = {
    namespaced: true,
    state: {
        columns: [
            'id',
            'name',
            'email'
        ],
        data: null,
        options: {
            headings: {
                id: 'id',
                name: 'name',
                email: 'email'
            },
            sortable: [
                'id', 'name'
            ],
            texts: {
                filterPlaceholder: 'filtro'
            }
        }
    },
    mutations: {
        setData(state) {
            const arr = []
            for (i = 0; i < 20; i++) {
                arr.push({
                    'id': i,
                    'name': `sample${i}`,
                    'email': `sample${i}@example.com`,
                    'group_name': 'Personnel'
                });
            }
            state.data = arr
        }
    },
}


