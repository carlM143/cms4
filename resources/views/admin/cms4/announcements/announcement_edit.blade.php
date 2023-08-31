@extends('admin.layouts.app')

@section('pagetitle')
    Create News
@endsection

@section('pagecss')
    <link href="{{ asset('lib/bselect/dist/css/bootstrap-select.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('lib/ckeditor/ckeditor.js') }}"></script> --}}

    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet"
        />
    {{-- <link rel="stylesheet" href="{{ asset('lib/grapesjs/toastr.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('lib/custom-grapesjs/grapesjs/dist/css/grapes.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('lib/custom-grapesjs/assets/css/bamburgh.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('lib/custom-grapesjs/assets/css/custom-grapesjs.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/custom-grapesjs/linearicon/css/linearicons.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapick.min.css') }}" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapesjs-preset-webpage.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tooltip.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/grapesjs-plugin-filestack.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tui-color-picker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/grapesjs/tui-image-editor.min.css') }}" />
@endsection

@section('content')

<div class="container pd-x-0">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('dashboard')}}">CMS</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{route('announcements.index')}}">Announcement</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Announcement</li>
                </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">Edit Announcement</h4>
        </div>
    </div>
    <form method="post" action="{{ route('announcements.update', $announcement->id) }}" enctype="multipart/form-data">
        <div class="row row-sm">
            <div class="col-lg-6">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="d-block">Title *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="<?php echo $announcement->name ?>" required maxlength="150">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small id="news_slug"></small>
                </div>
                {{-- <div class="form-group">
                    <label class="d-block">Expiry Date *</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                    name="expiry_date" required id="expiry_date" value="{{ old('expiry_date',date('Y-m-d', strtotime('+3 months'))) }}">
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}
                <div class="form-group">
                    <label class="d-block">Message *</label>
                    <textarea class="form-control @error('msg') is-invalid @enderror" name="msg" rows="4" required @htmlValidationMessage({{__('standard.empty_all_field')}})><?php echo $announcement->msg ?></textarea>
                    @error('msg')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="d-block">Page Visibility</label>
                    <div class="custom-control custom-switch @error('visibility') is-invalid @enderror">
                        <input type="checkbox" class="custom-control-input" name="visibility" {{ (old("visibility") ? "checked":"") }} id="customSwitch1">
                        <label class="custom-control-label" id="label_visibility" for="customSwitch1">@if (old("visibility")) Published @else Private @endif</label>
                    </div>
                    @error('visibility')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
         

  

            <div class="col-lg-12 mg-t-30">
                <button class="btn btn-primary btn-sm btn-uppercase" type="submit">Save Announcement</button>
                <a href="{{ route('announcements.index') }}" class="btn btn-outline-secondary btn-sm btn-uppercase">Cancel</a>
            </div>
        </div>
</div>
@endsection

@section('pagejs')
    <script>
        // jQuery Typing
        (function(f){function l(g,h){function d(a){if(!e){e=true;c.start&&c.start(a,b)}}function i(a,j){if(e){clearTimeout(k);k=setTimeout(function(){e=false;c.stop&&c.stop(a,b)},j>=0?j:c.delay)}}var c=f.extend({start:null,stop:null,delay:400},h),b=f(g),e=false,k;b.keypress(d);b.keydown(function(a){if(a.keyCode===8||a.keyCode===46)d(a)});b.keyup(i);b.blur(function(a){i(a,0)})}f.fn.typing=function(g){return this.each(function(h,d){l(d,g)})}})(jQuery);

        $(document).ready( function($){

            $('#icons-filter').typing({
                stop: function (event, $elem) {
                    var filterValue = $elem.val(),
                        count = 0;

                    if( $elem.val() ) {

                        $(".icons-list li").each(function(){
                            if ($(this).text().search(new RegExp(filterValue, "i")) < 0) {
                                $(this).fadeOut();
                            } else {
                                $(this).show();
                                count++
                            }
                        });
                    } else {
                        $(".icons-list li").show();
                    }

                    count = 0;
                },
                delay: 500
            });

        });
    </script>
    <script>
        let jsPage = "";
        let jsHtml = "";
        let jsStyle = "";
        $("#customSwitch1").change(function() {
            if(this.checked) {
                $('#label_visibility').html('Published');
            }
            else{
                $('#label_visibility').html('Private');
            }
        });
    </script>
    <script src="{{ asset('lib/custom-grapesjs/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('lib/bselect/dist/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('lib/bselect/dist/js/i18n/defaults-en_US.js') }}"></script>
    <script src="{{ asset('lib/owl.carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/file-upload-validation.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button-2.js') }}"></script>

    <script src="{{ asset('lib/custom-grapesjs/grapesjs/dist/grapes.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-blocks-basic.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-pkurg-bootstrap4-plugin.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-lory-slider.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-touch.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-parser-postcss.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-tooltip.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-tui-image-editor.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-typed.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-style-bg.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/tui-code-snippet.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/tui-color-picker.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-plugin-ckeditor.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-plugin-export.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-blocks-bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/b4bulder-custom-blocks.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-preset-webpage.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-plugin-animation.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/grapesjs-plugins/grapesjs-swiper-slider.min.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/assets/js/custom-grapesjs.js') }}"></script>
    <script src="{{ asset('lib/custom-grapesjs/assets/js/bamburgh.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js"></script>
@endsection

