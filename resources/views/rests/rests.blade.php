@if ($rests)
    <div class="row">
        @foreach ($rests as $rest)
            <div class="rest">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $rest->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            <p class="rest-name"><a href="#">{{ $rest->name }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif