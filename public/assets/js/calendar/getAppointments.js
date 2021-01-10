export function getAppointments(path, callback) {
    /*version Promise gotchas (promesa tramapa) 
    $.ajax({
        url:path+"/AppointmentsRes/getAppointmentsID",
        type:"GET",
        dataType:'json'
    });*/

    
    /*Version callback*/
    $.ajax({
        url:path+"/AppointmentsRes/getAppointmentsID",
        type:"GET",
        dataType:'json',
        success : function(result) {
            callback(result);
        },
        error : function(request, status, error){
            console.log('fail '.error);
        }
    });
    
    
    /*versión asincrona
    $.ajax({
        url:path+"/AppointmentsRes/getAppointmentsID",
        type:"GET",
        dataType:'json'
    }).done(function(result){
        
        return result;
    }).fail(function (jqXHR, textStatus){
        return textStatus;
    })
    */
} 
//ver como pasar parametro