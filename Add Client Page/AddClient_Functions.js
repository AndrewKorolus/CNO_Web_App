function showDate() {
   thisDate = new Date();
   var thisWDay = thisDate.getDay();
   var thisDay = thisDate.getDate();
   var thisMonth = thisDate.getMonth();
   var thisYear = thisDate.getFullYear();
   var mName = new Array("January", "February", "March", "April", "May", 
       "June", "July", "August", "September", "October","November", "December");
   var wdName = new Array("Sunday", "Monday", "Tuesday", "Wednesday",
       "Thursday", "Friday", "Saturday");
   return wdName[thisWDay] + ", " + mName[thisMonth] + " " + thisDay + ", " + thisYear;
}

function weekDay(){
   thisDate = new Date();
   var thisWDay = thisDate.getDay();
   var wdName = new Array("sunday", "monday", "tuesday", "wednesday",
       "thursday", "friday", "saturday");
   return wdName[thisWDay];
}

function showTime() {
	thisDate = new Date();

   	thisMinute = thisDate.getMinutes();
  	thisHour = thisDate.getHours();

  	// change thisHour from 24-hour time to 12-hour time by:
  	// 1) if thisHour < 12 then se ampm to "a.m." otherwise set it to "p.m."
  	var ampm = (thisHour < 12) ? "a.m." : "p.m.";

  	// 2) subtract 12 from the thisHour variable
   	thisHour = (thisHour > 12) ? thisHour - 12 : thisHour;

   	// 3) if thisHour equals 0, change it to 12
  	thisHour = (thisHour == 0) ? 12 : thisHour;

   	// add leading zeros to minutes and seconds less than 10
   	thisMinute = (thisMinute < 10) ? "0" + thisMinute : thisMinute;

   	return thisHour + ":" + thisMinute + " " + ampm;
}
