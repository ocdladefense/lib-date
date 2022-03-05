<?php

namespace Ocdla;


class Date {





	public static function daysFromToday($date) {

		$today = new \DateTime();


		$intv = $date->diff($today);
		$years = $intv->y;
		$months = $intv->m;
		$days = $intv->d;
		// var_dump($intv); exit;

		return ($years * 365) + ($months * 30) + $days;
	}



	public static function getFriendlyDateDifference($message, $days, $params = array()) {

		// "past" => "expired",
		// "near" => "expires", "%s yesterday", "%s today", "%s tomorrow"
		// "future" => "expires in" but "will expire"

		$abs = abs($days);



		if($days < -1) {

			$text = sprintf("expired %s days ago.", $abs);
		} else if($days == -1) {
			$text = "expired yesterday.";
		} else if($days == 0) {
			$text = "expires today.";
		} else if($days == 1) {
			$text = "expires tomorrow.";
		} else if($days > 1) {
			$text = sprintf("expires in %s days.", $abs);
		}


		
		return sprintf($message, $text);
	}




	public function getStringMonth($numMonth){
		
		$numMonth = strlen($numMonth) == 1 ? "0$numMonth" : $numMonth;

		return $this->getMonths()[$numMonth];
	}




	public function getMonths(){

		return array(
			"" 	   => "All Months",
			"01"   => "January",
			"02"   => "February",
			"03"   => "March",
			"04"   => "April",
			"05"   => "May",
			"06"   => "June",
			"07"   => "July",
			"08"   => "August",
			"09"   => "September",
			"10"   => "October",
			"11"   => "November",
			"12"   => "December"
		);
	}


}