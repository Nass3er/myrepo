

<ul class="list-unstyled d-flex justify-content-center mt-5 switcher">
    <li class="active rounded-pill"><a href= "{{route('projects.show',$project->id)}}">Code</a> </li>

    <li><a href="{{route('myProject.design',$project)}}">design</a></li>
    {{-- ,['projName' => $project->projName ,'projDesignPhoto' =>$project->projDesignPhoto] --}}
    <li><a href="{{route('myProject.zip',$project)}}">zip file</a></li>
    @if (Auth::check())
    @can('isAdmin')
    <li> <a href="{{route('projects.create')}}" class="  rounded-pill main-btn ">add project</a></li>
    @endcan
    @endif



</ul>
<hr>
