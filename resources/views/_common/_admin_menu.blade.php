@if (count($catalogs) > 0 )
    @foreach ($catalogs as $catalog)
        @if ($catalog->parent == 0)
            @include('partials.admin_catalog', $catalog)
        @endif
    @endforeach
@else
    
@endif