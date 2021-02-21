new Vue({
    el: '#app2',
    data:{
        user:'',
        name:'',
        dataTable: null ,
    },

    methods:{
        addUser(){
            this.dataTable.row.add([
                this.user,
                this.name,
                0,
                1,
                ''
            ]).draw(false)
            this.user,
            this.name
        }
    },
    mounted() {
        
        this.dataTable = $('#users-table').DataTable({});

    },
})