<?php

namespace App\Http\Controllers;

use App\Models\Shortner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ShortnerApiController extends Controller
{
    public function index()
    {
        $shortLinks = Shortner::latest()->get();
   
        return response()->json([
            'shortLink'=> $shortLinks
        ], 200);
    }
     
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => 'required|url'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input['link'] = $request->url;
        $input['code'] = Str::random(8);
   
        $shortenURL = Shortner::create($input);
        if(!empty($shortenURL)) {
            $shortenURL->code = URL::to('/') .'/'. $shortenURL->code;
            return response()->json([
                'shortner'=> $shortenURL
            ], 201);
        }
        
    }
}
