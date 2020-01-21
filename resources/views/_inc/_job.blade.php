<h3 class="text-center title">Jobs</h3>
<div class="container-fluid mx-4">
    <div class="row mb-3">

        <div class="col-md-6 mr-5">
            <div class="card">
                <div class="card-header">
                    <h4> Recent Jobs</h4>
                </div>
                <div class="card-body">
                    @foreach ($recentJobs as $recentJob)
                        <div class="card mb-3">
                            <h5 class="h5 card-header"><span class="text-info">{{$recentJob->title}}</span>
                                <a href="{{route('jobs.show',$recentJob->id)}}" class="btn btn-sm btn-outline-dark float-right"><span>View</span></a>
                            </h5>

                            <div class="card-body">
                                <p class="small">
                                    <span><span class="text-success">Budget</span>: &#36; {{$recentJob->budget}}</span>
                                    <br>
                                    <span><span class="text-success"><i class="fas fa-briefcase"></i> Position
                                            Type:</span> {{ ucwords($recentJob->position_type) }}</span>
                                    <br>
                                    <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Project
                                            Duration:</span> {{ ucwords($recentJob->project_duration) }}</span>
                                    <br>
                                    <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span>
                                        {{ ucwords($recentJob->category->category_name) }}</span>

                                    <span class="float-right"><small>Posted: {{$recentJob->created_at->diffForHumans()}}</small></span>
                                </p>
                            </div>

                        </div>
                    @endforeach
                    <div class="card-body text-center">
                        <a href="{{route('all_jobs')}}" class="btn btn-sm btn-outline-info">See More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- side column -->
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h4>Highlighted Job </h4>
                </div>
                <div class="card-body">
                    <div class="card mb-3">
                        <h5 class="h5 card-header"><span class="text-info">{{$mostViewedJob->title}}</span>
                            <a href="{{route('jobs.show',$mostViewedJob->id)}}" class="btn btn-sm btn-outline-dark float-right"><span>View</span></a>
                        </h5>
                        <div class="card-body">
                            <p class="small">
                                <span><span class="text-success">Budget</span>: &#36; {{$mostViewedJob->budget}}</span>
                                <br>
                                <span><span class="text-success"><i class="fas fa-briefcase"></i> Position
                                            Type:</span> {{ ucwords($mostViewedJob->position_type) }}</span>
                                <br>
                                <span><span class="text-success"><i class="fas fa-hourglass-end"></i> Project
                                            Duration:</span> {{ ucwords($mostViewedJob->project_duration) }}</span>
                                <br>
                                <span><span class="text-success"><i class="fas fa-tags"></i> Category:</span>
                                        {{ ucwords($mostViewedJob->category->category_name) }}</span>

                                <span class="float-right"><small>Posted: {{$mostViewedJob->created_at->diffForHumans()}}</small></span>

                            </p>
                        </div>

                    </div>
                    <div class="card-body text-center">
                        <a href="{{route('all_jobs')}}" class="btn btn-sm btn-outline-info">See More</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
