<?php
namespace App\Controllers;

class Election extends BaseController
{

    public function index()
    {
        $data['title'] = 'List of elections';
        $data['elections'] = yaml_parse_file(MUNICIPAL_ELECTIONS_FILE);
        
        return
        view('templates/header', $data)
        . view('vote-list-of-elections', $data)
        . view('templates/footer');
    }
    
    public function info($year, $level, $region) {
        $data['election'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-{$region}.yaml");
        $data['survey'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-survey-questions.yaml");
        $data['responses'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-{$region}-responses.yaml");

        if ($data['election']) {
            $data['title'] = $data['election']['Meta']['Name'].' info';

            // return view('vote-election', $data);

            return
                view('templates/header', $data)
                . ($data['election']['Meta']['Overview'] ?
                    view('vote-election-meta', $data) : '' )
                // . view('vote-election-results.php')
                . ($data['election']['Meta']['Listing'] ?
                    view('vote-election-candidate-listing') : '' )
                . view('templates/footer', $data);
        } else {
            $data['title'] = '404 Election not found';
            return view('templates/header', $data)
                . view('templates/errors/html/error_404')
                . view('templates/footer', $data);
        }
        

        return Election::view("2018-municipal");
    }
    
    public function view_old($election_id) {
        $elections = yaml_parse_file(MUNICIPAL_ELECTIONS_FILE);
        $data['survey'] = yaml_parse_file(SURVEY_QUESTIONS_FILE)[$election_id.'-questions'];
        
        if (isset($elections[$election_id])) {
            $data['eid'] = $election_id;
            $data['title'] = $elections[$election_id]['Info']['Name'];
            $data['election'] = $elections[$election_id];
            return view('templates/header', $data)
            . view('vote-election-overview.php', $data)
            // . view('vote-election-results.php')
            . view('vote-election-listing.php')
            // . view('vote-election.php')
            . view('templates/footer', $data);
        } else {
            return view('templates/header', $data)
                . view('templates/errors/html/error_404.php')
                . view('templates/footer', $data);
        }
    }

}