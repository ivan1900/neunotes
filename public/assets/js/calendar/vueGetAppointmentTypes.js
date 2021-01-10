var v = new Vue({
    el: '#appAppointmentTypes',
//NO UTILIZADO, DEJO COMO EJEMPLO
    data: {
        url: "",
        appointmentTypes: [],
        testRespuesta: null
    },

    created: function(){
        this.url = window.location.pathname;
        var piezas = this.url.split("/");
        this.url = window.location.protocol + "//" + window.location.hostname + "/" + piezas[1] + "/" + piezas[2];
        this.getAppointmentTypes();
    },

    methods: {
        
        getAppointmentTypes: function() {
            axios
                .get(this.url + '/AppointmentTypesRes/getAppointmentTypes')
                .then(response => {
                    v.testRespuesta = response.data.appointmentTypes;
                    v.appointmentTypes = response.data.appointmentTypes
                })
                .catch(error => {
                    console.log(error)
                })   
        } 
        /*
        getAppointmentTypes: function() {
            axios.get(this.url + '/calendarres/getAppointmentTypes')
            .then(function (response){
                this.appointmentTypes = response.data.appointmentTypes;
            }) 
        }
        */
    }

})
//"http://localhost/tempel/public/calendarres/getAppointmentTypes"