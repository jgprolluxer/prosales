/*
 * webroot/js/ready.js 
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */

// JavaScript Document

$(document).ready(function() {

	 var qualifyURL = function(pathOrURL) {
		   if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
			   
		     return baseAppPath + pathOrURL;
		   }
		   alert(pathOrURL);
		   return pathOrURL;
		 };
		 
    // page is now ready, initialize the calendar...
	jQuery18('#calendar').fullCalendar({
		
		header: {
    		left:   'today',
    		center: 'title',
    		right:  'agendaDay,agendaWeek,month prev,next'
		},
		defaultView: 'month',
		firstHour: 8,
		weekMode: 'variable',
		aspectRatio: 2.5,
		selectable: true,
		editable: true,
		events: qualifyURL("/activities/calendarfeed"),
		eventRender: function(event, element) {
        	element.qtip({
				content: event.details,
				position: { 
					target: 'mouse',
					adjust: {
						x: 10,
						y: -5
					}
				},
				style: {
					name: 'light',
					tip: 'leftTop'
				}
        	});
    	},
		eventDragStart: function(event) {
			jQuery18(this).qtip("destroy");
		},
		eventDrop: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			if(event.allDay == true) {
				var allday = 1;
			} else {
				var allday = 0;
			}
			var url = qualifyURL("/full_calendar/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00&allday="+allday);
			$.post(url, function(data){});
		},
		eventResizeStart: function(event) {
			jQuery18(this).qtip("destroy");
		},
		eventResize: function(event) {
			var startdate = new Date(event.start);
			var startyear = startdate.getFullYear();
			var startday = startdate.getDate();
			var startmonth = startdate.getMonth()+1;
			var starthour = startdate.getHours();
			var startminute = startdate.getMinutes();
			var enddate = new Date(event.end);
			var endyear = enddate.getFullYear();
			var endday = enddate.getDate();
			var endmonth = enddate.getMonth()+1;
			var endhour = enddate.getHours();
			var endminute = enddate.getMinutes();
			var url = qualifyURL("/full_calendar/events/update?id="+event.id+"&start="+startyear+"-"+startmonth+"-"+startday+" "+starthour+":"+startminute+":00&end="+endyear+"-"+endmonth+"-"+endday+" "+endhour+":"+endminute+":00");
			jQuery18.post(url, function(data){});
		}
    })

});
