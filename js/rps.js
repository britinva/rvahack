$(function() {
	if (typeof(picks) != "undefined") {
		for (i in picks) {
			j = parseInt(i)+1;
			$("#pick"+j).removeClass("rock paper scissors").addClass(picks[i]);
			$("select", "#pick"+j).val(picks[i]);
		}
		$(".card select").change(function() {
			var selected = $(this).val();
			$(this).parent().removeClass("rock paper scissors").addClass(selected);

		});
	}
	
	$("#challenge select[name='username']").change(function() {
		myName = $("#challenge input[name='myname']").val();
		$("#challenge input[name='challenge-title']").val(myName+" vs. "+$(this).val());
	});
});
