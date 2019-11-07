@extends('layouts.master')

@section('content')

    <div class="container-fluid pl-3 pr-3">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 nodecorationlist">
                        <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                    class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item active gray" aria-current="page">Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="d-inline-block green">Jobs</h3>
                            <a class="btn-sm btn-green btn float-right" href="{{route('jobs.create')}}">Post a job</a>
                        </div>

                        <div class="card-body table-responsive">
                            @if(count($jobs)> 0)
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Job</th>
                                        <th>Date Posted</th>
                                        <th>Posted By</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($jobs as $job)
                                        <tr>
                                            <td><a href="{{route('proposal_shortlist',$job->id)}}">{{$job->title}}</a></td>
                                            <td>{{$job->created_at->diffForHumans()}}</td>
                                            <td>{{$job->user->name}}</td>
                                            <td>
                                                <a href="{{route('jobs.edit',$job->id)}}"><i class="far fa-edit text-info"></i></a>
                                            </td>
                                            <td>
                                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-default"><i class="fas fa-trash-alt text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <p class="mt-5 text-center mb-5">You don't have any job post</p>
                                    @endif
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







