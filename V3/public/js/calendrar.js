
document.addEventListener('DOMContentLoaded', function () {
	flatpickr("#date-picker", {
		minDate: new Date().fp_incr(1), 
		dateFormat: "Y-m-d",
		disable: [
			function(date) {
			   
				return (date.getDay() === 0); 
			}
		],
		onDayCreate: function(dObj, dStr, fp, dayElem) {
			
			let date = dayElem.dateObj;
			if (date >= new Date().fp_incr(1)) {
				dayElem.style.backgroundColor = "#74b7c0"; 
				dayElem.style.color = "#f4f4f4"; 
			} else {
				dayElem.style.backgroundColor = "#d3d3d3"; 
				dayElem.style.color = "#999999"; 
			}
		}
	});
});

$(document).ready(function() {
	var messageBox = $('#message');
	
	if (messageBox.length && messageBox.text().trim().length > 0) {
		displayMessage(messageBox.text(), 'success');
	}
});
function displayMessage(message, type) {
	var messageBox = $('#message');
	var messageClass = (type === 'success') ? 'alert-success' : 'alert-error';

	messageBox.removeClass().addClass('alert ' + messageClass).text(message).fadeIn();
	setTimeout(function() {
		messageBox.fadeOut();
	}, 3000); 
}