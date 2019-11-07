@extends('layouts.master')

@section('content')

    <div class="container-fluid pl-3 pr-3">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 nodecorationlist">
                        <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                    class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item active gray" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        @include('_partialstest._messages')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <h5 class="float-left green">
                                Company's Info
                            </h5>

                        </div>

                        <div class="card-body">
                            {{--Main company profile section--}}


                        </div>

                        <div class="card">

                            {{--company logo section --}}

                            {{--company logo section --}}
                            @if(empty($company->logo))
                                <i class="fas fa-user-circle fa-10x text-muted d-flex justify-content-center"></i>
                            @else
                                <img class="p-0 profilepicture rounded-circle img-thumbnail img-fluid mx-auto d-block" height="160px" width="100px" src="/storage/logo/{{$company->logo}}">
                            @endif

                            {{--company info display--}}
                            @if(!empty($company))
                                <div class="card-body">
                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fab fa-fort-awesome-alt"></i> Company Name</b>: {{$company->name}}
                                    </h4>

                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fas fa-map-marker-alt"></i> Location</b>: {{$company->street}} , {{$company->city}}
                                    </h4>

                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fas fa-phone"></i> Company's Number</b>: {{$company->phone}}
                                    </h4>

                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fas fa-map-pin"></i> Company's Site: </b><a href="{{$company->site_link}}" target="_blank">link to Site</a>
                                    </h4>


                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fab fa-font-awesome-flag"></i> Company's Description</b>:
                                        {!! $company !== null ? nl2br(e($company->description)) : '' !!}
                                    </h4>

                                    <h4 class="h4 text-muted pb-2">
                                        <b><i class="fas fa-stopwatch"></i> Joined at</b>: {{$company->created_at->diffForHumans()}}
                                    </h4>

                                </div>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>







@endsection







