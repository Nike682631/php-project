@extends('layouts.new')
@section('content')
    <section class="content info-page">
        @if ($page->top_advertisement == true)
        @include("components.sections.top-advertisement")
        @endif
        <div class="container">
            <div class="row p-5">
                <div class="{{$page->sidebar == true ? 'col-sm-8' : ''}}">
                    <!-- <h1>{{ $page->title }}</h1>
                    {!! htmlspecialchars_decode($page->description) !!} -->
                    
                    @php
                        $content = json_decode($page->content);
                    @endphp
                    
                    @if(!empty($content))
                        @foreach($content as $block)
                        @includeIf('layouts.'.$block->layout, ['data' => $block->attributes])
                        @endforeach
                    @endif
                </div>
                @if ($page->sidebar == true)
                <div class="col-sm-4">
                    @include('partials.page-sidebar')
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection