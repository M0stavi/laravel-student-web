<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NavigationController extends Controller
{
    //
    public function completeprofile(){
        return view('editprofile');
    }

    public function completeprofilePost(Request $request){
        $request->validate([
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'address' => 'required',
        ]);

        $profile = Profile::create([

            'name' => auth()->user()->name,
            'role' => $request->role,
            'email' => auth()->user()->email,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address

        ]);

        if($profile){
            return redirect(route('logout'));
        }
        else{
            return redirect(route('completeprofile'));
        }
    }

    public function showFeed(){
        $posts = Post::all();
        return view('feed', compact('posts'));
    }

    public function upload(Request $request){
        // dd($request->all());
        $request->validate([
            'caption' => 'required',
            'file' => 'required'
        ]);

        $user = auth()->user(); // Retrieve the authenticated user
   
        $file = $request->file('file');
    $fileName = $file->getClientOriginalName(); 
        $post = Post::create([
            'email' => $user->email,
            'name' => $user->name,
            'caption' => $request->caption,
            'content' => $fileName
        ]);
        

    $file->move('upload', $fileName);


        

        
        return redirect(route('showFeed'));
        

    }

    public function like(Post $post){

        $like = Like::where('email', auth()->user()->email)
            ->where('post', $post->id) // Add this line to include the name condition
            ->first();

        if($like){
            $post->decrement('likes');
            $like->delete();
        }
        else{
            $post->increment('likes');
            $liking = Like::create([
                'email' => auth()->user()->email,
                'post' => $post->id
            ]);
        }

        return redirect(route('showFeed'));

    }

    public function commentView($post){

        $comment = Comment::all();
        $post = Post::findOrFail($post); // Retrieve the post by ID
        
        return view('comment', [
        'post' => $post,
        'comments' => $comment, // Pass the $comment variable to the view
        ]);
    }

    public function commentPost(Request $request, $content){
        
        $comment = Comment::create([
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
            'content' => $request->comment,
            'post' => $content
        ]);
        $post = Post::where('id', $content);
        $post->increment('comments');

        $posts = Post::findOrFail($content);
        $comments = Comment::all();
        return view('comment', [
            'post' => $posts,
            'comments' => $comments, // Pass the $comment variable to the view
            ]);
    }

    public function onlyUpload(){
        return view('upload');
    }

    public function review(){
        $posts = Post::where('email', auth()->user()->email)->get();
        return view('reviews',compact('posts'));
    }

    public function contact(){
        return view('contact');
    }

    public function contactPost(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastsname' => 'required',
            'email' => 'required',
            'help' => 'required'
        ]);
        $contact = Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastsname,
            'email' => $request->email,
            'help' => $request->help
        ]);
        return redirect(route('contact'));
    }

    public function about(){
        return view('about');
    }
}
