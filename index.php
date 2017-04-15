<?php
	require('inc/header.php');
?>
<style>html, body { overflow-x: hidden; overflow-y: hidden; }</style>
<div class="container-fluid">
	<div class="content">
		<div class="table text-center" style="width: 100vw;">
			<div class="v-mid fullheight fullwidth text-center" style="width: 100vw;">
				<span id="title" class="highsize" style="text-transform: initial; font-family: 'Titillium Web';"></span>
			</div> 
			<div class="prepare-hide"><div id="input"></div></div>
		</div>
	</div>
</div>
<?php require('inc/footer.php'); ?>
<script>
	const keys = {"enter": 13};
	const width = $(document).width();

	$(document).ready(function () {
		if(width < 600) {
			$("#num_processes").css("font-size", "3vh");
		}

		type_it("title");
		setTimeout(() => $("#title").addClass("animated zoomOutUp"), 1500);
		setTimeout(() => window.location = "get_table.php", 2500);
	});

	var type_it = function(id) {
      $("#" + id).typed({
        strings: ["LOOK <strong>Algorithm</strong>"],
        typeSpeed: 0,
        showCursor: true,
        cursorChar: "|",
        shuffle: false,
        contentType: 'html'
    	});
    };

	var show_input = function() {
		var stylize = "";
		if(width < 600) 
			var stylize = "font-size: 27px;"

		$("#input").html("<form action='get_table.php' method='post'><input name='num_processes' type='text' id='num_processes' class='full form-control' id='form' placeholder='How many tracks?' style='" + stylize + "'/></form>");
	}
</script>
