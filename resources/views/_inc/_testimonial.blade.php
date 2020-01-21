<h3 class="text-center title">Testimonials</h3>
<div class="container ">
    <div class="row mb-3">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('app/images/1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        @if($first_testimonial)
                            <h5 class=""><strong>{{ucfirst($first_testimonial->title)}}</strong></h5>
                            <p>{{$first_testimonial->description}}.</p>
                        @endif
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('app/images/2.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        @if($second_testimonial)
                            <h5 class="text-danger">{{$second_testimonial->title}}</h5>
                            <p>{{$second_testimonial->description}}.</p>
                        @endif
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('app/images/3.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        @if($third_testimonial)
                            <h5 class="text-center">{{$third_testimonial->title}}</h5>
                            <p>{{$third_testimonial->description}}.</p>
                        @endif
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
