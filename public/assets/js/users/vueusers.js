Vue.use(VueTables.ClientTable);

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
        filterPlaceholder: 'filter'
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
}