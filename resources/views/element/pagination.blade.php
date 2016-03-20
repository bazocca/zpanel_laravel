<div class="dataTables_info">
	<?php
		$start = ($paginator->currentPage() - 1) * $paginator->perPage() + 1;
		$end = $start + $paginator->count()-1;
	?>
	Showing {{$start}} to {{$end}} of {{ $paginator->total() }} entries
</div>
<div class="dataTables_paginate paging_simple_numbers">
	<?php
		$link_limit = 8;
	?>
	@if ($paginator->lastPage() > 1)
		<ul class="pagination pagination-sm">
			<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
				<?php
					if ($paginator->currentPage() == 1){
				?>
					<span>First</span>
				<?php
					} else {
				?>
					<a href="{{ $paginator->url(1) }}">First</a>
				<?php
					}
				?>
			 </li>
			<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
				<?php
					if ($paginator->currentPage() == 1){
				?>
					<span>Previous</span>
				<?php
					} else {
				?>
					<a href="{{ $paginator->url(1) }}">Previous</a>
				<?php
					}
				?>
			</li>			 
			@for ($i = 1; $i <= $paginator->lastPage(); $i++)
				<?php
				$half_total_links = floor($link_limit / 2);
				$from = $paginator->currentPage() - $half_total_links;
				$to = $paginator->currentPage() + $half_total_links;
				if ($paginator->currentPage() < $half_total_links) {
				   $to += $half_total_links - $paginator->currentPage();
				}
				if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
					$from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
				}
				?>
				@if ($from < $i && $i < $to)
					<li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
						<?php
							if ($paginator->currentPage() == $i){
						?>
							<span>{{ $i }}</span>
						<?php
							} else {
						?>
							<a href="{{ $paginator->url($i) }}">{{ $i }}</a>
						<?php
							}
						?>
					</li>
				@endif
			@endfor
			<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
				<?php
					if ($paginator->currentPage() == $paginator->lastPage()){
				?>
					<span>Next</span>
				<?php
					} else {
				?>
					<a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
				<?php
					}
				?>
			</li>
			<li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
				<?php
					if ($paginator->currentPage() == $paginator->lastPage()){
				?>
					<span>Last</span>
				<?php
					} else {
				?>
					<a href="{{ $paginator->url($paginator->lastPage()) }}">Last</a>
				<?php
					}
				?>
			</li>
		</ul>
	@endif
</div>