<?php
// namespace PoliticallyBarrie;
// This is copied and quickly modified from Politically Barrie and probably should be masively rewritten.

helper("Candidate_profile_helper");

?>

<section id="listing">
    <h2 class="major"><span class="fa fa-list"></span> Candidate Listing</h2>
<?php
$surveyNote = "";
$trusteeReminder = "<p>You can read the Simcoe County school board's article about trustees: <a href=\"https://elections.ontarioschooltrustees.org/WhatDoTrusteesDo/SchoolBoardTrustees.aspx\">Who are they? Why are they important?</a>";
$note_for_all_offices = "<div class=\"card hint\"><p><span class=\"fa fa-info\"></span> Mayor, Councillor, Trustee Reminder</p><p>Be sure to look up candidates for mayor, councillor for your ward, and schoolboard trustee for your ward. Also see <a href=\"#profiles-debates-endorsements\">profiles, debates &amp; endorsements</a>.</div>";

unset($candidates);
foreach($election as $seatName => $seat) {
    if ($election == "Meta") continue;
    $candidates[] = '<a href="#'./* generateId($seat['Name'].' Listing').*/'">'.$seat['Name'].'</a>';
}



// if ($election['Meta']['Survey']) $surveyNote = ' All candidate data as well as their survey responses are in the <a href="#survey">survey section</a>.';

// switch('municipal') {
//     case 'municipal':
//         $regionType = "ward";
//         $trusteeReminder = " Also, remember to check for the schoolboard trustee for your ward.";
//         break;
//     case 'provincial':
//     case 'federal':
//         $regionType = "riding";
//         break;
// }

/* <p>Here is a list of all candidates. <?php echo $surveyNote.$trusteeReminder; ?> Select your <? echo $regionType; ?>: 

*/

foreach($election as $seatName => $seat) {
    if ($seatName == 'Meta') continue;
?>
    <details>
        <summary><h3 id="<?php /* echo generateId($seat['Name'].' Listing'); */ ?>"><?php echo $seat['Name']; ?> Candidates</h3></summary>
<?php

        if (!empty($seat['Description'])) {
            echo $seat['Description']."."; // $app->parsedown->text($seat->intro);
        }
        echo "<aside>{$note_for_all_offices}</aside>";
        if (strstr($seat['Name'], "Trustee")) echo $trusteeReminder;
    $first = true;
    foreach ($seat['Candidates'] as $slug=>$candidate) { 
?>
        <h4><?php echo $candidate['Name']; ?></strong> <?php /* echo $candidate['Party']; */ ?></h4>

        <div class="row">
            <div class="col">
                <?php 
                if (!isset($candidate['Info'])) {
                    echo("<div class=\"card warn\"><p>Mising candidate information</p><p>Either this candidate did not enter any campaign information or something as gone wrong.</div>");
                } else {
                    echo "<ul class=\"fa-ul\">\n";
                    foreach($candidate['Info'] as $name=>$datum) {
                        if (is_array($datum)) {
                            foreach($datum as $subdatum) {
                                echo "\t\t\t\t\t".candidateProfileInfoLi($name, $subdatum);
                            }
                        } else {
                            echo "\t\t\t\t\t".candidateProfileInfoLi($name, $datum);
                        }
                    }
                    echo "\t\t\t\t</ul>\n";
                }
                ?>
            </div>
            <div class="col">
            <?php
            if (isset($responses[$slug])) {
                foreach($responses[$slug] as $question_slug => $answer) {
                    // This does not properly deal clarifications, I thought the issue was bullet points being processed wrong but it's clarifications
                    // if (is_array($answer)) $answer = implode("\n<br><br>\n", $answer);
                    echo "<details class=\"card\"><summary>{$survey['Meta']['Question Index'][$question_slug]['Label']}</summary>";
                    if (!is_array($answer)) {
                        if (isset($survey['Meta']['Question Index'][$question_slug]['Responses'])) {
                            if (isset($survey['Meta']['Question Index'][$question_slug]['Responses'][$answer])) {
                                // Get the pre-programmed response from survey that was selected by it's slug.
                                echo nl2br($survey['Meta']['Question Index'][$question_slug]['Responses'][$answer]);
                            }
                            else {
                                // Was not saved as a slug, but as the answer itself. So show the answer. (2018 responses).
                                echo nl2br($answer);
                            }
                        }
                        else {
                            echo nl2br($answer);
                        }
                    } else {
                        Echo "Data error. Please report this.";
                    }
                    echo "</details>\n";
                }
            }   
            ?>
            </div>
        </div>
        <?php
    } // endforeach $seatData['Candidates']
    echo $note_for_all_offices;
    ?></details><?php
    /* echo $sectionsList; */
} // endforeach $page->election (seat)


?>
</section>