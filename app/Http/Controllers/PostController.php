<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Post::all();
        return view('pages.admin.post.index', [
            'pengumuman' => $pengumuman
        ]);
    }

    public function json(Request $request) {
        if ($request->ajax()) {
            $data = Post::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        
                            $btn = '<a href="/admin/posts/'. $data->slug .'" class="m-1 edit btn btn-info btn-sm">View</a>';
                            $btn = $btn.'<a href="/admin/posts/'. $data->slug .'/edit" class="m-1 edit btn btn-primary btn-sm">Edit</a>';
                            $btn = $btn. '<button type="button" name="delete" id="'.$data->slug.'" class=" m-1 delete btn btn-danger btn-sm">Delete</button>';

                            return $btn;
                            
                    })
                    ->editColumn('created_at', function ($request) {
                        return $request->created_at->format('d-m-Y'); // human readable format
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        // return Datatables::of(Post::all())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'author' => 'required|string|min:5|max:100',
            'content' => 'required|string|min:5|max:2000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validate['slug'] = Str::slug($validate['title'], '-');

        $validate['thumbnail'] = $request->file('thumbnail')->store(
            'assets/photo', 'public'
        );

        $SERVER_API_KEY = 'AAAA0Gynpx8:APA91bGZ_Bhq-7pDDmUgDdEoxxQ2pTSQiJNicyck2P9apJwkSDUvyq8KBGubZQu_Wu0x1UZeElbQF_Lp2CUZc1IA0DMf9DNmoE2z0nwWukTb4sIjUvykkRxis5vPOXtVag8k_-Cg_DI5';

                $url = 'https://fcm.googleapis.com/fcm/send';

                $title = $request->input('title');
                $content = $request->input('content');
                // $image = $request->input('thumbnail');
                // $photo = Post::first()->thumbnail;
   

                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization'=> 'key='. $SERVER_API_KEY,
                ])->post($url, [
                    'notification' => [
                        'title' => 'Pengumuman: '.$title,
                        'body' => $content,             
                    ],
                    'priority'=> 'high',
                    'data' => [
                        'click_action'=> 'FLUTTER_NOTIFICATION_CLICK',
                        
                        'status'=> 'done',
                        
                    ],
                    'to' => '/topics/pengumuman',
                ]);
        $post = Post::create($validate);

        Alert::success('Berhasil', ' Pengumuman Berhasil Ditambahkan');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($post);
        // $post = Post::findOrFail($post);

        return view('pages.admin.post.detail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $peng = Post::findOrFail($post);
        return view('pages.admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required|string|unique:posts|min:5|max:100',
            'author' => 'required|string|min:5|max:100',
            'content' => 'required|string|min:5|max:2000',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validate['slug'] = Str::slug($validate['title'], '-');

        $validate['thumbnail'] = $request->file('thumbnail')->store(
            'assets/photo', 'public'
        );

        $post->update($validate);

        Alert::success('Berhasil', ' Pengumuman Berhasil Diupdate');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Alert::success('Berhasil', ' Pengumuman Berhasil dihapus');
        return back();
    }
}
