<div class="container-fluid">

    <div class="row banner" style="background-image: url('{{ $banner->img_path }}');">

        <div class="col-md-12">

            <div class="grey-block">

                <h2>{!!$banner->title!!}</h2>

                <h3 class="color-yellow">{!!$banner->body!!}</h3>

            </div>

            <a href="" class="banner-close">

                <img src="{{ URL::asset('images/icons/close.png') }}" alt="close">

            </a>

        </div>

    </div>

</div>



