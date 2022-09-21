<?php

namespace App\Controllers;

class Municipality extends BaseController
{

    public function index()
    {
        $data['title'] = 'List of Ontario municipalities';

        helper('Ontario_csv_helper');
        $data['municipalities'] = loadCsv(MUNICIPAL_CANDIDATES_2018, CSV_GROUP1);

        return view('templates/header', $data)
            . view('municipality-info', $data)
            . view('templates/footer');
    }
    
    public function view($municipality)
    {
        // if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
        //     // Whoops, we don't have a page for that!
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        // }
        $data['title'] = $municipality;
        
        helper('Ontario_csv');


        // $f = fopen("../../data-utils/amo-files/2018-municipal-candidate.csv", 'r')
        //     or die("File failed");
        // $m = [];
        // while (($l = fgets($f)) !== false) {
        //     $candidate = explode(',', $l);
        //     // $name = explode(',', $l);
        //     if ($candidate[0] == $municipality) {
        //         $m[] = $candidate;
        //     }
        //     // $m[] = $l;
        // }
        // fclose($f);
        $data['candidates'] = loadCsv(, CSV_GROUP1)[strtolower($municipality)];

        
        return view('templates/header', $data)
            . view('municipality-list', $data)
            . view('templates/footer');
    }
}
