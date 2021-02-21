Vue.use(VueTables.ClientTable);

const vueTableUsers = {
    state: {
        columns: [
            'id',
            'name',
            'email'
            ],
          //data: getData(),
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
    actions: {
        LoadLanguage: async function ({commit, rootState}){

        },
        LoadUsers: async function ({commit, rootState}){

        }
    }
}