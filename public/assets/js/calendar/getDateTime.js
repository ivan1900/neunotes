export function getDateTime() {
    var nowDate = [];
    var hoy = new Date();
    var month = hoy.getMonth() + 1;
    if (month < 10){
        month = month.toString();
        month = '0' + month;
    }
    nowDate.push({startDate: hoy.getFullYear() + '-' + month + '-' + hoy.getDate() });
    nowDate.push({startTime: hoy.getHours() + ':' + hoy.getMinutes() });
    nowDate.push({endDate: nowDate[0].startDate});
    nowDate.push({endTime: (hoy.getHours()+1) + ':' + hoy.getMinutes() });
  
    return nowDate;
}