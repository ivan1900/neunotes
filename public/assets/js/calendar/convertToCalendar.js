export function convertToCalendar(eventsOrigin){
    var events = new Array();
    var obj = new Object();
    
    eventsOrigin.forEach(function(item) {
        obj.id = item.id;
        obj.title = item.title;
        obj.allday = false;
        obj.start = item.startDate;
        obj.end = item.endDate;
        events.push(obj);
    });
    
    return events;
}