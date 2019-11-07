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
                        <div class="card-header">Job
                            @if($job->is_bookmarked())
                                <a href="{{route('remove_bookmark',$job->id)}}" class="btn btn-sm btn-dark float-right"> <i class="fas fa-bookmark"></i> Added to Bookmarks</a>
                            @else
                                <a href="{{route('add_bookmark',$job->id)}}" class="btn btn-sm btn-outline-dark float-right"><i class="far fa-bookmark"></i> Add to Bookmarks</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <h3>{{$job->title}}</h3>
                                    <p class="h5 text-success">Budget: <i class="fas fa-dollar-sign"></i>{{number_format($job->budget)}}</p>
                                    {!! $job->description !!}
                                </div>

                                <div class="col-md-5">
                                    <ul class="list-unstyled">
                                        <li class="mb-2 green"><i class="fas fa-clock "></i> Posted : <span class="text-monospace text-dark">{{$job->created_at->diffForHumans()}}</span></li>
                                        <li class="mb-2 green"><i class="fas fa-briefcase "></i> Position : <span class="text-monospace text-dark">{{ucwords($job->position_type)}}</span></li>
                                        <li class="mb-2 green"><i class="fas fa-hourglass-end "></i> Project Duration : <span
                                                class="text-monospace text-dark">{{ucwords($job->project_duration)}}</span></li>
                                        <li class="mb-2 green"><i class="fas fa-tags "></i> Category : <span class="text-monospace text-dark">{{ucwords($job->category->category_name)}}</span></li>
                                    </ul>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><a href="{{route('provider_company.show',$job->user_id)}}" class="btn btn-sm btn-outline-info btn-block">About the client</a></li>
                                        <li class="mb-2">
                                            <span class="green">Job Posting History: </span>{{count($job_count)}} jobs posted
                                        </li>
                                        <li class="mb-2">
                                            <span class="green">Member Since: </span>{{date("M Y", strtotime($job->user->created_at))}}
                                        </li>

                                        @if(Auth::user()->role == 1)
                                            @if ($result == 'exist')
                                                <button class="btn btn-success btn-block"><i class="fas fa-check"></i>Applied</button>
                                            @else
                                                <a href="{{route('application_show',$job->id)}}" class="btn btn-green btn-block btn-sm"> Apply to Job</a>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







