<?php
	$icon_direction = "";
	if ($sort == $column){
		if ($direction == "asc"){
			$direction = "desc";
		} else {
			$direction = "asc";
		}
		$icon_direction = $direction;
	} else {
		$direction = "asc";
	}
?>
{!! link_to_route($route, $name, [
	'sort' => $column,
	'direction' => $direction,
	'search' => $search
	],[
	'class' => $icon_direction
	]
) !!}