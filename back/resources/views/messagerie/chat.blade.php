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
                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Hi</p>
                                <p>How are you ...???</p>
                                <p>What are you doing tomorrow?<br> Can we come up a bar?</p>
                                <p class="meta"><time datetime="2018">23:58</time></p>
                            </div>
                        </div>
                        <div class="media media-meta-day">Today</div>
                        <div class="media media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Hiii, I'm good.</p>
                                <p>How are you doing?</p>
                                <p>Long time no see! Tomorrow office. will be free on sunday.</p>
                                <p class="meta"><time datetime="2018">00:06</time></p>
                            </div>
                        </div>
                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Okay</p>
                                <p>We will go on sunday? </p>
                                <p class="meta"><time datetime="2018">00:07</time></p>
                            </div>
                        </div>
                        <div class="media media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>That's awesome!</p>
                                <p>I will meet you Sandon Square sharp at 10 AM</p>
                                <p>Is that okay?</p>
                                <p class="meta"><time datetime="2018">00:09</time></p>
                            </div>
                        </div>
                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Okay i will meet you on Sandon Square </p>
                                <p class="meta"><time datetime="2018">00:10</time></p>
                            </div>
                        </div>
                        <div class="media media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Do you have pictures of Matley Marriage?</p>
                                <p class="meta"><time datetime="2018">00:10</time></p>
                            </div>
                        </div>
                        <div class="media media-chat"> <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                            <div class="media-body">
                                <p>Sorry I don't have. i changed my phone.</p>
                                <p class="meta"><time datetime="2018">00:12</time></p>
                            </div>
                        </div>
                        <div class="media media-chat media-chat-reverse">
                            <div class="media-body">
                                <p>Okay then see you on sunday!!</p>
                                <p class="meta"><time datetime="2018">00:12</time></p>
                            </div>
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                        </div>
                    </div>
                    <div class="publisher bt-1 border-light bg-gray"> <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> <input class="publisher-input" type="text" placeholder="Write something"> <span class="publisher-btn file-group"> <i class="fa fa-paperclip file-browser"></i> <input type="file"> </span> <a class="publisher-btn" href="#" data-abc="true"><i class="fa fa-smile"></i></a> <a class="publisher-btn text-info" href="#" data-abc="true"><i class="fa fa-paper-plane"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop