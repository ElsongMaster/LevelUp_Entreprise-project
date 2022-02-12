@extends('adminlte::page')



@section('content')

<h1 class="text-center">Bienvenue sur le chat Admin</h1>
<div class="page-content page-container " id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-md-6">
                <div class="cardChat cardChat-bordered bg-gray">
                    <div class="cardChat-header">
                        <h4 class="cardChat-title"><strong>Chat</strong></h4> <a class="btn btn-xs btn-secondary" href="#" data-abc="true">Let's Chat App</a>
                    </div>
                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                        <div class="media media-meta-day">Today</div>
                        @if ($sessionMessage  )
                            
                            @foreach ( $sessionMessage->messages()->get() as $message  )
    
                            @if ($message->user->id ==1)
                                    
                            <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
        
                                <div class="media-body">
                                    <p>{{$message->contenu}}</p>
        
                                    <p class="meta"><time datetime="2018">{{\Carbon\Carbon::now()->toTimeString()}}</time></p>
                                </div>
                            </div>
                            @else
                                    
                            <div class="media media-chat media-chat-reverse">
                                <div class="media-body">
                                    <p>{{$message->contenu}}</p>
    
                                    <p class="meta"><time datetime="2018">{{\Carbon\Carbon::now()->toTimeString()}}</time></p>
                                </div>
                            </div>
                            @endif
                            @endforeach
    
                        @endif

                    </div>
                    <form action="{{route('messages.store')}}" method="post" class="publisher bt-1 border-light bg-gray">@csrf <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> <input class="publisher-input" type="text" placeholder="Write something" name="contenu"> <span class="publisher-btn file-group"> <i class="fa fa-paperclip file-browser"></i> <input type="file"> </span> <a class="publisher-btn" href="#" data-abc="true"><i class="fa fa-smile"></i></a> <button type="submit" class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></button> </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop