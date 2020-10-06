@extends('layouts.master')

@section('content')

<div class="container-fluid pl-3 pr-3">
    <div class="row">
        <div class="col-12 p-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 nodecorationlist">
                    <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                class="fas fa-home mr-2"></i>Home</a></li>
                    <li class="breadcrumb-item active gray" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    @include('_partialstest._messages')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <h5 class="float-left green">
                            Company's Info
                        </h5>

                        @if(empty($company))
                        <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                            data-target="#addCompany{{$user->id}}">
                            <i class="fas fa-plus green"></i> <span class="green h6">Add</span>
                        </button>
                        @else
                        <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                            data-target="#editCompany{{$user->id}}">
                            <i class="fas fa-edit green"></i> <span class="green h6">Edit</span>
                        </button>
                        @endif

                    </div>

                    <div class="card-body">
                        {{--Main company profile section--}}
                        @if(empty($company))
                        <div class="modal fade" id="addCompany{{$user->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{route('provider_company.store')}}" method="post">
                                @else
                                <div class="modal fade" id="editCompany{{$user->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <form action="{{route('provider_company.update')}}" method="post">
                                        @endif
                                        @csrf
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Company info</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fab fa-fort-awesome-alt"></i> Name</span>
                                                        </div>
                                                        <input type="text" id="name" class="form-control" name="name"
                                                            value="{{$company !== null ? $company->name : ''}}">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marker-alt"></i> Street</span>
                                                        </div>
                                                        <input type="text" id="street" class="form-control"
                                                            name="street"
                                                            value="{{$company !== null ? $company->street : ''}}">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-marker-alt"></i> City</span>
                                                        </div>
                                                        <input type="text" id="city" class="form-control" name="city"
                                                            value="{{$company !== null ? $company->city : ''}}">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone"></i>
                                                                Phone</span>
                                                        </div>
                                                        <input type="text" id="phone" class="form-control" name="phone"
                                                            value="{{$company !== null ? $company->phone : ''}}"
                                                            pattern="^\d{7,10}$">
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-map-pin"></i> Site's address</span>
                                                        </div>
                                                        <input type="url" id="site_link" class="form-control"
                                                            name="site_link"
                                                            value="{{$company !== null ? $company->site_link : ''}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-font-awesome-flag"></i>&nbsp;Description</span>
                                                        <textarea class="form-control" id="description"
                                                            name="description"
                                                            rows="3">{{$company !== null ? $company->description : ''}}</textarea>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-dismiss="modal"><i
                                                            class="fas fa-times-circle"></i></button>
                                                    <button type="submit" class="btn btn-green btn-sm"><i
                                                            class="fas fa-check-circle"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                        </div>

                        <div class="card">

                            {{--company logo section --}}
                            @if(empty($company->logo))
                            <i class="fas fa-user-circle fa-10x text-muted d-flex justify-content-center"
                                data-toggle="modal" data-target="#uploadLogo{{$user->id}}"></i>
                            @else
                            <img class="p-0 profilepicture rounded-circle img-thumbnail img-fluid mx-auto d-block"
                                height="160px" width="100px" src="/storage/logo/{{$company->logo}}"
                                data-target="#uploadLogo{{$user->id}}" data-toggle="modal">
                            @endif

                            {{--company logo  modal --}}
                            <div class="modal fade" id="uploadLogo{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('provider_company.storeLogo')}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="file" class="form-control-file" id="companyLogo"
                                                        name="companyLogo" aria-describedby="fileHelp">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="submit" class="btn btn-sm btn-green"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            {{--company info display--}}
                            @if(!empty($company))
                            <div class="card-body">
                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fab fa-fort-awesome-alt"></i> Company Name</b>: {{$company->name}}
                                </h4>

                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fas fa-map-marker-alt"></i> Location</b>: {{$company->street}} ,
                                    {{$company->city}}
                                </h4>

                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fas fa-phone"></i> Company's Number</b>: {{$company->phone}}
                                </h4>

                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fas fa-map-pin"></i> Company's Site: </b><a
                                        href="{{$company->site_link}}" target="_blank">link to Site</a>
                                </h4>


                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fab fa-font-awesome-flag"></i> Company's Description</b>:
                                    {!! $company !== null ? nl2br(e($company->description)) : '' !!}
                                </h4>

                                <h4 class="h4 text-muted pb-2">
                                    <b><i class="fas fa-stopwatch"></i> Joined at</b>:
                                    {{$company->created_at->diffForHumans()}}
                                </h4>

                            </div>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>






@endsection