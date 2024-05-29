<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Profile;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'user_id' => auth()->user()->id,

            'name' => auth()->user()->name,
            'role' => $request->role,
            'email' => auth()->user()->email,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address

        ]);

        if($profile){
            Auth::logout();
            $pass =  Hash::make('123456');
            if (Auth::attempt(['email' => 'admin@email.com', 'password' => '123456'])) {
                // Authentication passed, redirect to home
                return redirect(route('home'));
            } else {
                // Authentication failed, handle accordingly
                return redirect(route('logout'));
            }
        }
        else{
            return redirect(route('completeprofile'));
        }
    }

    public function showFeed(){
        $posts = Post::all();
        return view('feed', compact('posts'));
    }

    public function showMessages(){
        $messages = Contact::all();
        return view('messages', compact('messages'));
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

    public function contentUpload(Request $request){
        // dd($request->all());
        $request->validate([
            'caption' => 'required',
            'file' => 'required',
            'bmc1' => 'required',
            'bmc2' => 'required',
            'bmc3' => 'required',
            'bmc4' => 'required',
            'bmc5' => 'required',
            'bmc6' => 'required',
            'bmc7' => 'required',
            'bmc8' => 'required',
            'bmc9' => 'required'
        ]);

        $user = auth()->user(); // Retrieve the authenticated user
   
        $file = $request->file('file');
    $fileName = $file->getClientOriginalName(); 
        $post = Content::create([
            'email' => $user->email,
            'name' => $user->name,
            'caption' => $request->caption,
            'content' => $fileName,
            'bmc1' => $request->bmc1,
            'bmc2' => $request->bmc2,
            'bmc3' => $request->bmc3,
            'bmc4' => $request->bmc4,
            'bmc5' => $request->bmc5,
            'bmc6' => $request->bmc6,
            'bmc7' => $request->bmc7,
            'bmc8' => $request->bmc8,
            'bmc9' => $request->bmc9
        ]);
        

    $file->move('upload', $fileName);


        

        
        return redirect(route('reviews'));
        

    }

    public function like($postid){

       

        $post = Post::findOrFail($postid);

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

    public function reviewView($post){

        

        $comment = Review::all();
        $post = Content::findOrFail($post); // Retrieve the post by ID
        
        return view('reviewContent', [
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

    public function reviewPost(Request $request, $content){

        

        $file = $request->file('file');
    $fileName = $file->getClientOriginalName(); 
        

    $file->move('upload', $fileName);
        
        $comment = Review::create([
            'email' => auth()->user()->email,
            'name' => auth()->user()->name,
            'content' => $request->review,
            'post' => $content,
            'filename' => $fileName
        ]);
        $post = Content::where('id', $content);
        $post->increment('reviews');

        $posts = Content::findOrFail($content);
        $comments = Review::all();
        return view('reviewContent', [
            'post' => $posts,
            'comments' => $comments, // Pass the $comment variable to the view
            ]);
    }

    public function onlyUpload(){
        return view('upload');
    }

    public function review(){
        $posts = Content::all();
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

    public function assignmentView(){
        $assignments = Assignment::all();
        return view('assignment', compact('assignments'));
    }

    public function assignmentPost(Request $request){
        $request->validate([
            'title' => 'required',
            'link' => 'required'
        ]);
        $assignment = Assignment::create([
            'title' => $request->title,
            'link' => $request->link,
            'teacherEmail' => auth()->user()->email,
            'teacherName' => auth()->user()->name
        ]);
        return redirect(route('assignment'));
    }
}
