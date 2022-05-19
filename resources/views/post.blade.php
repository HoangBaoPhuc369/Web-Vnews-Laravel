@extends('main_layouts.master')

@section('title', $post->title . ' | MyBlog')

@section('content')

<div class="col-lg-8">
	<div class="blog single">
		<div class="card">
		<figure class="card-img-top"><img src="{{ asset($post->image ? 'storage/' . $post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '')  }}" alt="" /></figure>
		<div class="card-body">
			<div class="classic-view">
			<article class="post">
				<div class="post-content mb-5">
				<h2 class="h1 mb-4">{{ $post->title }}</h2>
				<p>{!! $post->body !!}.</p>
				<!-- /.post-content -->
				<div class="post-footer d-md-flex flex-md-row justify-content-md-between align-items-center mt-8">
				<div>
					<ul class="list-unstyled tag-list mb-0">
						<li><a href="#" class="btn btn-soft-ash btn-sm rounded-pill mb-0">{{ $post->category->name }}</a></li>
					</ul>
				</div>
				<div class="mb-0 mb-md-2">
					<div class="dropdown share-dropdown btn-group">
					<button class="btn btn-sm btn-red rounded-pill btn-icon btn-icon-start dropdown-toggle mb-0 me-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="uil uil-share-alt"></i> Share </button>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#"><i class="uil uil-twitter"></i>Twitter</a>
						<a class="dropdown-item" href="#"><i class="uil uil-facebook-f"></i>Facebook</a>
						<a class="dropdown-item" href="#"><i class="uil uil-linkedin"></i>Linkedin</a>
					</div>
					<!--/.dropdown-menu -->
					</div>
					<!--/.share-dropdown -->
				</div>
				</div>
				<!-- /.post-footer -->
			</article>
			<!-- /.post -->
			</div>
			<!-- /.classic-view -->
			<hr />
			<div class="author-info d-md-flex align-items-center mb-3">
			<div class="d-flex align-items-center">
				<figure class="user-avatar"><img class="rounded-circle" alt="" src="./assets/img/avatars/u5.jpg" /></figure>
				<div>
				<h6><a href="#" class="link-dark">{{ $post->author->name }}</a></h6>
				</div>
			</div>
			<div class="mt-3 mt-md-0 ms-auto">
				<a href="#" class="btn btn-sm btn-soft-ash rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-file-alt"></i> All Posts</a>
			</div>
			</div>
			<!-- /.author-info -->
			<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Fusce dapibus, tellus ac. Maecenas faucibus mollis interdum.</p>
			<nav class="nav social">
			<a href="#"><i class="uil uil-twitter"></i></a>
			<a href="#"><i class="uil uil-facebook-f"></i></a>
			<a href="#"><i class="uil uil-dribbble"></i></a>
			<a href="#"><i class="uil uil-instagram"></i></a>
			<a href="#"><i class="uil uil-youtube"></i></a>
			</nav>
			<!-- /.social -->
			<hr />
			
			<div id="comments">
				<h3 class="mb-6">{{ count($post->comments) }} Comments</h3>
				@foreach($post->comments as $comment)
				<ol id="singlecomments" class="commentlist">
					<li id="comment_{{ $comment->id }}" class="comment">
						<div class="comment-header d-md-flex align-items-center">
							<div class="d-flex align-items-center">
							<figure class="user-avatar"><img class="rounded-circle" alt="" src="{{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }}" /></figure>
							<div>
								<h6 class="comment-author"><a href="#" class="link-dark">{{ $comment->user->name }}</a></h6>
								<ul class="post-meta">
								<li><i class="uil uil-calendar-alt"></i>{{ $comment->created_at->diffForHumans() }}</li>
								</ul>
								<!-- /.post-meta -->
							</div>
							<!-- /div -->
							</div>
							<!-- /div -->
							<div class="mt-3 mt-md-0 ms-auto">
							<a href="#" class="btn btn-soft-ash btn-sm rounded-pill btn-icon btn-icon-start mb-0"><i class="uil uil-comments"></i> Reply</a>
							</div>
							<!-- /div -->
						</div>
						<!-- /.comment-header -->
						<p>{{ $comment->the_comment }}</p>
					</li>
				</ol>
				@endforeach
			</div>
			<!-- /#comments -->
			<hr />
			<h3 class="mb-3">Would you like to share your thoughts?</h3>
			<p class="mb-7">Your email address will not be published. Required fields are marked *</p>
			<x-blog.message :status="'success'"/>

			@auth
			<form method="POST" action="{{ route('posts.add_comment', $post) }}" class="comment-form">
				@csrf
				<div class="form-floating mb-4">
					<textarea style="resize: none; height: 150px;" name="the_comment" id="the_comment" class="form-control" placeholder="Comment" style="height: 150px"></textarea>
					<label>Comment *</label>
				</div>
				<button type="submit" class="btn btn-primary rounded-pill mb-0">Submit</button>
			</form>
			@endauth

			@guest
				<p class="lead">
					<a href="{{ route('login') }}">Login </a> OR <a href="{{ route('register') }}">Register</a> to write comments
				</p>
			@endguest	
			<!-- /.comment-form -->
		</div>
		<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.blog -->
	</div>

@endsection


@section('custom_js')

<script>
	setTimeout(() => {
		$(".global-message").fadeOut();
	}, 5000);
</script>

@endsection