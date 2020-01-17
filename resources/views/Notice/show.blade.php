@extends('layouts.master')
@section('content')
    <div class="container-fluid pr-3 pl-3 pt-0">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 nodecorationlist">
                        <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item green"><a href="{{route('notice.index')}}" class="green">Notice</a></li>
                        <li class="breadcrumb-item active gray" aria-current="page">View</li>
                    </ol>
                </nav>
            </div>
        </div>

        @include('_partialstest._messages')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-9 col-lg-9 pl-0">
                                <h4 class="card-header mb-2 m-0 rounded-right"><small>Sent by : </small>
                                    {{$notice->user->name}}
                                </h4>
                                <h3>{{$notice->title}}</h3>
                                <div class=""> {!!$notice->description!!} </div>

                            </div>
                            <div class="col-12">
                                <div class="float-right text-muted">
                                    <b>Created At:</b> {{date('dS F Y', strtotime($notice->created_at))}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
@endsection
