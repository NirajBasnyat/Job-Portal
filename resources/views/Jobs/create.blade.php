@extends('layouts.master')

@section('content')

    <div class="container-fluid pl-3 pr-3">
        <div class="row">
            <div class="col-12 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 nodecorationlist">
                        <li class="breadcrumb-item green"><a href="{{route('home')}}" class="green"><i
                                    class="fas fa-home mr-2"></i>Home</a></li>
                        <li class="breadcrumb-item active gray" aria-current="page">Create Job</li>
                    </ol>
                </nav>
            </div>
        </div>

        @include('_partialstest._messages')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Post Job</div>

                        <div class="card-body">
                            <form action="{{route('jobs.store')}}" method="POST">
                                @csrf
                                <label for="title">Title of Job Posting</label>
                                <input type="text" name="title" id="title" class="form-control mb-2" value="{{old('title')}}" placeholder="Example: Web Developer with E-commerce Experience">

                                <label for="description">Description of Job</label>
                                <textarea name="description" id="article-ckeditor" cols="30" rows="10" class="form-control mb-2">{{old('description')}}</textarea>

                                <label for="budget">Proposed Budget</label>
                                <input type="number" name="budget" id="budget" class="form-control mb-2" value="{{old('budget')}}">

                                <label for="position_type">Position Type</label>
                                <select name="position_type" id="position_type" class="form-control mb-2">
                                    <option value="0" selected disabled>..Select Position Type</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="full_time">Full Time</option>
                                </select>

                                <label for="category">Job Category</label>
                                <select name="category_id" id="category" class="form-control mb-2">
                                    <option value="0" selected disabled>..Select Job Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>


                                <label for="project_duration">Position Type</label>
                                <select name="project_duration" id="project_duration" class="form-control mb-4">
                                    <option value="0" selected disabled>..Select Project Duration</option>
                                    <option value="Less than 1 week">Less than 1 week</option>
                                    <option value="Less than 1 month">Less than a month</option>
                                    <option value="1 - 3 months">1 - 3 months</option>
                                    <option value="3 - 6 months">3 - 6 months</option>
                                    <option value="More than 6 months">More than 6 months</option>
                                </select>

                                <button class="btn btn-green btn-sm">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







