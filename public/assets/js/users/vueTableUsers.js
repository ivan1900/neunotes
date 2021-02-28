
var vuetableusers = ({
    template: //HTML
    `
    <div>
        <v-client-table ref="mytable" :columns="$store.state.userTable.columns" :data="$store.state.userTable.data" :options="$store.state.userTable.options">
        <a slot="name" slot-scope="props" target="_blank" :href="'user/'+props.row.uuid">{{props.row.name}}</a>
        </v-client-table>
    </div>
    `,
    methods: {
    },
})