<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::with(['leads'])->get();
        $response = [
            'message' => 'List Media',
            'data' => $media
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'media_name' =>'required|string|max:255'
        ]);

        if($validator->fails()){
            //return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
            return response()->json(['errors'=>$validator->errors()]);
        }

        try{
            $media = Media::create($request->all());
            $response = [
                'message' => 'Media created',
                'data' => $media
            ];
            return response()->json($response, Response::HTTP_CREATED);
        }catch(QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);
        $response = [
            'message' => 'Detail Media',
            'data' => $media
        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'media_name' =>'required|string|max:255'
        ]);

        if($validator->fails()){
            //return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
            return response()->json(['errors'=>$validator->errors()]);
        }
        
        try{
            $media->update($request->all());
            $response = [
                'message' => 'Media updated',
                'data' => $media
            ];
            return response()->json($response, Response::HTTP_OK);
        }catch(QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        try{
            $media->delete();
            $response = [
                'message' => 'Media has been delete',
            ];
            return response()->json($response, Response::HTTP_OK);
        }catch(QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }
}
