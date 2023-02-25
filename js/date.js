
var date = new Date();
var tdate = date.getDate(); 
var month = date.getMonth() + 1;
var hour = date.getHours();
var minutes = date.getMinutes();
if(tdate < 10){
    tdate = '0' + tdate;
}
if(month < 10){
    month = '0' + month;
}
if(hour < 10){
    hour = '0' + hour;
}
if(minutes < 10){
    minutes = '0' + minutes;
}
var year = date.getUTCFullYear();
var minDate = year + "-" + month + "-" + tdate + "T" + hour + ":" + minutes;
document.getElementById("sched_date").setAttribute('min', minDate);

// Get the input element
var datetimePicker = document.getElementById("sched_date");

// Add a change event listener to the input element
datetimePicker.addEventListener("change", function() {
    // Get the selected date and time
    var selectedDate = new Date(datetimePicker.value);

    // Set the start and end times for the desired range (6 am and 8 pm)
    var startTime = new Date();
    startTime.setHours(6, 0, 0);
    var endTime = new Date();
    endTime.setHours(20, 0, 0);

    var currentHour = date.getTime();

    // Compare the selected date and time to the desired range
    if (selectedDate.getDate() == date.getDate() && selectedDate.getTime() >= startTime.getTime() && selectedDate.getTime() <= endTime.getTime()) {
        // The selected date and time is within the desired range
        console.log("The selected date and time is within the desired range.");
        if( selectedDate.getTime() > currentHour){
            console.log('time is okay');
        }
        else{
            alert("Time must be 1 hour ahead.")
            datetimePicker.value = '';
        }
    }else if(selectedDate.getDate() > date.getDate()){
        var futureTime = selectedDate.getTime();
        var currentTime = date.getTime();
        var differenceInTime = futureTime - currentTime;
        var differenceInDays = Math.ceil(differenceInTime / (1000 * 3600 * 24));
        var totalDays = Math.floor(differenceInDays);
        var start_time = new Date();
        start_time.setDate(start_time.getDate() + totalDays);
        start_time.setHours(6, 0, 0);
        var end_time = new Date();
        end_time.setDate(end_time.getDate() + totalDays);
        end_time.setHours(20, 0, 0);
        if (selectedDate.getTime() >= start_time && selectedDate.getTime() <= end_time) {
            console.log('Time is okay');
        }

        else{
            console.log("The selected date and time is outside the desired range.");
            alert("Date and time should be between 6:00 am and 8:00 pm.")
            datetimePicker.value = '';

        }
        }
    else {
        // The selected date and time is outside the desired range
        console.log("The selected date and time is outside the desired range.");
        alert("Date and time should be between 6:00 am and 8:00 pm.")
        datetimePicker.value = '';
    }
});
