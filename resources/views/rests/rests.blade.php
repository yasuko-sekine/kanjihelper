@if ($rests)
    <div class="row">
        @foreach ($rests as $rest)
            <div class="rest">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            @if (!is_object($rest->image_url))
                            <img src="{{ $rest->image_url }}" alt="">
                            @else
                            <em>no image</em>
                            @endif
                        </div>
                        <div class="panel-body">
                            <p class="rest-name"><a href="#">{{ $rest->name }}</a></p>
                            @if (!is_object($rest->image_url))
                            <p class="rest-pr">{{ $rest->pr }}</p>
                            @endif
                            <!--<p class="rest-budget">{{ $rest->budget }}</p>-->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif