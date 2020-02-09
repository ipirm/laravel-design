@extends('layouts.app')
@section('pageTitle','Главная')
@section('content')
    <body class="home">
    <a class="js-bg">
    </a>
    <nav class="nav hide">
        <div class="nav-container">
            <div class="wrapper">
                <div class="top_info">
                    <div class="nav-item">
                        <p class="nav-item_name" id="contact-1">{{$setting->telegram}}</p>
                        <div class="nav-item_social">Telegram</div>
                    </div>
                    <div class="nav-item">
                        <p class="nav-item_name" id="contact-2">{{$setting->jabber}}</p>
                        <div class="nav-item_social">Jabber</div>
                    </div>
                    <div class="nav-item">
                        <p class="nav-item_name" id="contact-3">{{$setting->vip_pole}}</p>
                        <div class="nav-item_social">VIPole</div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="top_block">
            <div class="wrapper">
                <div class="btn-contact">Контакты</div>
                <section class="text">
                    <div class="text-title">{{$setting->title}}</div>
                    <div class="text-description">{!! $setting->text !!}</div>
                </section>
            </div>
        </div>
        <div class="wrapper bottom_content">
            <section class="card">
                <div class="card-row">
                    @foreach($projects as $item)
                        <div class="card-col">
                            <a class="card-item" href="/project/{{$item->id}}">
                                <img src="/storage/{{$item->main_image}}" alt="photo" class="card-img">
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
    <style>
        .js-bg {
            background-image: url('/storage/{{$setting->desktop_image}}') !important;
        }

        @media (max-width: 992px) {
            .js-bg {
                background: url('/storage/{{$setting->tablet_image}}') !important;
            }
        }

        @media (max-width: 576px) {
            .js-bg {
                background: url('/storage/{{$setting->mobile_image}}') !important;
            }
        }
    </style>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function () {

            $('.btn-contact').on('click', function () {
                if ($('.hide').hasClass('open')) {
                    $('.hide').removeClass('open');
                } else {
                    $('.hide').addClass('open');
                }
            });

            function selectText(elementId) {

                var doc = document,
                    text = doc.getElementById(elementId), range, selection;

                if (doc.body.createTextRange) {

                    range = document.body.createTextRange();
                    range.moveToElementText(text);
                    range.select();

                } else if (window.getSelection) {

                    selection = window.getSelection();
                    range = document.createRange();
                    range.selectNodeContents(text);
                    selection.removeAllRanges();
                    selection.addRange(range);

                }

            }

            $(".nav-item_name").click(function () {

                selectText(this.id);
                document.execCommand("copy");

            });
            document.querySelector('.js-bg').onclick = () => {
                $.ajax({
                    url: '/click',
                    type: 'POST',
                    success: function success() {
                        window.location.href= '{{$setting->link}}'
                    }
                });
            }
        });
    </script>
    </body>
@endsection
