@extends('layouts.master')

@section('select2css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

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
                            General Info
                        </h5>

                        {{--profile Modal button --}}
                        @if(empty($profile))
                        <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                            data-target="#addProfile{{$user->id}}">
                            <i class="fas fa-plus green"></i> <span class="green h6">Add</span>
                        </button>
                        @else
                        <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                            data-target="#editProfile{{$user->id}}">
                            <i class="fas fa-edit green"></i> <span class="green h6">Edit</span>
                        </button>
                        @endif
                    </div>

                    <div class="card-body">

                        {{--profile picture section --}}
                        @if(empty($profile->avatar))
                        <i class="fas fa-user-circle fa-10x text-muted d-flex justify-content-center"
                            data-toggle="modal" data-target="#uploadAvatar{{$user->id}}"></i>
                        @else
                        <img class="p-0 profilepicture rounded-circle img-thumbnail mx-auto d-block" height="128px"
                            width="128px" src="/storage/Avatar/{{$profile->avatar}}"
                            data-target="#uploadAvatar{{$user->id}}" data-toggle="modal">
                        @endif

                        {{--profile picture modal --}}
                        <div class="modal fade" id="uploadAvatar{{$user->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('seeker_profile.avatarStore')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="file" class="form-control-file" id="profileAvatar"
                                                    name="profileAvatar" aria-describedby="fileHelp">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                                    class="fas fa-times-circle"></i></button>
                                            <button type="submit" class="btn btn-sm btn-green"><i
                                                    class="fas fa-check-circle"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-10 ">
                                <h5 class="d-inline-block mt-3"><i class="fas fa-user-alt"></i> Name:</h5>
                                <h4 class="h4 green d-inline-block"> &nbsp; {{$user->name}}</h4><br>


                                {{--------- *****************************  MAIN PROFILE *******************************----------}}


                                @if(!empty($profile))
                                <h5 class="d-inline-block mt-3"><i class="fas fa-laptop-code"></i> Job Title:</h5>
                                <h5 class="h5 d-inline-block"> &nbsp; <b>{{$profile->job_title}}</b></h5><br>
                                <small class="h6">
                                    <h5 class="d-inline-block"><i class="fas fa-map-marker-alt"></i> Location:</h5>
                                    <h5 class="d-inline-block mt-3">&nbsp; <b>{{$profile->city}},
                                            {{$profile->country}}</b></h5>
                                </small> <br>
                                @endif
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-12">
                                <h5 class="h5 text-dark"><i class="far fa-id-card"></i> Overview</h5>
                                <p>{!! $profile !== null ? $profile->overview : '' !!}</p>
                            </div>
                        </div>

                        {{-- Modal Display --}}
                        @if(empty($profile))
                        <div class="modal fade" id="addProfile{{$user->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            @else
                            <div class="modal fade" id="editProfile{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                @endif
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Profile's Info</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body profileModal">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-briefcase"></i>&nbsp;Title</span>
                                                </div>
                                                <input type="text" id="jobTitle" class="form-control" name="job_title"
                                                    value="{{$profile !== null ? $profile->job_title : ''}}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-map-marker-alt"></i>&nbsp;City</span>
                                                </div>
                                                <input type="text" id="city" class="form-control" name="city"
                                                    value="{{$profile !== null ? $profile->city : ''}}">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-flag"></i>&nbsp;Country</span>
                                                </div>
                                                <input type="text" id="country" class="form-control custom-hover"
                                                    name="country"
                                                    value="{{$profile !== null ? $profile->country : ''}}">
                                            </div>

                                            <div class="form-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-id-card-alt"></i>&nbsp;Overview</span>
                                                <textarea class="form-control" id="overview" name="overview"
                                                    rows="3">{{$profile !== null ? $profile->overview : ''}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <input type="hidden" id="editId" class="form-control" name=""
                                                    value="{{$user->id}}">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                                    class="fas fa-times-circle"></i></button>
                                            @if(empty($profile))
                                            <button type="submit" class="btn btn-green btn-sm addProfileButton"
                                                data-dismiss="modal"><i class="fas fa-check-circle"></i></button>
                                            @else
                                            <button type="submit" class="btn btn-green btn-sm editProfileButton"
                                                data-id="{{$user->id}}" data-dismiss="modal"><i
                                                    class="fas fa-check-circle"></i></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--------- ***************************  SKILL SECTION *******************************----------}}

                        <div class="card">
                            <div class="card-header">
                                <h5 class="green d-inline-block">Skills</h5>

                                {{-- Modal button --}}
                                <button type="button" class="btn btn-default btn-sm float-right px-1"
                                    data-toggle="modal" data-target="#editSkill{{$user->id}}">
                                    <i class="fas fa-edit green"></i> <span class="green h6">Edit</span>
                                </button>

                                <button type="button" class="btn btn-default btn-sm float-right px-1"
                                    data-toggle="modal" data-target="#addSkill{{$user->id}}">
                                    <i class="fas fa-plus green"></i> <span class="green h6">Add skill</span>
                                </button>


                            </div>

                            <div class="card-body">
                                @foreach($user->skills as $skill)
                                <button type="button" class="btn btn-sm btn-info mt-1">{{$skill->name}}</button>
                                @endforeach

                            </div>

                            {{--add skill Modal Display --}}
                            <div class="modal fade" id="addSkill{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('seeker_skill.store')}}" method="post">
                                    @csrf
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-xs-12">
                                                    <select class="form-control select2_form select2" id=""
                                                        name="skills[]" multiple="multiple" placeholder="Select Skills">
                                                        <option></option>
                                                        @foreach($skills as $skill)
                                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="submit" class="btn btn-green btn-sm"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            {{--edit Modal Display --}}
                            <div class="modal fade" id="editSkill{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('seeker_skill.update')}}" method="post">
                                    @csrf
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-xs-12">
                                                    <select class="form-control selectedskills" id="" name="skills[]"
                                                        multiple="multiple" placeholder="Select Skills">
                                                        <option></option>
                                                        @foreach($skills as $skill)
                                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="submit" class="btn btn-green btn-sm"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{--******************************* WORK_HISTORY ************************************--}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="green d-inline-block">Works</h5>
                                {{--WORK Modal Button --}}
                                <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                                    data-target="#addWork{{$user->id}}">
                                    <i class="fas fa-plus green"></i> <span class="green h6">Add Work</span>
                                </button>
                            </div>

                            <div class="card-body">
                                @foreach($works as $work)
                                <p class="float-right text-danger">
                                    <i class="fas fa-trash-alt" data-toggle="modal"
                                        data-target="#deleteWork{{$work->id}}" data-id="{{$work->id}}"></i>
                                </p>
                                <p class="float-right text-info mr-4">
                                    <i class="fas fa-pencil-alt" data-toggle="modal"
                                        data-target="#editWork{{$work->id}}" data-id="{{$work->id}}"></i>
                                </p>

                                <h5 class="h5 text-dark "><i class="fas fa-level-up-alt"></i> &nbsp; Position:
                                    <b>{{$work->position}}</b></h5>
                                <h5 class="h5 text-dark"><i class="fas fa-building"></i>&nbsp; Company:
                                    <b>{{$work->company}}</b></h5>
                                <h5 class="h5 mb-2 text-dark"><i class="fas fa-calendar"></i>&nbsp; Year:
                                    <b>{{ $work->year }}</b></h5>
                                <div class="h5 text-dark"><i class="fas fa-briefcase"></i>&nbsp; Description: {!!
                                    $work->description !!}</div>
                                <hr>

                                {{--editWORK Modal Display --}}
                                <div class="modal fade" id="editWork{{$work->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Works and Experiences
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-level-up-alt"></i>&nbsp;Position</span>
                                                    </div>
                                                    <input type="text" id="editPosition" class="form-control"
                                                        name="position" value="{{ $work->position }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-building"></i>&nbsp;Company</span>
                                                    </div>
                                                    <input type="text" id="editCompany" class="form-control"
                                                        name="company" value="{{ $work->company }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-calendar"></i>&nbspYear</span>
                                                    </div>
                                                    <input type="text" id="editYear" class="form-control" name="year"
                                                        value="{{ $work->year }}">
                                                </div>

                                                <div class="form-group">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-briefcase"></i>&nbsp;Description</span>
                                                    <textarea class="form-control" id="editDescription"
                                                        rows="3">{{$work->description}}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="submit" class="btn btn-green btn-sm editWorkButton"
                                                    data-dismiss="modal" data-id="{{$work->id}}"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--delete WORK Modal Display --}}

                                <div class="modal fade" id="deleteWork{{$work->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4>Remove work experience</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="modal-title h6">Are you sure you want to delete <span
                                                        class="text-info">"{{$work->company}}"</span> from your profile?
                                                </h6>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger btn-sm text-white px-5"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="button" class="btn btn-green btn-sm deleteWork px-5"
                                                    data-dismiss="modal" data-id="{{$work->id}}"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </div>

                            {{--addWORK Modal Display --}}
                            <div class="modal fade" id="addWork{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Works and Experiences</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-level-up-alt"></i>&nbsp;Position</span>
                                                </div>
                                                <input type="text" id="addPosition" class="form-control" name="position"
                                                    placeholder="Ex: Senior dev">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-building"></i>&nbsp;Company</span>
                                                </div>
                                                <input type="text" id="addCompany" class="form-control" name="company"
                                                    placeholder="Ex: CodeAlchemy ptv ltd">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-calendar"></i>&nbspYear</span>
                                                </div>
                                                <input type="text" id="addYear" class="form-control" name="year"
                                                    placeholder="Ex: 2011">
                                            </div>

                                            <div class="form-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-briefcase"></i>&nbsp;Description</span>
                                                <textarea class="form-control" id="addDescription" rows="3"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                                                    class="fas fa-times-circle"></i></button>
                                            <button type="submit" class="btn btn-green btn-sm addWorkButton"><i
                                                    class="fas fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--------- *****************************  EDUCATION SECTION *******************************----------}}
                        <div class="card">
                            <div class="card-header">
                                <h5 class="green d-inline-block">Education</h5>
                                {{--WORK Modal Button --}}
                                <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                                    data-target="#addEducation{{$user->id}}">
                                    <i class="fas fa-plus green"></i> <span class="green h6">Add Education</span>
                                </button>
                            </div>

                            <div class="card-body">
                                @foreach($educations as $education)
                                <p class="float-right text-danger">
                                    <i class="fas fa-trash-alt" data-toggle="modal"
                                        data-target="#deleteEducation{{$education->id}}"
                                        data-id="{{$education->id}}"></i>
                                </p>
                                <p class="float-right text-info mr-4">
                                    <i class="fas fa-pencil-alt" data-toggle="modal"
                                        data-target="#editEducation{{$education->id}}" data-id="{{$education->id}}"></i>
                                </p>

                                <h5 class="h5 text-dark "><i class="fas fa-graduation-cap"></i>&nbsp;Course/Level:
                                    <b>{{$education->course}}</b></h5>
                                <h5 class="h5 text-dark"><i class="fas fa-synagogue"></i>&nbsp;Institution:
                                    <b>{{$education->institution}}</b></h5>
                                <h5 class="h5 mb-2 text-dark"><i class="fas fa-calendar"></i>&nbsp; Completed Year:
                                    <b>{{ $education->completed_year }}</b></h5>
                                <hr>

                                {{--editWORK Modal Display --}}
                                <div class="modal fade" id="editEducation{{$education->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Works and Experiences
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                                    </div>
                                                    <input type="text" id="editCourse" class="form-control"
                                                        name="position" value="{{ $education->course }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-synagogue"></i>&nbsp;Institution</span>
                                                    </div>
                                                    <input type="text" id="editInstitution" class="form-control"
                                                        name="company" value="{{ $education->institution }}">
                                                </div>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-calendar"></i>&nbsp; Completed Year</span>
                                                    </div>
                                                    <input type="text" id="editCompletedyear" class="form-control"
                                                        name="year" value="{{ $education->completed_year }}">
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="submit" class="btn btn-green btn-sm editEducationButton"
                                                    data-id="{{$education->id}}"><i class="fas fa-check-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--delete WORK Modal Display --}}

                                <div class="modal fade" id="deleteEducation{{$education->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4>Remove work experience</h4>
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="modal-title h6">Are you sure you want to delete <span
                                                        class="text-info">"{{$education->course}}"</span> from your
                                                    profile?</h6>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger btn-sm text-white px-5"
                                                    data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                                <button type="button" class="btn btn-green btn-sm deleteEducation px-5"
                                                    data-dismiss="modal" data-id="{{$education->id}}"><i
                                                        class="fas fa-check-circle"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>

                            {{--addEducation Modal Display --}}
                            <div class="modal fade" id="addEducation{{$user->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Education Qualifications</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-graduation-cap"></i>&nbsp;Course/Level</span>
                                                </div>
                                                <input type="text" id="addCourse" class="form-control" name="course"
                                                    placeholder="Ex: CSIT, Grade 10">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-synagogue"></i>&nbsp;Institution</span>
                                                </div>
                                                <input type="text" id="addInstitution" class="form-control"
                                                    name="institution" placeholder="Ex: Caltech ">
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-calendar"></i>&nbspCompleted Year</span>
                                                </div>
                                                <input type="text" id="addCompletedyear" class="form-control"
                                                    name="year" placeholder="Ex: 2011">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i
                                                    class="fas fa-times-circle"></i></button>
                                            <button type="submit" class="btn btn-green btn-sm addEducationButton"><i
                                                    class="fas fa-check-circle"></i></button>
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

    @section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
                    $('.select2').select2({
                        placeholder: "Please select Skills",
                        allowClear: true,
                        dropdownAutoWidth: true,
                    });
                    $('.selectedskills').select2().val({!! json_encode($user->skills()->allRelatedIds()) !!}).trigger('change');
                });
    </script>
    @endsection