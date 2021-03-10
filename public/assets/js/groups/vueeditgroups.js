var v = new Vue ({
    el: '#vgroups',

    data:{
        url: "",
        groupid: "",
        userid: "",
        usersavailables: [],
        idavailable: "",
        idingroup: "",
        usersselected: []
    },

    created: function(){
        this.url = window.location.protocol + "//" + window.location.hostname;
        this.groupid = document.getElementById("groupId").value;
        this.getSelected();
        this.getAvailable();        
    },

    methods: {
        getSelected: function(){
            var data = new FormData();
            data.append('groupId', this.groupid);
            axios
                .post(this.url + '/GroupSelectedUsersRes/get',data)
                .then(response => {
                    v.usersselected=response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },

        getAvailable: function(){
            var data = new FormData();
            data.append('groupId', this.groupid);
            axios
                .post(this.url + '/GroupAvailableUsersRes/get',data)
                .then(response => {
                    v.usersavailables=response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },

        insertUserGroup: function(){
            var data = new FormData();
            data.append('groupId', this.groupid)
            data.append('userId', this.idavailable)
            axios
                .post(this.url + '/GroupRes/set',data)
                .then(response =>{
                    v.getAvailable()
                    v.getSelected()
                })
                .catch(error => {
                    console.log(error)
                })
        },

        selectInGroup: function(valor){
            this.idingroup = valor
        },

        selectAvailable: function(valor){
            this.idavailable = valor
        },

        moveToGroup: function(){
            if(this.idavailable){
                this.insertUserGroup()
            }
        },

        removeFromGroup: function(){
            if(this.idingroup){
                var data = new FormData();
                data.append('groupId', this.groupid)
                data.append('userId', this.idingroup)
                axios
                    .post(this.url + '/GroupRes/userRemove',data)
                    .then(response =>{
                        v.getAvailable()
                        v.getSelected()
                    }) 
                    .catch(error => {
                        console.log(error)
                    })
            }
        }
        
    }
})