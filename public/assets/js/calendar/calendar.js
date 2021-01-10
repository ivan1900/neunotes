import {getPath} from './getPath.js';
import {getAppointments} from './getAppointments.js';
import {convertToCalendar} from './convertToCalendar.js';
import {getDateTime} from './getDateTime.js';

$(document).ready(function() {
    
    var path = getPath();
    
    getAppointments(path, function(result){
        var events = convertToCalendar(result);
        $('#calendar').fullCalendar('addEventSource', events);
    });
        
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });

    console.log(getDateTime());
/* initialize the external events
 -----------------------------------------------------------------*/


$('#external-events div.external-event').each(function() {

    // store data so the calendar knows to render an event upon drop
    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true // maintain when user navigates (see docs on the renderEvent method)
    });

    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 1111999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0  //  original position after the drag
    });

});


/* initialize the calendar
 -----------------------------------------------------------------*/
var date = new Date();
var d = date.getDate();
var m = date.getMonth();
var y = date.getFullYear();


$('#calendar').fullCalendar({
    buttonText: {
        today: 'Hoy',
        month: 'Mes',
        agendaWeek: 'Semana',
        agendaDay: 'Día'
    },
    titleFormat: 'MMM D YYYY',
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'    
    },
    dayNamesShort: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabádo'],
    dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sabádo'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    firstDay: 1,
    minTime: "08:00:00",
    maxTime: "19:00:00",
    slotDuration: "00:15:00",
    locale: 'es',
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    drop: function() {
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
        }
    }
    
});


});