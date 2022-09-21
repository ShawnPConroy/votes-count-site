<section>
<?php
if (!empty($election['Results Link'])) {
?>
	<p><a href="<?php echo $election['Meta']['Results Link']; ?>">View Election Results (unofficial)</a></p>
<?php
}
?>
	<!-- <h2><a href="#candidates"><i class="fa fa-users"></i> Candidates</a></h2>

	<p>I have collected a list of all candidates, and sent them my own survey. I&#8217;ve also linked to surveys from other advocacy organizations. Contact me if you know of more. View my <a href="#candidates">list of all candidates</a>.</p>
	<ul>
		<li><a href="#listing" class="button small">Candidate List</a></li>
	</ul> -->
	

<div class="row">
	<div class="col">
		<h2><i class="fa fa-calendar-check-o"></i> Election Dates</h2>
		<ul class="fa-ul">
			<?php 
			foreach ($election['Meta']['Dates'] as $name=>$value) {
				if (is_array($value)) {
					$dates = "<ul>";
					foreach($value as $date) {
						$dates .= "<li>{$date}</li>";
					}
					$value = $dates."</ul>";
				}
				
				echo "<li>{$name}: {$value}</li>";
			}
			
			
			?>
		</ul>

		<h2><i class="fa fa-map-marker"></i> Voting Locations</h2>
		
		<p>You can <a href="<?php echo $election['Meta']['Links']['Voting Locations Link']; ?>">view the list of all voting locations</a>. There is one per ward, but usually you can vote at any voting location. Most voting is expected to be online.</p>
	</div>



	<div class="col">
		<h2><i class="fa fa-id-card-o"></i> Voter ID</a></h2>
	
		<p>You must have a piece of ID with your name and address on it. Ontario driver&#8217;s license, photo Health Card or Photo Card. <a href="<?php echo $election['Meta']['Links']['Voter ID Link']; ?>">See the full list of accepted ID (PDF)</a>.</p>
		
		<p>You can also check if you are <a href="<?php echo $election['Meta']['Links']['Voter Registration Link']; ?>">registered to vote</a>. If you see the red text at the bottom of the page saying you are not listed, follow that link to register.</p>
		
		<?php
		if (!empty($election['Meta']['Links'])) {
		?>
			<h2><i class="fa fa-link"></i> Links</h2>
			<ul class="fa-ul">
				<?php
				foreach ($election['Meta']['Links'] as $name => $value) {
					echo "<li><a href=\"$value\">$name</a></li>";
				}
				?>
			</ul>
			<?php
		}
		?>
			

	</div>
</div>
				
</section>
