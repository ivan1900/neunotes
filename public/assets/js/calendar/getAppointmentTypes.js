export function getAppointmentTypes(path) {
    $.ajax({
        url:path+"/calendarres/getAppointmentTypes",
        type:"POST",
        dataType:'json',
        success: function(result){
            return result;
        }
    });
}