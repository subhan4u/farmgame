<?php
if(isset($_POST['sr'])){
    session_start();
    $farmer = array(1);
    $cow = array(2,3);
    $bunny = array(4,5,6,7);
        
    $rand = random_int(1,7);
    $arr = array("fed"=>$rand);
    
    
    if(!in_array($rand, $farmer) && (isset($_SESSION['farmer']) <= 6 || $_SESSION['farmer'] == NULL)){
        $_SESSION['farmer']++;
        if($_SESSION['farmer'] == 6){
            $arr['farmer'] = 'died';
            $arr['game'] = 'end';
            $_SESSION['farmer'] = 0;
        }   
        $arr['farmercount'] = $_SESSION['farmer'];
    }
    else{
        $_SESSION['farmer'] = 0;
        $arr['farmercount'] = $_SESSION['farmer'];
    }
    
    if(!in_array($rand, $cow) && (isset($_SESSION['cow1']) <= 4 || $_SESSION['cow1'] == NULL)){
        $_SESSION['cow1']++;
        if($_SESSION['cow1'] == 4){
            $arr['cow1'] = 'died';
            $_SESSION['cow1'] = 0;
        }   
        $arr['cowcount1'] = $_SESSION['cow1'];
    }
    else{
        $_SESSION['cow1'] = 0;
        $arr['cowcount1'] = $_SESSION['cow1'];
    }
    
    echo json_encode($arr);
}
