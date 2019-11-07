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
                        <div class="card-header">Search Jobs</div>
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
                                        <button type="submit" class="btn btn-sm btn-green btn-block"><i class="fab fa-searchengin fa-2x"></i></button>
                                    </form>
                                    <a href="{{route('all_jobs')}}" class="btn btn-sm btn-dark btn-block">Show all jobs</a>
                                </div>
                                <div class="card-body col-md-9">
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
                                                        <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Project Duration:</span> {{ ucwords($job->project_duration) }}</span>
                                                        <br>
                                                        <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span> {{ ucwords($job->category->category_name) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
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
@endsection







