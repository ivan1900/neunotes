var v=new Vue ({
    el: '#vusecase',

    data:{
        url:"",
        cases:[],
        selectedCase:""
    },

    created: function() {
        this.url = window.location.protocol + "//" + window.location.hostname;
    },

    methods: {
        getUsesCase: function()
        {
            
        }
    }
})