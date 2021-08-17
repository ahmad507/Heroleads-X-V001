<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leads;
use App\Models\Source;
use App\Models\Media;
use App\Models\Status;
use DB;
use Validator;
use Symfony\Component\HttpFoundation\Response;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead = DB::table('leads')
            ->leftjoin('sources', 'leads.source_id', '=', 'sources.id')
            ->leftjoin('media', 'leads.media_id', '=', 'media.id')
            ->leftjoin('statuses', 'leads.status_id', '=', 'statuses.id')
            ->select('leads.*', 'sources.source_name', 'media.media_name','statuses.status_name')
            ->get();
        // $lead = Leads::with(['source','media','status'])->orderBy('id','asc')->get();
        $response = [
            'message' => 'List Leads',
            'data' => $lead
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
        $status = Status::all();
        $media = Media::all();
        $source = Source::all();
        $leads = Leads::select('id','leads_id','leads_name','leads_email','leads_phone','source_id','media_id', 'status_id','flag')->orderBy('id','desc')->get();
        return response()->json($response, Response::HTTP_OK);
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
            'leads_id' => 'required|string|max:255',
            'leads_name' => 'required|string|max:255',
            'leads_email' => 'required|string|max:255',
            'leads_phone' => 'required|string|max:255',
            'source_id' => 'required|string|max:255',
            'media_id' => 'required|string|max:255',
            'status_id' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            // return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
            return response()->json(['errors'=>$validator->errors()]);
        }

        try{
            $leads = Leads::create($request->all());
            $leads->flag = 1;
            $response = [
                'message' => 'Leads created',
                'data' => $leads
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
        $leads = Leads::findOrFail($id);
        $response = [
            'message' => 'Detail Leads',
            'data' => $leads
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
        $leads = Leads::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'leads_id' => 'required|string|max:255',
            'leads_name' => 'required|string|max:255',
            'leads_email' => 'required|string|max:255',
            'leads_phone' => 'required|string|max:255',
            'source_id' => 'required|string|max:255',
            'media_id' => 'required|string|max:255',
            'status_id' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            // return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
            return response()->json(['errors'=>$validator->errors()]);
        }

        try{
            $leads->update($request->all());
            $leads->flag = 1;
            $response = [
                'message' => 'Leads created',
                'data' => $leads
            ];
            return response()->json($response, Response::HTTP_CREATED);
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
        $leads = Leads::findOrFail($id);
        try{
            $leads->delete();
            $response = [
                'message' => 'Leads has been delete',
            ];
            return response()->json($response, Response::HTTP_OK);
        }catch(QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo
            ]);
        }
    }
}
