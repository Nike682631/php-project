<div class="d-flex div-cert">
    @php $ext = pathinfo($certificate->file, PATHINFO_EXTENSION); @endphp
    @if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif')
        <a href="javascript:showCertImg('{{ $certificate->file }}')" class="mr-3 mb-3" targe="_blank">
    @else
        <a href="{{ $certificate->file }}" class="mr-3 mb-3" targe="_blank">
    @endif
        <img class="card-row__img-certificate" src="{{ $certificate->thumbnail }}" />    
    </a>
    <a class="btn-delete-cert" data-toggle="modal" data-target="#certificateConfirmModal" href="#" data-id="{{$certificate->id}}" role="button">
        <div class="div-delete-cert align-items-center justify-content-center text-white">
            <span aria-hidden="true">&times;</span>
        </div>
    </a>
</div>

@push('footer_scripts')
    <script type="text/javascript">
        var lightboxModal = document.getElementById("lightboxModal");
        var modalImg = document.getElementById("id-img-lightbox");
        function showCertImg(url) {
            lightboxModal.style.display = "block";
            modalImg.src = url;
        } 
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("lightbox-close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            lightboxModal.style.display = "none";
        }
    </script>
@endpush