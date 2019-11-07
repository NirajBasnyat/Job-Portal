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
                        <div class="card-header">My Jobs</div>
                        <div class="card-body pt-0 table-responsive py-3">
                            <div class="row">
                                <div class="col-xs-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Job</th>
                                            <th>Status</th>
                                            <th class="px-5"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($jobs as $job)
                                            <tr>
                                                <td>
                                                    <a href="/jobs/{{$job->job_id}}"><h4 class="h5 text-info">{{ $job->title }}</h4></a>
                                                </td>
                                                <td>
                                                    @if ($job->status =='hired')
                                                        <h4><span class="badge badge-success w-100">{{ $job->status }}</span></h4>
                                                    @elseif($job->status =='rejected')
                                                        <h4><span class="badge badge-danger w-100">{{ $job->status }}</span></h4>
                                                    @else
                                                        <h4><span class="badge badge-info w-100">{{ $job->status }}</span></h4>
                                                    @endif
                                                </td>

                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







