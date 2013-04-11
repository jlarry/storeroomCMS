<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semester
 *
 * @author Tech
 */
class Semester {
    //public $currentsemester = '';
   // public $semesters = array('0'=>'Fall','1'=>'Spring','2'=>'Summer');
    
    static public function getCurrentSemester(){
        $month = date('m');
        
        if($month <= 5){
            $currentsemester = 'Spring';
            return $currentsemester;
        }
        elseif($month >=6 && $month <= 8) {
            $currentsemester = 'Summer';
            return $currentsemester;
    }
        $currentsemester = 'Fall';
        return $currentsemester;
    }
    
    static public function getSemesters(){
        $semesters = array('Fall'=>'Fall','Spring'=>'Spring','Summer'=>'Summer');
        return $semesters;
    }
}

?>
