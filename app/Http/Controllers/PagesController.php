<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\PictureType;
use App\UploadedPicture;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{

    public function home(){

        if(Auth::guest()){

            return view('welcome');
        }
        if(Auth::user()->role == 0){
            return view('templates/dashboard');
        }
        else{
            $user = Auth::user();
            $profile_picture = Auth::user()->avatar;

            $all_images = UploadedPicture::orderBy('id', 'DESC')->get();

            return view('templates/home')->with(compact('user', 'profile_picture', 'all_images'));
        }
    }

    public function store(Request $request)
    {
        $id = Auth::User()->id;
        $image = new UploadedPicture();

        // validate required attributes
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        //fill attributes with values
        $image->title = $request->title;
        $image->description = $request->description;
        $image->category_id = $request->category;
        $image->user_id = Auth::User()->id;

        if($request->hasFile('image')) {
            $file = Input::file('image');

            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp . '-' . $file->getClientOriginalName();
            $image->types_id = $request->type;
            $image->filePath = $name;

            // resize picture
            $file= Image::make(Input::file('image'));
              if($request->type == 1){
                  $file->resize(200, 200);
              }
              if($request->type == 2){
                  $file->resize(400, 400);
              }
              else if($request->type=3){

                  $file->resize(600, 600);
              }

            //save file to hard disk
           $file->save(public_path() . '/images/' . $name);
        }
         // save
        $image->save();

        $path = '/profile/' . $id;
          //redirect to user profile
        return Redirect::to($path);
    }



    public function profile($id){


        $categories = Category::lists('category_name', 'category_id');
        $types = PictureType::lists('type_name','id');
        $user = User::findOrFail($id);
        $images = $user->uploaded_pictures;
        $mage1 = $user-> first();


        return view('templates/singleProfile')->with(compact('user', 'images', 'categories', 'types', 'image1'));

    }

   public function comment(Request $request){

        $user_id = Auth::User()->id;
        $user_name = Auth::User()->name;



       if($request->ajax()) {
           $comment = new Comment();

           $comment->content = $request->cont;
           $comment->user_id = $request->uid;
           $comment->uploaded_picture_id = $request->pid;

           $comment->save();
           return response()->json([
               'success' => $comment->content,
           ]);;
   }else{
return 'no';
}
     /*   $path = '/profile/' . $user_id;

        return Redirect::to($path);
*/
    }

}
