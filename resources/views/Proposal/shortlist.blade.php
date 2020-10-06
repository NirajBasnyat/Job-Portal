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
                    <div class="card-header">ShortList</div>

                    <div class="card-body">
                        {{--Upper Nav Tabs--}}
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item col-sm-6 p-0 text-center">
                                <a class="nav-link active py-4" data-toggle="tab" href="#tabs-1" role="tab">
                                    <h4 class="m-0">Job Post</h4>
                                </a>
                            </li>
                            <li class="nav-item col-sm-6 p-0 text-center">
                                <a class="nav-link py-4" data-toggle="tab" href="#tabs-2" role="tab">
                                    <h4 class="m-0">Review Proposals</h4>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            {{--First Tab--}}
                            <div class="tab-pane fade" id="tabs-1" role="tabpanel">
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <h5 class="text-info">{{$job->title}}</h5>
                                        <div>{!! $job->description !!}</div>
                                        <hr>
                                    </div>

                                    <div class="col-md-4">
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
                            </div>
                            {{--  Second Tab --}}
                            <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="profile-tab">

                                <table class="table table-striped">
                                    <tbody>
                                        @foreach($applicants as $applicant)
                                        <tr>
                                            @if(!empty($applicant->avatar))
                                            <td class="text-center"><img src="/storage/Avatar/{{ $applicant->avatar }}"
                                                    class="p-0 rounded-circle" style="height: 80px"></td>
                                            @else
                                            <td class="text-center"><i class="fas fa-user-circle fa-6x text-muted"></i>
                                            </td>
                                            @endif
                                            <td class="text-nowrap">
                                                <h5 class="h5"> <a class="text-info"
                                                        href="{{route('applicant_view',$applicant->id)}}">{{ $applicant->name }}</a>
                                                </h5>
                                                <p>{{ $applicant->job_title }}</p>
                                                <p class="small">
                                                    <span class="mr-5">
                                                        <i class="fas fa-envelope"></i> Received:
                                                        {{ $job->created_at->diffForHumans() }}
                                                    </span>
                                                    <span><i class="fas fa-map-marker-alt"></i>
                                                        {{ $applicant->country }}
                                                    </span>
                                                </p>
                                            </td>

                                            @if($applicant->status == 'hired')
                                            <td>
                                                <h4><span class="badge badge-success w-100"><i
                                                            class="text-white fas fa-check"></i>
                                                        <strong>HIRED</strong></span></h4>
                                            </td>
                                            @elseif($applicant->status == 'rejected')
                                            <td>
                                                <h4><span class="badge badge-danger w-100"><i
                                                            class="text-white fas fa-times"></i>
                                                        <strong>REJECTED</strong></span></h4>
                                            </td>
                                            @else
                                            <td>
                                                <a href="/proposal/{{ $job->id }}/{{$applicant->id}}/hire"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="fas fa-thumbs-up"></i> Hire Candidate
                                                </a>
                                            </td>
                                            <td>
                                                <a href="/proposal/{{ $job->id }}/{{$applicant->id}}/reject"
                                                    class="btn btn-sm btn-outline-danger">
                                                    <i class="far fa-thumbs-down"></i> Reject Candidate
                                                </a>
                                            </td>
                                            @endif
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