@extends('frontend.layout.master')
@section('body')  
    <div class="main-wrapper">
	    
	    <article class="blog-post px-3 py-5 p-md-5">
		    <div class="container">
			    <header class="blog-post-header">
				    <h2 class="title mb-2">{{$blog->blog_tittle}}</h2>
				    <div class="meta mb-3"><span class="date">Published {{\Carbon\Carbon::parse($blog->created_at)->diffForhumans()}}</span><span class="time">5 min read</span><span class="comment"><a href="#">4 comments</a></span></div>
			    </header>
			    
			    <div class="blog-post-body">
				    <figure class="blog-banner">
				        <a href="https://made4dev.com"><img class="img-fluid" src="{{ asset('uploads/'.$blog->image) }}" alt="image"></a>
				        <figcaption class="mt-2 text-center image-caption">Image Credit: <a href="https://made4dev.com?ref=devblog" target="_blank">made4dev.com (Premium Programming T-shirts)</a></figcaption>
				    </figure>
				    <p>{{$blog->blog_description}}</p>
				    
				    
				
				    <h3 class="mt-5 mb-3">Typography</h3>
				    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
				    <h5 class="my-3">Bullet Points:</h5>
				    <ul class="mb-5">
					  <li class="mb-2">Lorem ipsum dolor sit amet consectetuer.</li>
					  <li class="mb-2">Aenean commodo ligula eget dolor.</li>
					  <li class="mb-2">Aenean massa cum sociis natoque penatibus.</li>
					</ul>
					<ol class="mb-5">
					  <li class="mb-2">Lorem ipsum dolor sit amet consectetuer.</li>
					  <li class="mb-2">Aenean commodo ligula eget dolor.</li>
					  <li class="mb-2">Aenean massa cum sociis natoque penatibus.</li>
					</ol>
					<h5 class="my-3">Quote Example:</h5>
					<blockquote class="blockquote m-lg-5 py-3 pl-4 px-lg-5">
						<p class="mb-2">You might not think that programmers are artists, but programming is an extremely creative profession. It's logic-based creativity.</p>
						<footer class="blockquote-footer">John Romero</footer>
					</blockquote>
					
					
					
					
			    </div>
				    
			   
				
				<div class="blog-comments-section">
					<form action="{{ url('commentAdd') }}" method="post">
						@csrf
						<input type="hidden" name="blog_id" value="{{ $blog->id }}">
						<input type="hidden" name="user_id" value="{{ Session::get('user_info')[1] }}">
						<table class="table table-bordered">
							<tr>
								<td>Comment:</td>
								<td><input type="text" name="comment"></td>
								<td><input type="submit" value="Add Comment"></td>
							</tr>
						</table>
					</form>
					@foreach($comment as $comments)
						<ul>
							<li>{{ $comments->comment }}</li>
							<form action="{{ url('replyComment') }}" method="post">
								@csrf
								<input type="hidden" name="comment_id" value="{{ $comments->id }}">
								<input type="hidden" name="blog_id" value="{{ $blog->id }}">
								<input type="text" name="reply">
								<input type="submit" value="Reply">
							</form>
							@foreach($reply as $replys)
								@if($replys->comment_id == $comments->id)
									<ul>
										<li>{{ $replys->reply }}</li>
									</ul>
								@endif
							@endforeach
						</ul>
					@endforeach
				</div><!--//blog-comments-section-->
				
		    </div><!--//container-->
	    </article>
	    
@endsection