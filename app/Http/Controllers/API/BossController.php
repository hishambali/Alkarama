<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BossResource;
use App\Http\Traits\FileUploader;
use App\Http\Traits\GeneralTrait;
use App\Models\Boss;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BossController extends Controller
{
    use GeneralTrait;
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BossResource::collection(Boss::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $valid = Validator::make($request->all(), [
            'name'=> 'required|string',
            'start_year'=> 'required|date',
            'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($valid->fails()) {
            return $valid->errors();

            # code...
        }
        else {
            $uuid =Str::uuid();
            $data = [
                'name'=> $request->name,
                'image'=> $this->uploadFile($request,$request->name.$uuid,"Boss","image"),
                'start_year'=> $request->start_year,
                'uuid'=> $uuid
            ];
            Boss::create($data);
            return $this->apiResponse($data,true,null,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        //
        return BossResource::make(Boss::where("uuid",$uuid)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boss $boss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boss  $boss
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boss $boss)
    {
        //
    }
}
