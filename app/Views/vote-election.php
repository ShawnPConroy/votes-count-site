<?php
// THIS FILE IS NOT USED

die('not used');



$sectionsList = '<nav><ul class="sectionJump box highlight style2"><li>Jump to section:</li>';
if ($election['Meta']['Results'])
    $sectionsList .= '<li><a href="#results" class="icon fa-bar-chart"> Election Results</a></li>';
if ($election['Meta']['Overview'])
    $sectionsList .= '<li><a href="#overview" class="icon fa-info-circle"> Election Overview</a></li>';
if ($election['Meta']['Listing'])
    $sectionsList .= '<li><a href="#listing" class="icon fa-list"></span> Candidate Listing</a></li>';
if ($election['Meta']['Survey'])
    $sectionsList .= '<li><a href="#survey" class="icon fa-commenting-o"></span> Survey Results</a></li>';

$sectionsList .= '<li><a href="/vote/" class="icon fa-chevron-left"></span> Other elections</a></li></ul></nav>' .
    '<p class="box highlight style3">See a mistake? Email me with updates.</p>';

echo view('templates/header');

if ($election['Meta']['Contents']) { ?>
<h1 class="major"><?php echo $election['Meta']['Name']; ?></h1>
<?php
    echo $sectionsList;
}

// if ($election['Meta']['Results']) echo view('vote-election-results');
if ($election['Meta']['Overview']) echo view('vote-election-meta');
if ($election['Meta']['Listing']) echo view('vote-election-candidate-listing');
// if ($election['Meta']['Survey']) echo view('vote-election-survey');
echo view('templates/footer');