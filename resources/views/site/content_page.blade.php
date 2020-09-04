<section>
    <div class="inner_wrapper" style="margin-top: 20px;">
        <div class="container">
            <h2>{{$page->name}}</h2>
            <div class="inner_section">
                <div class="row">
                    <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img src="{{asset('assets/img') . '/' . $page->images}}" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
                    <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                        <div class=" delay-01s animated fadeInDown wow animated">
                            <h3>{{$page->title}}</h3><br/>
                            <p>{{$page->text}}</p>
                        </div>
                    </div>
                </div>
                {!! link_to(route('home'), 'Go home') !!}
            </div>
        </div>
    </div>
</section>
