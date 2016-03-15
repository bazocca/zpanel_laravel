<?php
	if ($active == 1){
		/*active*/
		echo "<span class='label label-success label-form'>Active</span>";
	} else
	if ($active == 2){
		/*deactive*/
		echo "<span class='label label-warning label-form'>Deactive</span>";
	} else
	if ($active == 3){
		/*published*/
		echo "<span class='label label-success label-form'>Published</span>";
	}else
	if ($active == 4){
		/*draft*/
		echo "<span class='label label-warning label-form'>Draft</span>";
	} else 
	if ($active == 5){
		/*done*/
		echo "<span class='label label-success label-form'>Done</span>";
	} else
	if ($active == 6){
		/*pending*/
		echo "<span class='label label-warning label-form'>Pending</span>";
	} else
	if ($active == 7){
		/*void*/
		echo "<span class='label label-danger label-form'>Void</span>";
	} else
	if ($active == 8){
		/*not active*/
		echo "<span class='label label-warning label-form'>Not Active</span>";
	}	
	
?>