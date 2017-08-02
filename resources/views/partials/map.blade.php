@if (DB::table('catalogs')->where('parent',$catalog->id)->first()!= null)
    <li><a href="#">{{ $catalog->title }}</a>
@else
    <li><a href="products?parent={{$catalog->id}}">{{ $catalog->title }}</a>
@endif
@if (count(App\Catalogs::find($catalog->id)->get_childrens) > 0)
	    <ul>
	    @foreach(App\Catalogs::find($catalog->id)->get_childrens as $catalog)
	        @include('partials.catalog', $catalog)
	    @endforeach
	    </ul>
@endif	
</li>