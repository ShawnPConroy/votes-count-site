<?php
namespace App\Controllers;

class Election extends BaseController
{

    public function index()
    {
        $data['title'] = 'List of elections';
        $data['elections'] = yaml_parse_file(MUNICIPAL_ELECTIONS_FILE);
        
        return
        view(VC_THEME.'/header', $data)
        . view('vote-list-of-elections', $data)
        . view(VC_THEME.'/footer');
    }
    
    public function info($year, $level, $region) {

        $data['election'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-{$region}.yaml");
        $data['survey'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-survey-questions.yaml");
        $data['responses'] = yaml_parse_file(VC_DATA_PATH."municipal/{$year}-{$region}-responses.yaml");

        if ($data['election']) {
            $data['title'] = $data['election']['Meta']['Name'].' info';

            // return view('vote-election', $data);

            return
                view(VC_THEME.'/header', $data)
                . ($data['election']['Meta']['Overview'] ?
                    view('vote-election-meta', $data) : '' )
                // . view('vote-election-results.php')
                . ($data['election']['Meta']['Listing'] ?
                    view('vote-election-candidate-listing') : '' )
                . view(VC_THEME.'/footer', $data);
        } else {
            $data['title'] = '404 Election not found';
            return view(VC_THEME.'/header', $data)
                . view(VC_THEME.'/errors/html/error_404')
                . view(VC_THEME.'/footer', $data);
        }
        
        return Election::view("2018-municipal");
    }

}