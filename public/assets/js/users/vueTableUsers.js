
var vuetableusers = ({
    template: //HTML
    `
    <div>
        <v-client-table ref="mytable" :columns="$store.state.userTable.columns" :data="$store.state.userTable.data" :options="$store.state.userTable.options">
        </v-client-table>
    </div>
    `,
    methods: {
    },
})