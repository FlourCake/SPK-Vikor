<?php
	function normalisasi($a, $b){
		$c=array();
		for($i=0;$i<sizeof($b);$i++){
			array_push($c,array());
		}
		$temp=array();
		$fmax=array();
		$fmin=array();
		
		for($i=0;$i<sizeof($b[0]);$i++){
			for($j=0;$j<sizeof($b);$j++){
				array_push($temp,$b[$j][$i]);
			}
			array_push($fmax,max($temp));
			array_push($fmin,min($temp));
			$temp=array();
		}
		
		for($i=0; $i<sizeof($b);$i++){
			for($j=0; $j<sizeof($b[0]);$j++){
				if($a[0][$j]=="Benefit")
					array_push($c[$i],($fmax[$j]-$b[$i][$j])/($fmax[$j]-$fmin[$j]));
				else
					array_push($c[$i],($b[$i][$j]-$fmin[$j])/($fmax[$j]-$fmin[$j]));
			}
		}
		
		return $c;
	}
	
	function pembobotan($a, $b){
		for($i=0; $i<sizeof($b);$i++){
			for($j=0; $j<sizeof($b[0]);$j++)
				$b[$i][$j] = $b[$i][$j]*$a[1][$j];
		}
		return $b;
	}
	
	function utilityS($a){
		$b=array();
		$temp=0;
		for($i=0; $i<sizeof($a);$i++){
			for($j=0; $j<sizeof($a[0]);$j++)
				$temp=$temp+$a[$i][$j];
			array_push($b,$temp);
			$temp=0;
		}
		return $b;
	}
	
	function regretR($a){
		$b=array();
		for($i=0; $i<sizeof($a);$i++)
			array_push($b,max($a[$i]));
		return $b;
	}
	
	function plus($a){
		return max($a);
	}
	
	function minus($a){
		return min($a);
	}
	
	function dq($a){
		return 1/(sizeof($a)-1);
	}
	
	function perankinganQ($s, $r, $v){
		$q = array();
		$splus=plus($s);
		$sminus=minus($s);
		$rplus=plus($r);
		$rminus=minus($r);
		
		for($i=0; $i<sizeof($s);$i++){
			array_push($q, (($v*(($s[$i]-$sminus)/($splus-$sminus))) + ((1-$v)*(($r[$i]-$rminus)/($rplus-$rminus)))));
		}
		return $q;
	}
?>