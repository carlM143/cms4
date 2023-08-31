@extends('theme.main')

@section('pagecss')
@endsection

@php
    $contents = $page->contents;

    $featuredArticles = Article::where('is_featured', 1)->where('status', 'Published')->take(12)->get();
    $featuredArticlesHTML = '';

    if ($featuredArticles->count()) {

        foreach ($featuredArticles->chunk(2) as $index => $article) {
            
            $featuredArticlesHTML .= '';
                foreach($article as $a){

                    $imageUrl = (empty($a->thumbnail_url)) ? asset('theme/images/misc/no-image.jpg') : $a->thumbnail_url;

                    $featuredArticlesHTML .= '
                    <div class="entry col-md-4 col-sm-6 col-12">
                        <div class="grid-inner">
                            <div class="entry-image">
                                <div class="fslider" data-arrows="false" data-lightbox="gallery">
                                    <div class="flexslider">
                                        <div class="slider-wrap">
                                            <div class="slide"><a href="'. $imageUrl .'" data-lightbox="gallery-item"><img src="'. $imageUrl .'" alt="'. $a->name .'"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="entry-title">
                                <h2><a href="'.$a->get_url().'">'. $a->name .'</a></h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="icon-calendar3"></i> '. $a->date_posted() .'</li>
                                </ul>
                            </div>
                            <div class="entry-content">
                                <p>'. $a->teaser .'</p>
                                <a href="'.$a->get_url().'" class="btn btn-outline-info btn-sm">Learn More <i class="icon-line-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>';
                }
        }
    }



    $calendarImg = asset('theme/images/calendar-bg.png');
    $calendar = '
    <div class="container topmargin-lg bottommargin-lg">
        <div class="heading-block center">
            <h2>Calendar <span>of Activities</span></h2>
        </div>
        
        <div class="parallax bottommargin-lg dark" style="padding: 60px 0; background-image: url('.$calendarImg.'); height: auto;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -500px;">

            <div class="container clearfix">

                <div class="events-calendar">
                    <div class="events-calendar-header clearfix">
                        <h2>Events Overview</h2>
                        <h3 class="calendar-month-year">
                            <span id="calendar-month" class="calendar-month"></span>
                            <span id="calendar-year" class="calendar-year"></span>
                            <nav>
                                <span id="calendar-prev" class="calendar-prev"><i class="icon-chevron-left"></i></span>
                                <span id="calendar-next" class="calendar-next"><i class="icon-chevron-right"></i></span>
                                <span id="calendar-current" class="calendar-current" title="Got to current date"><i class="icon-reload"></i></span>
                            </nav>
                        </h3>
                    </div>
                    <div id="calendar" class="fc-calendar-container"></div>
                </div>
            </div>
        </div>
    </div>';


    $keywords   = ['{Featured Articles}', '{Calendar Activities}'];
    $variables  = [$featuredArticlesHTML, $calendar];

    $contents = str_replace($keywords,$variables,$contents);


@endphp

@section('content')
    {!! $contents !!}
@endsection

@section('pagejs')
    <script>
        var cal = $( '#calendar' ).calendario( {
                onDayClick : function( $el, $contentEl, dateProperties ) {

                    for( var key in dateProperties ) {
                        console.log( key + ' = ' + dateProperties[ key ] );
                    }

                },
                caldata : canvasEvents
            } ),
            $month = $( '#calendar-month' ).html( cal.getMonthName() ),
            $year = $( '#calendar-year' ).html( cal.getYear() );

        $( '#calendar-next' ).on( 'click', function() {
            cal.gotoNextMonth( updateMonthYear );
        } );
        $( '#calendar-prev' ).on( 'click', function() {
            cal.gotoPreviousMonth( updateMonthYear );
        } );
        $( '#calendar-current' ).on( 'click', function() {
            cal.gotoNow( updateMonthYear );
        } );

        function updateMonthYear() {
            $month.html( cal.getMonthName() );
            $year.html( cal.getYear() );
        };

    </script>
@endsection