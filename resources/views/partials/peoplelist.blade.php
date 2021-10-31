<div class="people-list" id="people-list">
    <ul class="list">
        <li>
            <h5>{{ __("Recent messages") }}</h5>
        </li>
        @foreach($threads as $inbox)
            @if(!is_null($inbox->thread))
                <li class="clearfix @if($inbox->withUser->id == Request::route('id')) active @endif">
                    <a href="{{route('message.read', ['id'=>$inbox->withUser->id])}}">
                        @php $user = $inbox->withUser; @endphp
                        @if(isset($user))
                            <div class="avatar-small">
                                @include('category.components.company-avatar')
                            </div>
                        @endif

                        <div class="about">
                            <p class = "date">{{date_format($inbox->thread->updated_at, "yy-m-d")}}</p>
                            <p class="info">{{$inbox->withUser->info->company_name}}</p>
                        </div>
                        <div class="circle"></div>
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
</div>
