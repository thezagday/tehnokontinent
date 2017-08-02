@if (count($catalogs) > 0 )
    <ul class="catalog-nav">
    <li><a href="catalogs" class="head-link">Каталог<span><b class="caret"></b></span></a></li>
    @foreach ($catalogs as $catalog)
        @if ($catalog->parent == 0)
            @include('partials.catalog', $catalog)
        @endif
    @endforeach
    <li><a href="accessories" class="head-link">Аксессуары<span><b class="caret"></b></span></a></li>
    </ul>
@endif