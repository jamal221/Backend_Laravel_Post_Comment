<?php

namespace App\Http\Controllers;

use App\Models\AjaxImage;
use Validator;
use Illuminate\Http\Request;

class AjaxImageUploadController extends Controller
{
    //
    /**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUpload()
    {
        return view('Images.ajaxImageUpload');
    }


    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUploadPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,mp4|max:100000',
        ]);


        if ($validator->passes()) {


            $input = $request->all();
            dd($input);
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $input['image']);


            AjaxImage::create($input);


            return response()->json(['success'=>'done']);
        }


        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
