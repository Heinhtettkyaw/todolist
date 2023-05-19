<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function create(){
        // $posts=Post::all()->toArray();
        $posts=Post::orderBy('created_at','desc')->paginate(3);
        return view('create',compact('posts'));
    }

    //post create
    public function postCreate(Request $request){
        $this->postValidationCheck($request);
       $response= $this->getPostData($request);
       Post::create($response);
    // return back();
    return redirect()->route('post#home')->with(['insertSuccess'=> "ထည့်သွင်းခြင်း အောင်မြင်ပါသည်!!!"]);
    }

    //Post delete

    Public function postDelete($id){

        Post::where('id',$id)->delete();
        return redirect()->route('post#home')->with(['deleteSuccess'=> "ဖျက်ပြီးသွားပါပြီ!!!"]);
        //second way
        // Post::find($id)->delete();
    }


    //Post update Page
    public function updatePage($id){
       $post= Post::where('id',$id)->get()->toArray();

        return view('update',compact('post'));
    }


    //editPage
    public function editPage($id){
        $post= Post::where('id',$id)->first()->toArray();
        return view('edit',compact('post'));
    }

    //EditData
    public function postEdit(Request $request){
        $this->postValidationCheck($request);
        $response= $this->getPostData($request);
        $id=$request->postId;

        Post::where('id',$id)->update($response);
        return redirect()->route('post#home')->with(['updateSuccess'=> "ပြင်ဆင်ခြင်း အောင်မြင်ပါသည်!!!"]);
    }
    private function getPostData($request){
        $data=[
            'title'=>$request->postTitle,
            'description'=>$request->postDescription,
            'updated_at'=>Carbon::now()

        ];
        return $data;
    }

    private function postValidationCheck($request){
        $validationRules=[
            'postTitle'=>'required | unique:posts,title',
            'postDescription'=>'required'
        ];
        $validationMessage=[
            'postTitle.required'=>'ခေါင်းစဥ် ထည့်သွင်းရန် လိုအပ်ပါသည်',
            'postDescription.required'=>'အကြောင်းအရာ ထည့်သွင်းရန် လိုအပ်ပါသည်',
            'postTitle.unique'=> 'ခေါင်းစဥ်အား အသုံးပြုပြီး ဖြစ်ပါသည်။ ထပ်မံ ကြိုးစားကြည့်ပါ '

        ];


        Validator::make($request->all(),$validationRules,$validationMessage)->validate();
    }
}
