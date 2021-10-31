<div class="container-how-it-works__video d-flex align-items-center justify-content-center">
    <img class="thumb-video" src="{{ asset("assets/images/$image") }}" />
    {{--  TODO: Hide this untill we have a video --}}
   {{--  <a 
        class="btn-video-player" 
        data-toggle="modal" 
        data-target="#videoModal">

        <div class="player-btn-background d-flex justify-content-center align-items-center">
            <div class="triangle-right"></div>
        </div>        
    </a> --}}

    <!-- Modal -->
    <div class="modal fade" id="videoModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __("How our Platform Works") }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div class="embed-responsive embed-responsive-16by9">
                    {{--  TODO: Disable iframe untill we havea video --}}
                        {{-- <iframe class="embed-responsive-item" src="{{ $videoURL }}" allowfullscreen></iframe> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>