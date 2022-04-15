
@extends("admin_dashboard.layouts.app")

@section("style")
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admin_dashboard_assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet" />
<script src="https://cdn.tiny.cloud/1/zccmr4xtp3vtxapfh5vo6rp0om9phnldiw8yyrzn47iic6od/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Posts</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
          
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Add New Post</h5>
                  <hr/>
                    <form action="{{route('admin.posts.store')}}" method="POST" enctype='multipart/form-data'>
                      @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                            <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Post Title</label>
                                        <input type="text"  value='{{ old("title") }}' class="form-control" required name='title'  id="inputProductTitle" placeholder="Enter product title">
                                        @error('title')
                                                <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Post Slug</label>
                                        <input type="text" value='{{ old("slug") }}' class="form-control" required  name='slug'  id="inputProductTitle" placeholder="Enter product title">
                                        @error('slug')
                                                <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Post Excerpt</label>
                                        <textarea required name='excerpt'  class="form-control" id="inputProductDescription" rows="3">{{ old("excerpt") }}</textarea>
                                        @error('excerpt')
                                                <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Post Category</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <select required name='category_id'  class="single-select">
                                                @foreach($categories as $key => $category) 
                                                    <option value="{{ $key }}">{{$category}}</option>
                                                @endforeach
                                                </select>

                                                @error('category_id')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label class="form-label">Post Tags</label>
                                        <input type="text" class="form-control" name='tags' data-role="tagsinput">
                                    </div> -->

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Post Thumbnail</label>
                                        <input id="thumbnail" required name='thumbnail' id="file" type="file" multiple>

                                        @error('thumbnail')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Post Content</label>
                                        <textarea  name='body' id="post_content" class="form-control" id="inputProductDescription" rows="3">{{ old("body") }}</textarea>

                                        @error('body')
                                            <p class='text-danger'>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button class='btn btn-primary' type='submit'>Add Post</button>
                            </div>
                        </div><!--end row-->
                    </form>
                </div>
              </div>
          </div>


        </div>
    </div>
    <!--end page wrapper -->
    @endsection

@section("script")
<script src="{{ asset('admin_dashboard_assets/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {

        $('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

        tinymce.init({
            selector: '#post_content',
            plugins: 'advlist autolink lists link image media charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: '500',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
            toolbar_mode: 'floating',
            image_title: true,
            automatic_uploads: true,
            
            images_upload_handler: function(blobinfo, success, failure)
            {
                let formData = new FormData();
                let _token = $("input[name='_token']").val();
                let xhr = new XMLHttpRequest();
                xhr.open('post', "{{ route('admin.upload_tinymce_image') }}");
                xhr.onload = () => {
                    if( xhr.status !== 200 )
                    {
                        failure("Http Error: " + xhr.status);
                        return
                    }
                    let json = JSON.parse(xhr.responseText)
                    if(! json || typeof json.location != 'string')
                    {
                        failure("Invalid Json: " + xhr.responseText);
                        return
                    }
                    success( json.location )
                }
                formData.append('_token', _token);
                formData.append('file', blobinfo.blob(), blobinfo.filename());
                xhr.send( formData );
            }
        });
        setTimeout(() => {
            $(".general-message").fadeOut();
        }, 5000);
    })
</script>
@endsection