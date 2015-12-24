@extends('app')


@section('content')

   {{ $user-> name }}


   @if($user -> id == Auth::User()->id)
       <h1 class="well well-lg">Upload Image</h1>
       <div class="container col-md-4">
           @if(isset($success))
               <div class="alert alert-success"> {{$success}} </div>
           @endif
           {!! Form::open(['action'=>'PagesController@store', 'files'=>true]) !!}

           <div class="form-group">
               {!! Form::label('title', 'Title:') !!}
               {!! Form::text('title', null, ['class'=>'form-control']) !!}
           </div>

           <div class="form-group">
               {!! Form::label('description', 'Description:') !!}
               {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>10] ) !!}
           </div>

           <div class="form-group">
               {!! Form::label('image', 'Choose an image') !!}
               {!! Form::file('image') !!}
           </div>
               <div class="form-group">
                   {!! Form::select('category', $categories, null, ['class' => 'input-sm']) !!}
               </div>
               <div class="form-group">
                   {!! Form::select('type',$types,null, ['class' => 'input-sm']) !!}
               </div>

           <div class="form-group">
               {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
           </div>
           {!! Form::close() !!}


           <div class="alert-warning">
               @foreach( $errors->all() as $error )
                   <br> {{ $error }}
               @endforeach
           </div>
       </div>
   @endif
   <section class="col-md-12">
       <h1 class="well well-lg">All Image List</h1>

           @foreach( $images as $image )
            <?php   $comments = $image->comments;?>


               <img src="{{ '/images/'.$image->filePath }}"/>

                {!! Form::open(array('method'=>'POST','class'=> 'comment','url' => '/' )) !!}
                   {!! Form::label('comment', 'Comment:') !!}
                   {!! Form::text('cont', null, ['class'=>'content-form']) !!}
                   {!! Form::hidden('pid', $image->id) !!}
                   {!! Form::hidden('uid', Auth::User()->id) !!}

                @foreach($comments as $comm)

               <span>
               {{$comm->user->name}}:{{$comm->content}}
               </span>
                    <br>

               @endforeach
                <span class="comment-show"></span>

               <div class="form-group">
                   {!! Form::submit('Comment', array( 'class'=>'btn btn-danger form-control' )) !!}
               </div>
               {!! Form::close() !!}
           @endforeach

   </section>


    <script>
        $(function(){

            $('.comment').on('submit',function(e){
                $.ajaxSetup({
                    header:$('meta[name="_token"]').attr('content')
                })
                e.preventDefault(e);

                $.ajax({

                    type:"POST",
                    url:'/',
                    data:$(this).serialize(),
                    dataType: 'json',
                    success: function(data){
                        $( ".comment-show" ).append(data.success + "<br>");
                    },
                    error: function(data){

                    }
                })

            });
        });


    </script>

@endsection