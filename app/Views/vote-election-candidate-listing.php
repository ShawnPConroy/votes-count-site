<?php
// namespace PoliticallyBarrie;
// This is copied and quickly modified from Politically Barrie and probably should be masively rewritten.

helper("Candidate_profile_helper");

?>

<section id="listing">
    <h2 class="major"><span class="fa fa-list"></span> Candidate Listing</h2>
<?php
unset($candidates);
foreach($election as $seatName => $seat) {
    if ($election == "Meta") continue;
    $candidates[] = '<a href="#'./* generateId($seat['Name'].' Listing').*/'">'.$seat['Name'].'</a>';
}

$introText = "";
if ($election['Meta']['Survey']) $introText = ' All candidate data as well as their survey responses are in the <a href="#survey">survey section</a>.';

switch('municipal') {
    case 'municipal':
        $regionType = "ward";
        $introText .= " Also, remember to check for the schoolboard trustee for your ward.";
        break;
    case 'provincial':
    case 'federal':
        $regionType = "riding";
        break;
}

?>
    <p>Here is a list of all candidates. <?php echo $introText; ?> Select your <? echo $regionType; ?>: 
        <!-- <?php /* echo generateList($candidates, ", "); */ ?></p> -->
<?php
foreach($election as $seatName => $seat) {
    if ($seatName == 'Meta') continue;
?>
    <details>
        <summary><h3 id="<?php /* echo generateId($seat['Name'].' Listing'); */ ?>"><?php echo $seat['Name']; ?> Candidates</h3></summary>
<?php
        if (!empty($seat['Description'])) {
            echo $seat['Description']; // $app->parsedown->text($seat->intro);
        }
    $first = true;
    foreach ($seat['Candidates'] as $candidate) { 
?>
        <h4><?php echo $candidate['Name']; ?></strong> <?php /* echo $candidate['Party']; */ ?></h4>

        <div class="row">
            <div class="col">
                <?php 
                /* echo $candidate->detailsLi; */
                if (!isset($candidate['Info'])) {
                    echo("<div class=\"card warn\"><p>Mising candidate information</p><p>Either this candidate did not enter any campaign information or something as gone wrong.</div>");
                } else {
                    echo "<ul class=\"fa-ul\">\n";
                    foreach($candidate['Info'] as $name=>$datum) {
                        if (is_array($datum)) {
                            $temp = "";
                            foreach($datum as $subdatum) {
                                $temp .= $subdatum.'<br/>';
                            }
                            $datum = $temp;
                        }
                        // echo "<li>{$name}: {$datum}</li>\n";
                        echo "\t\t\t\t\t".candidateProfileInfoLi($name, $datum);
                    }
                    echo "\t\t\t\t</ul>\n";
                }
                ?>
            </div>
            <div class="col">
            <?php
            if (isset($candidate['Survey'])) {
                foreach($candidate['Survey'] as $questionId => $answer) {
                    // This does not show the actual question
                    // $survey[$eId]['part goes here?'][$questionId]
                    // Needs and ID section?
                    // $survey[$eId]['Meta']['Question Index'][$questionId]
                    // This does not properly deal clarifications, I thought the issue was bullet points being processed wrong but it's clarifications
                    // if (is_array($answer)) $answer = implode("\n<br><br>\n", $answer);
                    echo "<details class=\"card\"><summary>{$survey['Meta']['Question Index'][$questionId]['Label']}</summary>";
                    // echo "<details class=\"card\"><summary>{$questionId}</summary>";
                    
                    // Current
                    // var_dump($survey);
                    // die();



                    // var_dump($answer);
                    if (!is_array($answer)) echo $answer;
                    echo "</details>\n";
                }
            }   
            ?>
            </div>
        </div>
        <?php
    } // endforeach $seatData['Candidates']
    ?></details><?php
    /* echo $sectionsList; */
} // endforeach $page->election (seat)
?>
</section>