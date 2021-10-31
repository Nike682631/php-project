@extends('layouts.main')

@section('content')
    <link rel="stylesheet" href="{{asset('chat/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @include("components.sections.page-header", ["pageTitle" => "Messages"])
    <div class="container">

        <div class="chat mb-3 mt-5">
            <div class="row">
                <div class="chat__people-list">
                    @include('partials.peoplelist')
                </div>

                <div class="chat__messages">
                    <div class="chat-header clearfix">
                        <div class="avatar">
                            @if(isset($user))
                                @include('category.components.company-avatar')
                            @endif
                            <div class="chat-about">
                                @if(isset($user))
                                    <div class="chat-with">{{'Send a message to ' . @$recipient->info->company_name}}</div>
                                @else
                                    <div class="chat-with">{{ __("Select a company to start a chat") }}</div>
                                @endif
                            </div>
                        </div>

                        <i class="far fa-heart"></i>
                    </div> <!-- end chat-header -->

                    <div class="chat-history" id="chat-history-container">
                        <ul id="talkMessages">

                            @foreach($messages as $message)
                                @if($message->sender->id == auth()->user()->id)
                                    <li class="clearfix" id="message-{{$message->id}}">
                                        <div class="message-data align-right">
                                            <span class="message-data-time">{{$message->humans_time}} ago</span> &nbsp;
                                            &nbsp;
                                            <span class="message-data-name">{{$message->sender->name}}</span>
                                            <a href="#" class="talkDeleteMessage" data-message-id="{{$message->id}}"
                                               title="Delete Message"><i class="fa fa-close"></i></a>
                                        </div>
                                        <div class="message other-message float-right">
                                            {{$message->message}}
                                        </div>
                                    </li>
                                @else

                                    <li id="message-{{$message->id}}">
                                        <div class="message-data">
                            <span class="message-data-name"> <a href="#" class="talkDeleteMessage"
                                                                data-message-id="{{$message->id}}"
                                                                title="Delete Messag"><i class="fa fa-close"
                                                                                         style="margin-right: 3px;"></i></a>{{$message->sender->name}}</span>
                                            <span class="message-data-time">{{$message->humans_time}} ago</span>
                                        </div>
                                        <div class="message my-message">
                                            {{$message->toHtmlString()}}
                                        </div>
                                    </li>
                                @endif
                            @endforeach


                        </ul>

                    </div> <!-- end chat-history -->
                    <div class="chat-message clearfix">
                        <form action="" method="post" id="talkSendMessage">
                            <textarea name="message-data" id="message-data" placeholder="Your message"
                                      rows="3"></textarea>
                            <input type="hidden" name="_id" value="{{@request()->route('id')}}">
                            <button class="btn btn-primary" type="submit"> {{ __('Send Message') }}</button>
                        </form>

                    </div> <!-- end chat-message -->
                </div>
                <div class="chat__company-info">
                    <p class="company-info-header">{{ __('COMPANY INFO') }}</p>
                    <p class="label">{{ __('COMPANY') }}</p>
                    <p class="value">{{ $user->info->company_name}}
                    <p class="label">{{ __('CONTACTS') }}</p>
                    <p class="value">{{ $user->email }}
                        <br />
                        {{ $user->info->person_phone }} </p>
                    <p class="label">{{ __('ADDRESS') }}</p>
                    <p class="value">{{ $user->info->address }}
                    @isset($user->info->employees_number)
                        <p class="label">{{ __('EMPLOYEES') }}</p>
                        <p class="value">{{ $user->info->employees_number }}</p>
                    @endisset
                    <a href="{{ route('user.show', [$user->id]) }}" class="btn btn-block">
                        {{ __("View company profile") }}
                    </a>
                </div>
            </div>


        </div>
    </div>

@endsection


@section('custom_scripts')




    <script>
        var objDiv = document.getElementById("chat-history-container");
        objDiv.scrollTop = objDiv.scrollHeight;
        var __baseUrl = "{{url('/')}}"
    </script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>



    <script src="{{asset('chat/js/talk.js')}}"></script>

    <script>
        var show = function (data) {
            alert(data.sender.name + " - '" + data.message + "'");
        }

        var msgshow = function (data) {
            location.reload();
        }

    </script>
    {!! talk_live(['user'=>["id"=>auth()->user()->id, 'callback'=>['msgshow']]]) !!}
@endsection