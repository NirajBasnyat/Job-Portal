@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 nodecorationlist">
                        <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                    class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item active gray" aria-current="page">Notice</li>
                    </ol>
                </nav>
            </div>
        </div>


        <div class="row pb-2">
            <div class="col-md-12">
                <a href="{{ route('notice.create')}}" class="btn btn-info"><i class="fa fa-plus"></i> Notice
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body p-0 m-0">
                        <table class="table table-striped table-hover m-0">
                            <thead class="bg-green">
                            <tr>
                                <th>Name</th>

                                <th width="10%">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($notices) > 0)
                                @foreach ($notices as $notice)
                                    @if($notice->user_id == Auth::user()->id )
                                        <tr>
                                            <td>
                                                <a href="{{route('notice.show', ['id'=> $notice->id])}}">{{$notice->title}}</a>
                                            <td class="d-inline-flex">

                                                <a href="{{ route('notice.edit',['id'=> $notice->id]) }}"
                                                   class="btn btn-sm btn-info text-white mr-1"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{route('notice.destroy',['id'=>$notice->id])}}"
                                                      method="post">
                                                    {{ csrf_field() }}
                                                    {{method_field('delete')}}
                                                    <button class="btn btn-sm btn-danger text-white"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>

                                            </td>

                                        </tr>
                                    @else
                                    @endif
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">No Type found!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
