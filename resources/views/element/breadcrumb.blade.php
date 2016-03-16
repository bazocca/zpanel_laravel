	<ul class="breadcrumb">
		<a href="{{ URL::to('/zpanel/dashboard') }}" >Dashboard</a>
		<?php
			if (count($breadcrumb) > 0){
				for ($i = 0;$i < count($breadcrumb); $i++){
					echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
					/* LAST DATA */
					if ($i == count($breadcrumb) - 1){
						echo $breadcrumb[$i]["text"];
					} else {
						$controller = $breadcrumb[$i]["controller"];
						$action = $breadcrumb[$i]["action"];
		?>
						<a href="{{ url('', ['zpanel', $controller, $action]) }}"><?php echo $breadcrumb[$i]["text"] ?></a>
		<?php
					}
				}
			}
		?>
	</ul>

