@extends('main_layouts.master')

@section('title', $category->name . ' Category | MyBlog')

@section('content')

<div class="col-lg-8">
    <!-- blog -->
    <div class="blog grid grid-view">
        <div class="row isotope gx-md-8 gy-8 mb-8">
        @forelse($posts as $post)
            <article class="item post col-md-6">
                <div class="card">
                <figure class="card-img-top overlay overlay-1 hover-scale"><a href="{{ route('posts.show', $post) }}"> <img src="{{ asset('storage/' . $post->image->path. '')  }}" style="height: 224.422px;" alt="" /></a>
                    <figcaption>
                    <h5 class="from-top mb-0">Read More</h5>
                    </figcaption>
                </figure>
                <div class="card-body">
                    <div class="post-header">
                    <!-- <div class="post-category text-line">
                        <a href="#" class="hover" rel="category">Coding</a>
                    </div> -->
                    <!-- /.post-category -->
                    <h2 class="post-title h3 mt-1 mb-3"><a class="link-dark" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
                    </div>
                    <!-- /.post-header -->
                    <div class="post-content">
                    <p>{{ $post->excerpt }}</p>
                    </div>
                    <!-- /.post-content -->
                </div>
                <!--/.card-body -->
                <div class="card-footer">
                    <ul class="post-meta d-flex mb-0">
                    <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $post->created_at->diffForHumans() }}</span></li>
                    <li class="post-comments"><a href="{{ route('posts.show', $post) }}#post-comments"><i class="uil uil-comment"></i>{{ $post->comments_count }}</a></li>
                    <li class="post-likes ms-auto"><a href="#"><i class="uil uil-user"></i>{{ $post->author->name }}</a></li>
                    </ul>
                    <!-- /.post-meta -->
                </div>
                <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </article>
        <!-- /.post -->
        @empty
            <p class='lead'>There are no posts related to this category.</p>
        @endforelse

       
        </div>
        <!-- /.row -->
    </div>
    <!-- /.blog -->
   
    <!-- /.pagination -->
    {{ $posts->links() }}
    <!-- /nav -->
</div>

@endsection