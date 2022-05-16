@props(['recentPosts'])

<div class="widget">
    <h4 class="widget-title mb-3">Popular Posts</h4>
    <ul class="image-list">
        @foreach($recentPosts as $recent_post)
        <li>
            <figure class="rounded popular_post"><a href="{{ route('posts.show', $recent_post) }}" ><img src="{{ asset($recent_post->image ? 'storage/' . $recent_post->image->path : 'storage/placeholders/thumbnail_placeholder.svg' . '')  }}" style="height: 75px !important;" alt="" /></a></figure>
            <div class="post-content">
            <h6 class="mb-2"> <a class="link-dark" href="{{ route('posts.show', $recent_post) }}" > {{ \Str::limit( $recent_post->title, 20) }}</a> </h6>
            <ul class="post-meta">
                <li class="post-date"><i class="uil uil-calendar-alt"></i><span>{{ $recent_post->created_at->diffForHumans() }}</span></li>
                <li class="post-comments"><a href="#"><i class="uil uil-comment"></i></a></li>
            </ul>
            <!-- /.post-meta -->
            </div>
        </li>
        @endforeach
    </ul>
    <!-- /.image-list -->
</div>