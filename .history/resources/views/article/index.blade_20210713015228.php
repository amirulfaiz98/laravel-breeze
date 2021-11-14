<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="card-body">
    @if (session()->has('alert'))
    <div class="alert {{ session()->get('alert-type')}}">
        {{session()->get('alert')}}
    </div>
@endif
Display all the blog here

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Submitted by</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id}}</td>
                    <td>{{ $blog->title}}</td>
                    <td>{{ $blog->created_at->diffForHumans()}}</td>
                    <td>{{ $blog->author}}</td>
                    <td>
                        <a href="{{ route('blog:show',$blog) }}" class="btn btn-success">Show</a>
                    <a href="{{ route('blog:edit',$blog) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('blog:delete', $blog)}}" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links()}}
</div>
</x-app-layout>
