@if ($kshops) 
    <div class="row">
        @foreach ($kshops as $kshop)
            <div class="rest">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            @if (!is_object($kshop->image_url))
                            <img src="{{ $kshop->image_url }}" alt="">
                            @else
                            <em>no image</em>
                            @endif
                        </div>
                        <div class="panel-body">
                            <p class="rest-name"><a href="#">{{ $kshop->name }}</a></p>
                            @if (!is_object($kshop->image_url))
                            <p class="rest-pr">{{ $kshop->pr }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif