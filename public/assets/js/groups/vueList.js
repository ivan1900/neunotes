const vueList = ({
    namespaced: true,
    state:{
        groups:[]
    },
    actions: {
        loadGroups: async function({commit, rootState}) {
            console.log("wtf")
            axios
                .get(rootState.url + rootState.endPoint)
                .then((response) => {
                    console.log(response.data)
                })
                .catch((error) =>{
                    console.log(error)
                })
        }
    },
    template:/*html*/`
        <div>
            <p>{{groups}}</p>
        <div>

    `
})