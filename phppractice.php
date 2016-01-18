<?php
	
	$counter = 0;
	function myPrintFunction($value, $key){
		print "The key $key has the value $value<br>";
	}

	function randomize($value, $key, $keys){
		print "The key" . $keys[$counter] . " has the value $value<br>";
		$counter ++;
		
	}


	$DC_CLASS = [];
	$DC_CLASS['front_middle']='Peter';
	$DC_CLASS['front_right']='Griffin';
	$DC_CLASS['second_left']='Chance';
	$DC_CLASS['second_middle']='Stephen';
	$DC_CLASS['second_right']='Stuart';
	$DC_CLASS['third_left']='Will';
	$DC_CLASS['third_middle']='Oliver';
	$DC_CLASS['third_right']='Andrew';
	$DC_CLASS['fourth_middle']='Yohsuke';
	$DC_CLASS['fourth_right']='Freddy';
	array_walk($DC_CLASS, 'myPrintFunction');
	$shuffled_array = array();
	$keys = array_keys($DC_CLASS);
	shuffle($DC_CLASS);
	array_walk($DC_CLASS, 'randomize', $keys);


	// $students = new stdClass;
	// $students => first = "Stephen";
	// $students => last = "Tiedemann";
	// $students => location = "second_middle";

	// $studentsArray => array();



?>

