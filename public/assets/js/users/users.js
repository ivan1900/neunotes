//import {getPath} from '../shared/getPath.js';

$(document).ready(function(){

    //var path = getPath();

    $('#users-table').DataTable({
        pageLength: 25,
        responsive: true,
        
        dom: '<"html5buttons"B>lTfgitp',
        buttons: []

    });

});
