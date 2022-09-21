<?php
function candidateProfileInfoLi($type, $data) {
    switch ($type) {
        case 'Email':
            $link = 'mailto:'.$data;
            $icon = 'fa-envelope';
            $aria = 'email';
            $text = $data;
            break;
        case 'Phone':
            $icon = 'fa-phone';
            $aria = 'phone number';
            $text = $data;
            break;
        case 'Election Day':
            $icon = 'fa-check';
            $aria = '';
            $text = $type .": ". $data;
            break;
        case 'Advance Voting':
            $icon = 'fa-angle-right';
            $aria = '';
            $text = $data;
            break;
        case 'Advance Voting Date':
            $icon = 'fa-arrow-circle-up';
            $aria = '';
            $text = $data;
            break;
        case 'City Hall Voting':
            $icon = 'fa-institution';
            $aria = '';
            $text = $type .": ". $data;
            break;
        case 'Fax':
            $icon = 'fa-fax';
            $aria = 'fax';
            $text = $data;
            break;
        case 'Address':
            $icon = 'fa-map-marker';
            $aria = 'address';
            $text = $data;
            $link = 'https://www.google.ca/maps/place/'.strip_tags($data);
            break;
        case 'Facebook Page':
            $icon = 'fa-facebook';
            $aria = 'Facebook page';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'Facebook Group':
            $icon = 'fa-facebook';
            $aria = 'Facebook group';
            $text = getUsername($data);
            if (is_numeric($text)) {
                $text = $type;
            }
            $link = $data;
            break;
        case 'Facebook Profile':
            $icon = 'fa-facebook';
            $aria = 'Facebook Profile';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'Facebook':
            $icon = 'fa-facebook';
            $aria = "Facebook";
            $text = $data;
            $link = $data;
            break;
        case 'Instagram':
            $icon = 'fa-instagram';
            $aria = 'Instagram';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'Twitter':
            $aria = 'Twitter';
            $icon = 'fa-twitter';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'LinkedIn':
            $aria = 'LinkedIn';
            $icon = 'fa-linkedin';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'YouTube':
            $aria = 'YouTube';
            $icon = 'fa-youtube';
            $text = getUsername($data);
            $link = $data;
            break;
        case 'Link':
            $aria = 'link';
            $icon = 'fa-external-link';
            $text = $data; // $data['text'];
            $link = $data; // $data['link'];
            break;
        case 'Warning':
            $icon = 'fa-warning';
            $text = $data;
            $aria = 'notice';
            break;
        case 'Default':
        default:
            if (!($type == 'Name' || $type == 'Party' || $type == 'Party Short Form' || $type == 'Office' || $type == 'Gender')) {
                $icon = 'fa-circle';
                $aria = $type;
                $text = $type.': '.$data;
            }
    }
    
    // create li
    $result = '<i class="fa '.$icon.' fa-fw" aria-label="'.$aria.'"></i> '.$text;
    if (isset($link)) {
        $result = '<a href="'.$link.'">'.$result.'</a>';
    }
    $result = "<li>".$result."</li>\n";
  
    return $result;
}



function getUsername($dataDescription) {
    if (empty($dataDescription)) {
        return "";
    }
    // Get username
    $urlPath = explode('/', $dataDescription);
    while (empty($username = array_pop($urlPath))) {
        //Advance until true
    }
    return $username;
}

