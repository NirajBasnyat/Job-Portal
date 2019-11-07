@extends('layouts.master')

@section('content')

<div class="container-fluid pl-3 pr-3">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 nodecorationlist">
                    <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                class="fas fa-home mr-2"></i>Home</a></li>
                    <li class="breadcrumb-item active gray" aria-current="page"></li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <div class="card">
                            <div class="card-body">
                                <div class="row countrow">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 count_tile count_border textwrap">
                                        <span class="counttop">
                                            <i class="fas fa-user mr-2"></i>Total Users</span>
                                        <div class="count green pl-4">{{count($job_count)}}</div>
                                        <span class="countbottom">
                                            <i class="green mr-2">4% <i class="fas fa-level-up-alt"></i></i>From last
                                            week
                                        </span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 count_tile count_border textwrap">
                                        <span class="counttop">
                                            <i class="fas fa-clock mr-2"></i>Job Providers</span>
                                        <div class="count green pl-4">{{count($provider_count)}}</div>
                                        <span class="countbottom">
                                            <i class="green mr-2">8% <i class="fas fa-level-up-alt"></i></i>From last
                                            week
                                        </span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 count_tile count_border textwrap">
                                        <span class="counttop">
                                            <i class="fas fa-male mr-2"></i>Job Seekers</span>
                                        <div class="green count pl-4">{{count($seeker_count)}}</div>
                                        <span class="countbottom">
                                            <i class="green mr-2 ">14% <i class="fas fa-level-up-alt"></i></i>From last
                                            week
                                        </span>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection