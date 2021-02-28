//Vue.use(VueTables.ClientTable);
var vm = new Vue({
  el: '#app',
  store: store,
  components:{
    'vueTables2': vueTables2,
    'vuetableusers': vuetableusers
  },
  data:{

  },
  created: function() {
    this.url = window.location.protocol + "//" + window.location.hostname;
    store.state.url = this.url
    store.state.endPoint = '/UsersRes/getUsersList'
    store.dispatch('userTable/loadUsers')
    
  },

})



/* Vue.use(VueTables.ClientTable);

new Vue({
  el: "#app",
  data: {
    columns: [
      'id',
      'name',
      'email'
      ],
    data: getData(),
    options: {
      headings: {
        id: 'id',
        name: 'name',
        email: 'email'
      },
      sortable: [
        'id', 'name'
        ],
      texts: {
        filterPlaceholder: 'filtro'
      }
    }
  }
});

function getData() {
  const arr = []
  for (i = 0; i < 20; i++) {
    arr.push({
      'id': i,
      'name': `sample${i}`,
      'email': `sample${i}@example.com`,
      'group_name': 'Personnel'
    });
  }
  return arr;
} */