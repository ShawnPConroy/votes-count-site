<section>
<?php
helper("Candidate_profile_helper");
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
		<h3><i class="fa fa-calendar"></i> Election Dates</h3>
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
				echo candidateProfileInfoLi($name, $value);
			}
			
			
			?>
		</ul>

		<h3><i class="fa fa-map-marker"></i> Voting Locations</h3>
		
		<p>You can <a href="<?php echo $election['Meta']['Links']['Voting Locations Link']; ?>">view the list of all voting locations</a>. There is one per ward, but usually you can vote at any voting location. Most voting is expected to be online.</p>
	</div>



	<div class="col">
		<h3><i class="fa fa-id-card-o"></i> Voter ID</a></h3>
	
		<p>You must have a piece of ID with your name and address on it. Ontario driver&#8217;s license, photo Health Card or Photo Card. <a href="<?php echo $election['Meta']['Links']['Voter ID Link']; ?>">See the full list of accepted ID (PDF)</a>.</p>
		
		<p>You can also check if you are <a href="<?php echo $election['Meta']['Links']['Voter Registration Link']; ?>">registered to vote</a>. If you see the red text at the bottom of the page saying you are not listed, follow that link to register.</p>
		
		<?php
		if (!empty($election['Meta']['Links'])) {
		?>
			<h3><i class="fa fa-link"></i> Links</h3>
			<ul>
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


<section id="profiles-debates-endorsements">
	<h2><span class="fa fa-certificate"></span> Profiles, Debates &amp; Endorsements</h2>
	<p><a href="https://feedback.votescount.ca/">Contact me</a> if you find additional profiles, debates, endorsements/voting guides or other corrections.</p>
<div class="row">
	
	<?php if (!empty($election['Meta']['Profile Links'])) { ?>
		<div class="col-4">
		<h3><i class="fa fa-user-circle"></i> Profiles</h3>
		<ul>
			<?php
			foreach ($election['Meta']['Profile Links'] as $name => $value) {
				echo "<li><a href=\"$value\">$name</a></li>";
			}
			?>
		</ul>
		</div>
	
	<?php }
	if (!empty($election['Meta']['Debate Links'])) { ?>
	<div class="col-4">
		<h3><i class="fa fa-comments-o "></i> Debates</h3>
		<ul>
			<?php
			foreach ($election['Meta']['Debate Links'] as $name => $value) {
				echo "<li><a href=\"$value\">$name</a></li>";
			}
			?>
		</ul>
	</div>
	<?php }
	if (!empty($election['Meta']['Endorsements'])) { ?>
	<div class="col-4">
		<h3><i class="fa fa-star"></i> Endorsements</h3>
		<ul>
			<?php
			foreach ($election['Meta']['Endorsements'] as $name => $value) {
				echo "<li><a href=\"$value\">$name</a></li>";
			}
			?>
		</ul>
	</div>
	<?php } ?>
</div>

</section>