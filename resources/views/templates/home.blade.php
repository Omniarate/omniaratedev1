@extends('app')

@section('content')
    <div class="container">

        <div id="freewall" class="free-wall">

          @foreach($all_images as $image)

            @if($image->types_id == 1)
                    <div class="brick brick-small">

                        <div class='cover'>
                            <div class='info'>
                                <h2>#{{$image->title}}<a href="../profile/{{$image->user->id}}">
                                        <span class='author'>by {{$image->user->name}}</span>
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <img src="{{'/images/' . $image->filePath}}" />
                    </div>

        @endif
        @if($image->types_id == 2)
            <div class="brick brick-medium">
                <div class='cover'>
                    <div class='info'>
                        <h2>#{{$image->title}}<a href="../profile/{{$image->user->id}}">
                                <span class='author'>by  {{$image->user->name}} </span>
                            </a>
                        </h2>
                    </div>
                </div>
                <img src="{{'/images/' . $image->filePath}}" />
            </div>

    @endif

    @if($image->types_id == 3)
        <div class="brick brick-large">
            <div class='cover'>
                <div class='info'>
                    <h2>#{{$image->title}}<a href="../profile/{{$image->user->id}}">
                            <span class='author'>by {{$image->user->name}} </span></a>
                   </h2>
                </div>
            </div>
            <img src="{{'/images/' . $image->filePath}}" />
        </div>

    @endif
    @endforeach
    </div>
        </div>
    <script type="text/javascript">
        $(function() {
            var wall = new freewall("#freewall");
            wall.reset({
                selector: '.brick',
                animate: true,
                cellW: 200,
                cellH: 200,
                delay: 30,
                onResize: function() {
                    wall.refresh($(window).width() - 0, $(window).height() - $("div.container > header").height()-30);
                }
            });
            // caculator width and height for IE7;
            wall.fitZone($(window).width() - 0 , $(window).height() - $("div.container > header").height()-30);
        });
        $('div.rate').raty();
    </script>

@endsection


