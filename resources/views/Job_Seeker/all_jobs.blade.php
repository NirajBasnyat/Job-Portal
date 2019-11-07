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

        @include('_partialstest._messages')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Jobs</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="/search" method="GET" class="form-group">
                                        <label for="category"></label>
                                        <select name="category_id" id="category" class="form-control mb-2">
                                            <option value="">..Select Job Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>

                                        <input type="text" class="form-control mb-2" name="query" placeholder="Search Job...">
                                        <button type="submit" class="btn btn-sm btn-green btn-block"><i class="fab fa-searchengin"></i></button>
                                    </form>
                                </div>
                                <div class="card-body col-md-9">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                               href="#nav_all_jobs" role="tab" aria-controls="nav-home"
                                               aria-selected="true">All Jobs</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#most_viewed_jobs"
                                               role="tab" aria-controls="nav-profile" aria-selected="false">Most Viewed Jobs</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#newest_jobs"
                                               role="tab" aria-controls="nav-contact" aria-selected="false">Newest Jobs</a>
                                        </div>
                                    </nav>


                                    <div class="tab-content" id="nav-tabContent">

                                        <div class="tab-pane fade show active" id="nav_all_jobs" role="tabpanel"
                                             aria-labelledby="nav-home-tab">

                                            @if(count($jobs) > 0)
                                                @foreach ($jobs as $job)
                                                    <div class="card mb-3">
                                                        <h5 class="h5 card-header"><a href="{{route('jobs.show',$job->id)}}" class="text-info">{{$job->title}}</a></h5>
                                                        <div class="card-block px-3">
                                                            <p class="small">
                                                                <span>Budget: &#36;{{$job->budget}}</span>
                                                                <span> - </span>
                                                                <span>Posted: {{$job->created_at->diffForHumans()}}</span>
                                                            </p>
                                                            <p class="small">
                                                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Position Type:</span> {{ ucwords($job->position_type) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i
                                                                            class="fas fa-hourglass-end"></i> Project Duration:</span> {{ ucwords($job->project_duration) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span> {{ ucwords($job->category->category_name) }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{ $jobs->links() }}
                                            @else
                                                <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                                            @endif

                                        </div>




                                        <div class="tab-pane fade show active" id="most_viewed_jobs" role="tabpanel"
                                             aria-labelledby="nav-home-tab">

                                            @if(count($mostViewedJobs) > 0)
                                                @foreach ($mostViewedJobs as $j)
                                                    <div class="card mb-3">
                                                        <h5 class="h5 card-header"><a href="{{route('jobs.show',$j->id)}}" class="text-info">{{$j->title}}</a></h5>
                                                        <div class="card-block px-3">
                                                            <p class="small">
                                                                <span>Budget: &#36;{{$j->budget}}</span>
                                                                <span> - </span>
                                                                <span>Posted: {{$j->created_at->diffForHumans()}}</span>
                                                            </p>
                                                            <p class="small">
                                                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Position Type:</span> {{ ucwords($j->position_type) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i
                                                                            class="fas fa-hourglass-end"></i> Project Duration:</span> {{ ucwords($j->project_duration) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span> {{ ucwords($j->category->category_name) }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{ $mostViewedJobs->links() }}
                                            @else
                                                <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                                            @endif

                                        </div>

                                        <div class="tab-pane fade show active" id="newest_jobs" role="tabpanel"
                                             aria-labelledby="nav-home-tab">

                                            @if(count($recentJobs) > 0)
                                                @foreach ($recentJobs as $j)
                                                    <div class="card mb-3">
                                                        <h5 class="h5 card-header"><a href="{{route('jobs.show',$j->id)}}" class="text-info">{{$j->title}}</a></h5>
                                                        <div class="card-block px-3">
                                                            <p class="small">
                                                                <span>Budget: &#36;{{$j->budget}}</span>
                                                                <span> - </span>
                                                                <span>Posted: {{$j->created_at->diffForHumans()}}</span>
                                                            </p>
                                                            <p class="small">
                                                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Position Type:</span> {{ ucwords($j->position_type) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i
                                                                            class="fas fa-hourglass-end"></i> Project Duration:</span> {{ ucwords($j->project_duration) }}</span>
                                                                <br>
                                                                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span> {{ ucwords($j->category->category_name) }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{ $recentJobs->links() }}
                                            @else
                                                <h2 class="h2 text-muted text-center">NO RESULT FOUND</h2>
                                            @endif

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







