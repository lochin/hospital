@extends('post.default')

@section('content')
<div class="container">
    @auth
		<a href="{{ route('posts.create') }}" class="btn btn-success btn-block mt-3">Create Post</a>
	@endauth
	
	@guest
	<div class="alert alert-info mt-3">
		Please, Sign up for create posts! 
		<a href="{{ route('login') }}" class="alert-link">Login</a>
	</div> 
	@endguest
	
	<h1 class="text-primary text-center my-3">All posts</h1>
	
	@php
	    $i = ($posts->currentPage()-1) * $posts->perPage() + 1;
	@endphp
	
	<table class="table">
	  <caption>{{ $posts->count() }} posts in page</caption>
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Title</th>
		  <th scope="col">Content</th>
		</tr>
	  </thead>
	  <tbody>
		@foreach($posts as $post)
			<tr>
			  <th scope="row">{{ $i++ }}</th>
			  <td>{{ $post->title }}</td>
			  <td>
				  {{ Str::limit($post->content, 170) }}
				  <a href="{{ route('posts.show', ['post' => $post->id]) }}">Read More</a> 		
			  </td>
			</tr>
		@endforeach
	  </tbody>
	</table>

	{{ $posts->links() }}

</div>
@endsection