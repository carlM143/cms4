@extends('theme.main')



@section('content')


<div class="container topmargin-lg bottommargin-lg">
    <div class="row">
        <div class="row feature-box-border-vertical border-hover-animate col-mb-50 justify-content-center align-items-center my-5">
            <div class="col-md-6 feature-box fbox-dark">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>1</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Visiting the Campus</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                    <a href="#" class="button button-small button-dark button-rounded border-width-1 ms-0 mt-3">Get Started <i class="icon-angle-right me-0"></i></a>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>2</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Submitting the Application</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>3</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Scheduling a Visit and Interview</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>4</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Submitting Official Transcripts, Recommendations, and School Reports</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect noborder">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>5</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Completing Required Testing</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="col-md-6 feature-box fbox-border fbox-light fbox-effect noborder">
                <div class="fbox-icon bg-white">
                    <a href="#"><i>6</i></a>
                </div>
                <div class="fbox-content">
                    <h3 class="nott text-larger mb-2">Acceptance</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('pagejs')
    <script>
        $('#frm_search').on('submit', function(e) {
            e.preventDefault();
            window.location.href = "{{route('news.front.index')}}?type=searchbox&criteria="+$('#searchtxt').val();
        });
    </script>
@endsection
