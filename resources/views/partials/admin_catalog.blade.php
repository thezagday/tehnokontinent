@if (DB::table('catalogs')->where('parent',$catalog->id)->first()!= null)
    <li class="sidenav-item">
        <a href="#" aria-haspopup="true" aria-expanded="false">
            <span class="sidenav-icon icon icon-plus-square"></span>
            <span class="sidenav-label">{{$catalog->title}}</span>
        </a>
                
@else
    <li class="sidenav-item">
        <a href="read_products?parent={{$catalog->id}}">
            <span class="sidenav-icon icon icon-minus-square"></span>
            <span class="sidenav-label">{{$catalog->title}}</span>
        </a>
                
@endif
@if (count(App\Catalogs::find($catalog->id)->get_childrens) > 0)
            <ul class="sidenav-subnav collapse">
	    @foreach(App\Catalogs::find($catalog->id)->get_childrens as $catalog)
	        @include('partials.admin_catalog', $catalog)
	    @endforeach
	    </ul>
@endif
</li>
