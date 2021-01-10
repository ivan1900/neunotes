var v=new Vue({
    el:'#appAddApointments',

    data:{
        url: "",
        newAppointment: {
            title: "",
            startDate: "",
            startTime: "",
            endDate: "",
            endTime: "",
            customerId: "",
            userId: "",
            description: ""
        },
        usersList: [],
        successMSG: "",
        errorMSG: "",
        customer: ""
    },

    created: function(){
        this.url = window.location.pathname;
        var piezas = this.url.split("/");
        this.url = window.location.protocol + "//" + window.location.hostname + "/" + piezas[1] + "/" + piezas[2];
        this.setInit();
        this.getUsers();
    },

    methods:{
        setInit: function() {
            var hoy = new Date();
            month = hoy.getMonth() + 1;
            if (month < 10){
                month = month.toString();
                month = '0' + month;
            }
            this.newAppointment.startDate = hoy.getFullYear() + '-' + month + '-' + hoy.getDate();
            this.newAppointment.startTime = hoy.getHours() + ':' + hoy.getMinutes();
            this.newAppointment.endDate = this.newAppointment.startDate;
            this.newAppointment.endTime = (hoy.getHours()+1) + ':' + hoy.getMinutes();
        },

        setAppointment() {
         /*   axios
                .post(this.url + "AppointmentRes/setAppointment", this.createdFormData(this.newAppointment))
                .then((response) => {
                    console.log(response);
                }, (error) => {
                    console.log(error);
                });*/
        },

        getUsers: function(){
            axios
                .get(this.url + '/UsersRes/getUsersList')
                .then(response => {
                    data = response.data;
                    data.forEach(function(item){
                        v.usersList.push({id: item.idusuario, name: item.nombre});
                    });
                    
                })
                .catch(error => {
                    console.log(error)
                }); 
        },


        clearMSG: function() { //esta funcion mantiene 2 segundos el mensaje devuelto despues de la operación
            setTimeout(function () {
              this.successMSG = '';
              this.errorMSG = '';
            }, 2000);
        },

        createdFormData: function (param) { //importante para poder pasar los datos en post de forma adecuada
            var formDa = new FormData();
            for(var key in param){
              formDa.append(key, param[key]);
            }
            return formDa;
        },

        searchCustomer: function() {
            if (v.customer.lenght > 0){
                v.successMSG = v.customer.lenght;
            }
        }

       
    },

})