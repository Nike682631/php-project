@extends('layouts.new')

@section('content')

    <section class="content section-create-product">
        <div class="container">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div class="text-white">{{ $error }}</div>
                            @endforeach
                    </div>
                @endif
            </div> 
            <form method="post" action="{{ route('products.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="create-product__left-side">
                            <p class="create-product__title mb-0 left">{{ __("Select Categories") }}</p>
                            <livewire:forms.category-tree />
                        </div>                    
                    </div>
                    <div class="col-sm-8">                                           
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="create-product__title mb-0">{{ __("Product details") }}</p>
                                </div>
                                <div class="col-12 form-group">
                                    <label class="create-product__label">{{ __("Product Image") }}</label>
                                    <div class="dropzone customized-dropzone" id="product-dropzone">                                    
                                        <div class="dz-message" data-dz-message>
                                            @include('components.icons.camera-grey')
                                            <span>Drop Your image here or click and upload manualy</span>
                                        </div>
                                    </div>
                                </div>             
                                <div class="col-12 form-group">
                                    <label class="create-product__label">{{ __("Product name") }}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_name" required />
                                </div>
                                <div class="col-6 form-group">
                                    <label class="create-product__label">{{ __("Price From (€)") }}<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_from" required />
                                </div>
                                <div class="col-6 form-group">
                                    <label class="create-product__label">{{ __("Price To (€)") }}<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="price_to" required />
                                </div>
                                <div class="col-6 form-group">
                                    <label class="create-product__label">{{ __("Unit") }}<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="unit" required />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label class="create-product__label">{{ __("Product Description") }}</label>
                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                                
                                <div class="col-12 mt-3">
                                    <input type="submit" class="btn btn-primary float-right btn-customized" value="{{ __("Create product") }}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('footer_scripts')
        <script type="text/javascript">
            Dropzone.autoDiscover = false;
            var uploadedImages = {}

            var productDropzone = new Dropzone("#product-dropzone",{
                url: "/media/store",
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    $('#product-dropzone').append('<input type="hidden" name="images[]" value="' + response.name + '" />')
                    uploadedImages[file.name] = response.name
                },
                error: function (file, response) {
                    return false;
                },
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedImages[file.name]
                    }
                    $('#product-dropzone').find('input[name="images[]"][value="' + name + '"]').remove()
                },
            } )


        </script>
    @endpush


@endsection