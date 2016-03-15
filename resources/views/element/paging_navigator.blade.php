<div class="dataTables_info">
	<?php
		echo $this->Paginator->counter(
			'Showing {{start}} to {{end}} of {{count}} entries'
		);									
	?>
</div>
<div class="dataTables_paginate paging_simple_numbers">
	<ul class="pagination pagination-sm">
		<?php
			// $this->Paginator->templates([
				// 'nextActive' => '<a class="paginate_button next" href="{{url}}">{{text}}</a>',
				// 'nextDisabled' => '<a class="paginate_button next disabled"><span>{{text}}</span></a>',
				// 'prevActive' => '<a class="paginate_button previous" href="{{url}}">{{text}}</a>',
				// 'prevDisabled' => '<a class="paginate_button previous disabled"><span>{{text}}</span></a>',
				// 'number' => '<a class="paginate_button" href="{{url}}">{{text}}</a>',
				// 'current' => '<a class="paginate_button current">{{text}}</a>',
				// 'first' => '<a class="paginate_button next" href="{{url}}">{{text}}</a>',
				// 'last' => '<a class="paginate_button previous" href="{{url}}">{{text}}</a>',
			// ]);
			echo $this->Paginator->first('First');
			echo $this->Paginator->prev('&laquo;', ["escape" => false]);
			echo $this->Paginator->numbers(['modulus' => 8]);
			echo $this->Paginator->next('&raquo;', ["escape" => false]);
			echo $this->Paginator->last('Last');
		?>
	</ul>
</div>