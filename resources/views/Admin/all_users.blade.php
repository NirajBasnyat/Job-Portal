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


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav_admin" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Admins</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav_provider"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Job Providers</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav_seeker"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Job Seekers</a>
                            </div>
                        </nav>


                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav_admin" role="tabpanel"
                                aria-labelledby="nav-home-tab">

                                <div class="card">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th colspan="2">Permission</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($admins as $admin)
                                            <tr>
                                                <td>{{$admin->name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav_provider" role="tabpanel"
                                aria-labelledby="nav-profile-tab">

                                <div class="card">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Member Since</th>
                                                <th>Permission</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($providers as $provider)
                                            <tr>
                                                <td>{{$provider->name}}</td>
                                                <td> {{ $provider->email }} </td>
                                                <td> {{ $provider->created_at->format('M j, Y') }} </td>

                                                <td>
                                                    @if($provider->role == 3)
                                                    <a href="{{route('admin.unban_provider',$provider->id)}}"
                                                        class="btn btn-block btn-sm btn-outline-success">UnBan</a>
                                                    @elseif($provider->role == 2)
                                                    <a href="{{route('admin.ban_provider',$provider->id)}}"
                                                        class="btn btn-block btn-sm btn-outline-danger">Ban</a>
                                                    @endif

                                                </td>


                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav_seeker" role="tabpanel"
                                aria-labelledby="nav-contact-tab">

                                <div class="card">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Member Since</th>
                                                <th>Permission</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($seekers as $seeker)
                                            <tr>
                                                <td>{{$seeker->name}}</td>
                                                <td> {{ $seeker->email }} </td>
                                                <td> {{ $seeker->created_at->format('M j, Y') }} </td>

                                                <td>
                                                    @if($seeker->role == 4)
                                                    <a href="{{route('admin.unban_seeker',$seeker->id)}}"
                                                        class="btn btn-block btn-sm btn-outline-success">UnBan</a>

                                                    @elseif($seeker->role == 1)
                                                    <a href="{{route('admin.ban_seeker',$seeker->id)}}"
                                                        class="btn btn-block btn-sm btn-outline-danger">Ban</a>
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
</div>
@endsection