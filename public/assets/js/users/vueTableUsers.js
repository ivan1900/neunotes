
var vuetableusers = ({
    template: //HTML
    `
    <div>
        <v-client-table :columns="$store.state.userTable.columns" :data="$store.state.userTable.data" :options="$store.state.userTable.options">
        </v-client-table>
    </div>
    `,
    methods: {
    },
})