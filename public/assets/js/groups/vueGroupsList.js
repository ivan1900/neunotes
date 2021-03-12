var vuegroupslist=({
    template: /*html*/`
    <div>
    <div class="m-b-lg">

        <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Filtrar..." >
            <div class="input-group-append">
                <button class="btn btn-white" type="button">Filtrar</button>
            </div>
        </div>

        <div class="m-t-md">

            <div class="float-right">
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-comments"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-user"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-list"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-print"></i> </button>
                <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-cogs"></i> </button>
            </div>

            <strong>Registros {{list.length}}</strong>



        </div>

    </div>

    <div class="table-responsive">
    <table class="table table-hover issue-tracker">
    <tbody>
    <tr v-for="item of list">
        <td>
            <span v-if='item.menubackend == 1' class="label label-primary">Admin</span>
        </td>
        <td class="issue-info">
            <a v-bind:href="'group/'+item.uuid">
                {{item.name}}
            </a>
        </td>
        <td>
           
        </td>
        <td>
            Creado: {{item.created_at}}
        </td>
        <td>
            Modificado: {{item.updated_at}}
        </td>
        <td class="text-right">
            <button class="btn btn-white btn-xs"> Tag</button>
            <button class="btn btn-white btn-xs"> Mag</button>
            <button class="btn btn-white btn-xs"> Rag</button>
        </td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    `,
    computed:{
        ...Vuex.mapState('vueList',['list'])
    },
    methods: {

    },
})