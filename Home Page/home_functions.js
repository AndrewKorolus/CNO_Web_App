

// ----------- button functions -------------------

var allButtons = new Array();
var selectedButtons = new Array();
var selectedIds = new Array();
var selectedCategories = new Array();
var disabledButtons = new Array();

var allClients = ["all", "hunters", "observers"];
var allSpecies = ["polarBear", "muskox", "walrus", "centralCaribou", "arcticCaribou", "grizzlyBear", "wolf", "goose"];
var allSeasons = ["spring", "summer", "fall"];
var allLocations = ["arcticBay", "cambridgeBay", "coralHarbour", "hallBeach", "igloolik", "kimmirut", "pondInlet", "resolute", "umingmaktok"];
var allOthers = ["clothes", "rifleRentals"];

var selectedClientButtonID;
var selectedSpeciesID;
var selectedSeasonsButtonID;
var selectedLocationsButtonID;
var selectedOtherButtonID;

var polarBear;
var muskox;
var walrus;
var centralCaribou;
var arcticCaribou;
var grizzlyBear;
var wolf;
var goose;

var	polarBearSelected = false;
var	muskoxSelected = false;
var	walrusSelected = false;
var centralCaribouSelected = false;
var	arcticCaribouSelected = false;
var grizzlyBearSelected = false;
var wolfSelected = false;
var gooseSelected = false;

	function btnClick(category, identifier) 
	{
		var button = document.getElementById(identifier);
		var allFound = false;
		var isDisabled = false;

		for(var i = 0; i < disabledButtons.length; i++)
		{
			if(disabledButtons[i].id == identifier) isDisabled = true;
		}

		switch(category)
		{
			case "clients": selectedClientButtonID = identifier; break;
			case "species":  
				if(!isDisabled)
				{
					selectedSpeciesID = identifier;	
					switch(selectedSpeciesID) 
					{
						case "polarBear_button": polarBearSelected = !polarBearSelected; break;
						case "muskox_button": muskoxSelected = !muskoxSelected; break;
						case "walrus_button": walrusSelected = !walrusSelected; break;
						case "centralCaribou_button": centralCaribouSelected = !centralCaribouSelected; break;
						case "arcticCaribou_button": arcticCaribouSelected = !arcticCaribouSelected; break;  
						case "grizzlyBear_button": grizzlyBearSelected = !grizzlyBearSelected; break;
						case "wolf_button": wolfSelected = !wolfSelected; break;
						case "goose_button": gooseSelected = !gooseSelected; break;
					}
					break;
				} 				
		}

		for(var i = 0; i < selectedIds.length; i++)
		{
			if(selectedIds[i] == identifier)
			{
				// Deselect the button
				selectedButtons[i].src = "buttons/" + selectedCategories[i] + "/" + selectedIds[i] + ".png";

				selectedButtons.splice(i, 1);
				selectedIds.splice(i, 1);
				selectedCategories.splice(i, 1);
				allFound = true;
			}
			else if((selectedCategories[i] == "clients" && selectedIds[i] != selectedClientButtonID))
			{
				// Deselect the button
				selectedButtons[i].src = "buttons/" + selectedCategories[i] + "/" + selectedIds[i] + ".png";

				selectedButtons.splice(i, 1);
				selectedIds.splice(i, 1);
				selectedCategories.splice(i, 1);
			}
		}

		if(!allFound && !isDisabled) 
		{
			selectedButtons.push(button);
			selectedIds.push(identifier);
			selectedCategories.push(category);
		}		

		updateButtons();	
	}

	function updateButtons() 
	{
		resetButtons();
		disabledButtons = []; // clear the Array

		if(polarBearSelected) 
		{
			disabledButtons.push(centralCaribou);
			disabledButtons.push(muskox);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);			
		}
		else if(walrusSelected) 
		{
			disabledButtons.push(centralCaribou);
			disabledButtons.push(muskox);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);
		}	
		else if(muskoxSelected) 
		{
			disabledButtons.push(centralCaribou);
			disabledButtons.push(polarBear);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);
			disabledButtons.push(walrus);
		}	
		else if(centralCaribouSelected)
		{
			disabledButtons.push(arcticCaribou);
			disabledButtons.push(polarBear);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);
			disabledButtons.push(walrus);
			disabledButtons.push(muskox);
		}
		else if(arcticCaribouSelected)
		{
			disabledButtons.push(centralCaribou);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);
		}
		else if(grizzlyBearSelected)
		{
			disabledButtons.push(arcticCaribou);
			disabledButtons.push(polarBear);
			disabledButtons.push(centralCaribou);
			disabledButtons.push(wolf);
			disabledButtons.push(goose);
			disabledButtons.push(walrus);
			disabledButtons.push(muskox);
		}
		else if(wolfSelected)
		{
			disabledButtons.push(arcticCaribou);
			disabledButtons.push(polarBear);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(centralCaribou);
			disabledButtons.push(goose);
			disabledButtons.push(walrus);
			disabledButtons.push(muskox);
		}
		else if(gooseSelected)
		{
			disabledButtons.push(arcticCaribou);
			disabledButtons.push(polarBear);
			disabledButtons.push(grizzlyBear);
			disabledButtons.push(wolf);
			disabledButtons.push(centralCaribou);
			disabledButtons.push(walrus);
			disabledButtons.push(muskox);
		}

		for(var i = 0; i < allButtons.length; i++)
		{
			$(allButtons[i]).hover(function() {
    			$(this).css('cursor','pointer');
			}, function() {
    			$(this).css('cursor','pointer');
			});
		}

		for(var i = 0; i < disabledButtons.length; i++)
		{
			disabledButtons[i].src = "buttons/species/" + disabledButtons[i].id + "_disabled.png";
			$(disabledButtons[i]).hover(function() {
    			$(this).css('cursor','auto');
			}, function() {
    			$(this).css('cursor','auto');
			});
		}

		for(var i = 0; i < selectedButtons.length; i++)
		{
			selectedButtons[i].src = "buttons/" + selectedCategories[i] + "/" + selectedIds[i] + "_click.png";
		}
	}

	function resetButtons() 
	{
		polarBear.src = "buttons/species/polarBear_button.png";
		centralCaribou.src = "buttons/species/centralCaribou_button.png";
		arcticCaribou.src = "buttons/species/arcticCaribou_button.png";
		muskox.src = "buttons/species/muskox_button.png";
		grizzlyBear.src = "buttons/species/grizzlyBear_button.png";
		wolf.src = "buttons/species/wolf_button.png";
		goose.src = "buttons/species/goose_button.png";
		walrus.src = "buttons/species/walrus_button.png";
	}

	// ---------------- expand and shrink functions ---------------------

var clientsToggle = true;
var speciesToggle = true;
var seasonToggle = true;
var locationToggle = true;
var otherToggle = true;

$(document).ready(function() {	

	var form = document.getElementById("searchForm");
	form.addEventListener('submit', function() {
		var selectedTextField = document.getElementById("selected");
		selectedTextField.value = JSON.stringify(selectedIds);
	});

	polarBear = document.getElementById("polarBear_button");
	muskox = document.getElementById("muskox_button");
	walrus = document.getElementById("walrus_button");
	centralCaribou = document.getElementById("centralCaribou_button");
	arcticCaribou = document.getElementById("arcticCaribou_button");
	grizzlyBear = document.getElementById("grizzlyBear_button");
	wolf = document.getElementById("wolf_button");
	goose = document.getElementById("goose_button");

	var allElems = document.getElementsByTagName("img");
	for(var i = 0; i < allElems.length; i++)
	{
		if(allElems[i].className == "content_button") allButtons.push(allElems[i]);
	}


	$("#expandButton_clients").click(function() {
		var innerContent_seasons = $("#inner_content_clients");
		innerContent_seasons.animate({width: 'toggle'});

		var button = document.getElementById("expandButton_clients");

		if(clientsToggle) 
		{
			button.src = "buttons/expand.png";
			clientsToggle = false;
		}		
		else 
		{
			button.src = "buttons/shrink.png";
			clientsToggle = true;
		}		
	});

	$("#expandButton_species").click(function() {
		var innerContent_seasons = $("#inner_content_species");
		innerContent_seasons.animate({width: 'toggle'});

		var button = document.getElementById("expandButton_species");

		if(seasonToggle) 
		{
			button.src = "buttons/expand.png";
			seasonToggle = false;
		}		
		else 
		{
			button.src = "buttons/shrink.png";
			seasonToggle = true;
		}		
	});

	$("#expandButton_seasons").click(function() {
		var innerContent_seasons = $("#inner_content_seasons");
		innerContent_seasons.animate({width: 'toggle'});

		var button = document.getElementById("expandButton_seasons");

		if(seasonToggle) 
		{
			button.src = "buttons/expand.png";
			seasonToggle = false;
		}		
		else 
		{
			button.src = "buttons/shrink.png";
			seasonToggle = true;
		}	
	});

	$("#expandButton_location").click(function() {
		var innerContent_location = $("#inner_content_location");
		innerContent_location.animate({width: 'toggle'});

		var button = document.getElementById("expandButton_location");

		if(locationToggle) 
		{
			button.src = "buttons/expand.png";
			locationToggle = false;
		}		
		else 
		{
			button.src = "buttons/shrink.png";
			locationToggle = true;
		}	
	});

	$("#expandButton_other").click(function() {
		var innerContent_other = $("#inner_content_other");
		innerContent_other.animate({width: 'toggle'});

		var button = document.getElementById("expandButton_other");

		if(otherToggle) 
		{
			button.src = "buttons/expand.png";
			otherToggle = false;
		}		
		else 
		{
			button.src = "buttons/shrink.png";
			otherToggle = true;
		}	
	});
});

// ------------ date and time functions -----------------

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
  	var ampm = (thisHour < 12) ? "AM" : "PM";

  	// 2) subtract 12 from the thisHour variable
   	thisHour = (thisHour > 12) ? thisHour - 12 : thisHour;

   	// 3) if thisHour equals 0, change it to 12
  	thisHour = (thisHour == 0) ? 12 : thisHour;

   	// add leading zeros to minutes and seconds less than 10
   	thisMinute = (thisMinute < 10) ? "0" + thisMinute : thisMinute;

   	return thisHour + ":" + thisMinute + " " + ampm;
}

function logOut() 
{
	window.location = "../login.html";
}

