
var vuetableusers = ({
    template: //HTML
    `
    <div>
        <v-client-table ref="mytable" :columns="$store.state.userTable.columns" :data="$store.state.userTable.data" :options="$store.state.userTable.options">
        <a slot="name" slot-scope="props" target="_blank" :href="'user/'+props.row.user">{{props.row.name}}</a>
        
        <a slot="active" slot-scope="props" v-if="props.row.active == 0" class="fa fa-times"></a>
        <a slot="active" slot-scope="props" v-else class="fa fa-check"></a>
                
        </v-client-table>
    </div>
    `,
    methods: {
    },
})