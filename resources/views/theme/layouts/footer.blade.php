@php
	$footer = \App\Models\Page::where('slug', 'footer')->first();
@endphp


{!! $footer->contents !!}
