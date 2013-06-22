$(function() {

	for (i in picks) {
		j = parseInt(i)+1;
		$("#pick"+j).removeClass("rock paper scissors").addClass(picks[i]);
		$("select", "#pick"+j).val(picks[i]);
	}
	$(".card select").change(function() {
		var selected = $(this).val();
		$(this).parent().removeClass("rock paper scissors").addClass(selected);

	});
});
