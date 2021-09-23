function getClosetDateByTime(time) {
    // Add time in Hour:Minute format(24 hrs)
    const endTime = time;

    const today = new Date();
    const currentTimeHour = today.getHours();
    const currentTimeMinute = today.getMinutes();

    const endTimeHour = parseInt(endTime.split(":")[0]);
    const endTimeMinute = parseInt(endTime.split(":")[1]);

    let closetTimestamp = new Date();

    // If current hour is greater than end hour (or) if current hour is equal to end hour & current minute is equal or grater than end minute
    if (currentTimeHour > endTimeHour || (currentTimeHour === endTimeHour && currentTimeMinute >= endTimeMinute)) {
        //tomorrow date
        closetTimestamp.setDate(closetTimestamp.getDate() + 1);
    }

    closetTimestamp.setHours(endTimeHour);
    closetTimestamp.setMinutes(endTimeMinute);
    closetTimestamp.setSeconds(00);

    return closetTimestamp;
}

// Update the count down every 1 second
setInterval(function() {
	const closetTimeStamp = getClosetDateByTime(rdc.data);

	const countDownDate = closetTimeStamp.getTime();

    // Get today's date and time
    const now = new Date().getTime();

    // Find the distance between now and the count down date
    const distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="recurring-daily-countdown"
    document.getElementById("recurring-daily-countdown").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

    // If the count down is over 
    if (distance < 0) {
        //clearInterval(x);
    }
}, 1000);