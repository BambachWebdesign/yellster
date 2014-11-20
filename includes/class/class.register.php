<?php
namespace system;

class register {
    public function check_name($name) {
        database::connect_with_db();
        $name = substr($name,0,50);
        $name = security::clear_input($name);
        $name = str_replace(' ','',$name);
        $name = str_replace('-','',$name);
        $query = mysql_query("SELECT * FROM `global`.`users` WHERE `global`.`users`.`user_name` = '$name'");    
        $checkit = mysql_fetch_row($query);
        if($checkit) {
            return false;
        } else {
            return $name;
        }
    }
    public function check_email($input) {
        $input = strip_tags($input);
        $input = substr($input,0,50);
        $is_email = strrchr ($input, '@' );
        $domain = substr($is_email,1);
        if($input=="") {
            return "4";
        } elseif($is_email==false) {
            return "2";
        } elseif($domain=="mailinator.com" OR $domain=="savemail.info") {
            return "3";
        } else {
            database::connect_with_db();
            $query = mysql_query("SELECT * FROM `global`.`users` WHERE `global`.`users`.`user_email` = '$input'");
            $checkit = mysql_fetch_row($query);
            return ($checkit)? "1" : $input;
        }
        
    }
    public function check_password($input) {
        $input = substr($input,0,130);
        $strengh = $length = strlen($input);
        
        for($a = 65; $a <= 90; $a++ ) {
            $spechial_char = chr($a);
            $char_exists = strrchr($input,$spechial_char);
            if($char_exists!=false){$strengh = $strengh + 2;}
        }
        for($b = 48; $b <= 57; $b++ ) {
            $spechial_char = chr($b);
            $char_exists = strrchr($input,$spechial_char);
            if($char_exists!=false){$strengh = $strengh + 3;}
        }
        for($c = 128; $c <= 255; $c++ ) {
            $spechial_char = chr($c);
            $char_exists = strrchr($input,$spechial_char);
            if($char_exists!=false){$strengh = $strengh;}
        }        
        if($input=="") {
            return 0;
        } elseif($length<6) {
            return 1;
        } elseif($strengh<=15) {
            return 2;
        } elseif($strengh<=20) {
            return 3;
        } elseif($strengh>20) {
            return 4;
        }
    }
    public function check_input_big($input) {
        $input = substr($input,0,50);
        $input = security::clear_input($input);
        if($input!="") {
            return $input;
        } else {
            return false;
        }
    }
    public function check_input_medium($input) {
        $input = substr($input,0,30);
        $input = security::clear_input($input);
        if($input!="") {
            return $input;
        } else {
            return false;
        }
    }
    public function check_input_small($input) {
        $input = substr($input,0,10);
        $input = security::clear_input($input);
        if($input!="") {
            return $input;
        } else {
            return false;
        }
    }
    public function check_firstname($input) {
        $input = substr($input,0,50);
        $input = security::clear_input($input);
        return ($input!="")? $input : false;
    }
    public function check_familyname($input) {
        $input = substr($input,0,50);
        $input = security::clear_input($input);
        return ($input!="")? $input : false;
    }
    public function check_birthdate($day,$month,$year) {
        $day = substr($day,0,2);
        $day = strip_tags($day);
        $day = trim($day);
        $month = substr($month,0,2);
        $month = strip_tags($month);
        $month = trim($month);
        $year = substr($year,0,4);
        $year = strip_tags($year);
        $year = trim($year);        
        for($a = 0; $a <= 47; $a++ ) {            
                $banned_char = chr($a);
                $day = str_replace($banned_char,'',$day);
                $month = str_replace($banned_char,'',$month);
                $year = str_replace($banned_char,'',$year);            
        }
        for($b = 58; $b <= 255; $b++ ) {
                $banned_char = chr($b);
                $day = str_replace($banned_char,'',$day);
                $month = str_replace($banned_char,'',$month);
                $year = str_replace($banned_char,'',$year);
        }
        $schaltjahr=bcmod ($year, 4 );                
        if($day=="" OR $month=="" OR $year=="") {
            return false;
        } elseif($day<="0" OR $day>"31" OR $month<="0" OR $month>"12" OR $year<"1900" OR $year>"2010") {
            return false;
        } elseif(($month=="2" && $day>"29") OR ($month=="4" && $day>"30") OR ($month=="6" && $day>"30") OR ($month=="9" && $day>"30") OR ($month=="11" && $day>"30")) {
            return false;
        } elseif($month=="2" && $day>"28" && $schaltjahr!="0") {
            return false;
        } else {            
            return mktime(0,0,1,$month,$day,$year);
        }           
    }
    public function check_gender($input) {
        if($input=="1") {
            return "1";
        } elseif($input=="2") {
            return "2";
        } else {
            return false;
        }        
    }
    public function check_status($input) {
        if($input=="1"){return "1";}
        elseif($input=="2"){return "2";}
        elseif($input=="3"){return "3";}
        elseif($input=="4"){return "4";}
        else {return false;}
    }
    public function check_status_with($input) {
        database::connect_with_db();
        $query=mysql_query("SELECT `user_name` FROM `global`.`users` WHERE `global`.`users`.`user_email` = '$input'");    
        $checkit = mysql_fetch_row($query);
        if($checkit) {
            list($user_name) = $checkit;
            return $user_name;
        } else {
            return false;
        }
    }
    public function check_lookingfor($input) {
        if($input=="1"){return "1";}
        elseif($input=="2"){return "2";}
        elseif($input=="3"){return "3";}
        else {return false;}    
    }
    public function check_language($input) {
        if($input=="1"){return "1";}
        elseif($input=="2"){return "2";}
        else {return false;}    
    }
    public function check_phone($input) {
        $input = substr($input,0,30);
        $input = security::clear_input($input);
        for($a = 0; $a <= 47; $a++ ) {
                $banned_char = chr($a);
                $input = str_replace($banned_char,'',$input);
        }
        for($b = 58; $b <= 255; $b++ ) {
                $banned_char = chr($b);
                $input = str_replace($banned_char,'',$input);
        }
        return $input;    
    }
    public function check_mobilphone($input) {
        $input = substr($input,0,30);
        $input = security::clear_input($input);
        for($a = 0; $a <= 47; $a++ ) {
                $banned_char = chr($a);
                $input = str_replace($banned_char,'',$input);
        }
        for($b = 58; $b <= 255; $b++ ) {
                $banned_char = chr($b);
                $input = str_replace($banned_char,'',$input);
        }
        return $input;    
    }
    public function check_adress($input) {
        $input = substr($input,0,50);
        $input = str_replace('ß','ss',$input);
        $input = security::clear_input($input);
        return ($input!="")? $input : false;    
    }
    public function check_city($input) {
        $input = substr($input,0,50);
        $input = str_replace('ß','ss',$input);
        $input = security::clear_input($input);
        return ($input!="")? $input : false;    
    }
    public function check_citycode($input) {
        $input = substr($input,0,10);
        $input = security::clear_input($input);
        for($a = 0; $a <= 47; $a++ ) {
                $banned_char = chr($a);
                $input = str_replace($banned_char,'',$input);
        }
        for($b = 58; $b <= 255; $b++ ) {
                $banned_char = chr($b);
                $input = str_replace($banned_char,'',$input);               
        }
        return ($input!="")? $input : false;    
    }
    public function check_country($input) {
        $input = substr($input,0,50);
        $input = security::clear_input($input);
        return ($input!="")? $input : false;    
    }
    public function check_picture($input) {
        $stored_file = "../../_temp/".md5($input)."_200.jpg";
        $picture_file = "_temp/".md5($input)."_200.jpg";
        if(file_exists($stored_file)) {
            return $picture_file;
        } else {
            return false;
        }            
    }
    public function check_options($input) {
        if($input=="1"){return "1";}
        elseif($input=="2"){return "2";}
        elseif($input=="3"){return "3";}
        else {return false;}    
    }
}




?>