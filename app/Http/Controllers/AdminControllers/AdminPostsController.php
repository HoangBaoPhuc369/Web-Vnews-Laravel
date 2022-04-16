<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Post;

class AdminPostsController extends Controller
{
    private $rules = [
        'title' => 'required|max:200',
        'slug' => 'required|max:200',
        'excerpt' => 'required|max:300',
        'category_id' => 'required|numeric',
        'thumbnail' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp',
        'body' => 'required',
    ];
   
    public function index()
    {
        return view('admin_dashboard.posts.index', [
            'posts' => Post::with('author')->get(),
        ]);
    }

  
    public function create()
    {
        return view('admin_dashboard.posts.create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();
        $post = Post::create($validated);

        if($request->has('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->create([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path,
            ]);
        }
        return redirect()->route('admin.posts.create')->with('success', 'Post created successfully');
    }

  
    public function show($id)
    {
        //
    }

  
    public function edit(Post $post)
    {
        return view('admin_dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::pluck('name', 'id'),
        ]);
    }

   
    public function update(Request $request,Post $post)
    {
        $this->rules['thumbnail'] = 'nullable|file|mimes:jpeg,png,jpg,svg,webp';
        
        $validated = $request->validate($this->rules);
        $post->update($validated);

        if($request->has('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $filename = $thumbnail->getClientOriginalName();
            $file_extension = $thumbnail->getClientOriginalExtension();
            $path = $thumbnail->store('images', 'public');

            $post->image()->update([
                'name' => $filename,
                'extension' => $file_extension,
                'path' => $path,
            ]);
        }
        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post has been updated successfully');
    }

   
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post has been deleted successfully');
    }
}