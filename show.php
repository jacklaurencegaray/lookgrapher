<?php 
	
	// All the required global information
	require('inc/core.php');
	// All the required functions available to all pages
	require('inc/lib.php');
	
	// Used in HighCharts for graph
	function x_axis($array) {
		$i = 1;
		foreach($array as $element) {
			if($i == count($array)) {
				echo "'{$i}'";
			} else {
				echo "'{$i}',";
			}
			$i++;
		}
	}

	// Used for HighCharts graph
	function dataset($array) {
		$i = 1;
		foreach($array as $element) {
			if($i == count($array)) {
				echo "{$element}";
			} else {
				echo "{$element},";
			}
			$i++;
		}
	}

	// Counts the total number of tracks traversed
	function total_tracks($array) {
		$length = count($array) - 1;
		$total = 0;
		for($x = 0; $x < $length; $x++) {
			$total += abs(intval($array[$x]) - intval($array[$x + 1]));
		}
		$total += abs(intval($array[0]) - intval(post('track_after')));
		return $total;
	}

	// Compares A and B, used in usort() below, ascending order
	function compare($a, $b) {
		return intval($a) < intval($b)? -1: 1;
	}

	// Compares A and B, used in usort() below, descending order
	function compare_reverse($a, $b) {
		return intval($a) > intval($b)? -1: 1;
	}

	// In an input of 1, 3, 5, 7, 9, 10, if the very first track was at 5, the max_wall should contain: 7, 9, 10
	function max_wall($value) {
		return $value >= intval(post('track_after'));
	}

	// In an input of 1, 3, 5, 7, 9, 10, if the very first track was at 5, the min_wall should contain: 1, 3, 5
	function min_wall($value) {
		return $value < intval(post('track_after'));
	}
	

	if(is_post('track_after') && is_post('tracks')) {
		// Fetches the user input as to where the track should be, after
		$track_after = intval(post('track_after'));
		// Creates array of tracks separated by end of line. \n
		$tracks = explode(PHP_EOL, post('tracks'));
		
		// Makes sure all input from the array are converted to int
		for($i = 0; $i < count($tracks); $i++)
			$tracks[$i] = intval($tracks[$i]);
		
		// Sorts tracks based on compare() function defined above
		usort($tracks, "compare");
		
		// Fetches the minimum of all inputted tracks
		$min = min($tracks);
		// Fetches maximum of all inputted tracks
		$max = max($tracks);

		// Filters tracks based on min_wall() function above
		$min_wall = array_filter($tracks, "min_wall");
		// Filters tracks based on max_wall() function above
		$max_wall = array_filter($tracks, "max_wall");
		
		// Sorts max_wall() in a reverse order
		usort($min_wall, "compare_reverse");

		// Merges both min_wall and max_wall to mimic LOOK
		$tracks = array_merge($max_wall, $min_wall);

		// Fetches the total number of tracks traversed by the memory
		$total_tracks = total_tracks($tracks);
	} else {
		// If values were not inputted, redirect to index
		redirect('index.php');
	}
	require('inc/header.php');
?>
<style>
* {
	transition: initial;
}
.highcharts-credits {
	display: none;
}
</style>
<div id="container" style="width: 100vw; height: 100vh;"></div>
<a href="index.php">
	<button id="up" style="right: 5%;" class="button"><i class="fa fa-arrow-right"></i></button>
</a>
<?php require('inc/footer.php'); ?>
<script src="js/themes/dark-unica.js"></script>
<script src="js/index.js"></script>
<script>
	Highcharts.chart('container', {
	  	title: {
			text: 'Disks Traversed',
			x: 20,
			y: 30
		},
		subtitle: {
			text: 'LOOK Scheduling Algorithm',
			x: 20,
			y: 50
		},
		xAxis: {
			categories: [<?php echo $track_after; ?>, <?php dataset($tracks); ?>]
		},
		yAxis: {
			title: {
			text: 'TRACKS'
		},
		plotLines: [{
			value: 0,
			width: 1,
			color: '#808080'
		}],
		plotOptions: {
	        line: {
	            dataLabels: {
	                enabled: true
	            },
	            enableMouseTracking: false
	        }
	    },
	}, tooltip: {
		valueSuffix: ' points'
	}, legend: {
		layout: 'vertical',
		align: 'right',
		verticalAlign: 'middle',
		borderWidth: 0
	}, series: 
		[
			{
				name: 'Total: <?php echo $total_tracks; ?> Tracks',
				data: [<?php echo $track_after; ?>, <?php dataset($tracks); ?>]
			}
		]
	});

	$(document).ready(function() {
		convert_all_typed();
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
