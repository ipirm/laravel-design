@extends('layouts.app')
@section('pageTitle',  $project->name)
@section('content')
    <body class="page-project">
    <div class="project">
        <div class="project-nav">
            <div class="project-nav__row">
                <div class="project-nav__col">
                    @if($project->id === 1)
                        <a href="/" class="project-nav__arrow project-nav__prev"></a>
                    @else
                        <a href="/project/{{$project->id - 1}}" class="project-nav__arrow project-nav__prev"></a>
                    @endif
                </div>
                <div class="project-nav__col">
                    <a href="/" class="project-nav__close">ЗАКРЫТЬ</a>
                </div>
                <div class="project-nav__col">
                    @if(count($projects) === $project->id)
                        <a href="/project/{{$project->id}}" class="project-nav__arrow project-nav__next"></a>
                    @else
                        <a href="/project/{{$project->id +1}}" class="project-nav__arrow project-nav__next"></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="project-slider swiper-container">
            <div class="project-slider__wrapper swiper-wrapper">
                @foreach(json_decode($project->project_images) as $item)
                    <div class="project-slider__item swiper-slide">
                        <div class="swiper-zoom-container">
                            <img class="image1" src="{{$item->url}}">
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Scroll Bar -->
            <div class="project-scrollbar swiper-scrollbar"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="/swiper/swiper.min.js"></script>
    <script>
        $(function () {

            $(".project-slider__item").each(function () {
                var width = $(window).width();
                item = $(this),
                    img = $(this).find("img"),
                    /*img_width = $(this).find("img").width();*/
                    img_width = window.document.querySelector('.image1').naturalWidth;

                if (img_width > width) {
                    var swiper = new Swiper('.project-slider', {
                        init: false,
                        direction: 'vertical',
                        slidesPerView: 'auto',
                        freeMode: true,
                        watchOverflow: true,
                        scrollbar: {
                            el: '.project-scrollbar',
                            hide: true,
                        },
                        mousewheel: {
                            releaseOnEdges: true,
                            sensitivity: 0.4,
                        },
                        zoom: {
                            maxRatio: 1.5,
                            toggle: false,
                        },
                    });
                    swiper.on('click', function () {
                        if (item.hasClass("swiper-slide-zoomed")) {
                            swiper.zoom.out();
                        } else {
                            swiper.zoom.in();
                        }
                    });
                    swiper.init();
                } else {
                    var swiper = new Swiper('.project-slider', {
                        direction: 'vertical',
                        slidesPerView: 'auto',
                        freeMode: true,
                        watchOverflow: true,
                        scrollbar: {
                            el: '.project-scrollbar',
                            hide: true,
                        },
                        mousewheel: {
                            releaseOnEdges: true,
                            sensitivity: 0.4,
                        },

                    });
                }
            });

        });

    </script>
    </body>
@endsection
