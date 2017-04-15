<?php 
	require('inc/core.php');
	require('inc/lib.php');
	require('inc/header.php');
?>
<style>html, body { overflow-x: hidden; }</style>
<div class="fullwidth">
	<div class="content">
		<div class="table" style="width: 100vw;">
			<div class="v-mid fullwidth" style="padding: 0 5vw; width: 100vw;">
				<div class="content" style="padding-top: 8vh; font-size: 20px;">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<form class="form-inline" method="POST" action="show.php" id="form-enter-page">
								<div class="box-header">Track after:</div>
								<div class="box-content">
									<div class="form-group">
										<label class="normal">Process come after which track?</label> &nbsp;&nbsp;
										<input id="track_after" name="track_after" type="text" placeholder="Enter track number" required class="form-control" />
									</div>
								</div>
								<br />
								<div class="box-header">Tracks</div>
								<div class="box-content">
									<div class="form-group">
										<label class="normal">Enter track #: (newline-separated or press enter in every track)</label>
										<br /><br  />
										<textarea id="tracks" name="tracks" required rows="6" class="fullwidth" placeholder="Enter newline separated tracks"></textarea>
										<button id="up" type="submit" class="button"><i class="fa fa-arrow-right"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require('inc/footer.php'); ?>
<script>
	$(document).ready(function() {
		convert_all_typed();

		$("#track_after").keyup(function() {
			if(isNaN(parseInt($(this).val()))) {
				$(this).val("");
			}
		});

		$("#tracks").keyup(function(e) {
			if(e.keyCode == 13) {
				event.preventDefault();
				var values = $("#tracks").val().split("\n");
				console.log(values);
				values.forEach(function (e, i) {
					if(isNaN(parseInt(e)) && e != "") 
						$("#tracks").val("");
				});
			}
		});
	});

	var convert_all_typed = function() {
		var elements = $(".typed");
		elements.each(function(i, e) {
			activate_type(e);
		});
	}

	var activate_type = function(obj) {
		$(obj).typed({
			strings: [$(obj).attr("type")],
        typeSpeed: 0,
        showCursor: true,
        cursorChar: "|",
        shuffle: false,
        contentType: 'html'
		});
	}
</script>