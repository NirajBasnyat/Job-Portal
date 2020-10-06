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
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 mb-3">
                                <h5 class="h5 text-info">{{ $job->title }}</h5>
                                <article>{!! $job->description !!}</article>
                                <hr>
                            </div>
                            <div class="col-md-5 ">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <span class="green">
                                            <i class="fas fa-dollar-sign"></i> Budget :
                                        </span>
                                        &#36; {{number_format($job->budget)}}
                                    </li>
                                    <li class="mb-2">
                                        <span class="green">
                                            <i class="fas fa-clock"></i> Posted:
                                        </span>
                                        {{$job->created_at->diffForHumans()}}
                                    </li>
                                    <li class="mb-2">
                                        <span class="green">
                                            <i class="fas fa-briefcase"></i> Position :
                                        </span>
                                        {{ucwords($job->position_type)}}
                                    </li>
                                    <li class="mb-2">
                                        <span class="green">
                                            <i class="fas fa-hourglass-end"></i> Project Duration:
                                        </span>
                                        {{ ucwords($job->project_duration) }}
                                    </li>
                                    <li class="mb-2">
                                        <span class="green">
                                            <i class="fas fa-tags"></i> Category:
                                        </span>
                                        {{ ucwords($job->category->category_name) }}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <form action="{{route('application_store',$job->id)}}" method="POST">
                                @csrf
                                <div class="card-header">
                                    <h4 class="h4 text-muted">Application Letter</h4>
                                </div>
                                <div class="card-body pt-0 table-responsive py-3">
                                    <div class="form-group">
                                        <label for="editor">Tell something about yourself</label>
                                        <textarea name="application_letter" class="form-control" id="editor"
                                            rows="8">{{old('application_letter')}}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$job->id}}" name="job">

                                <button type="submit" class="btn btn-green btn-sm">Submit Application</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection