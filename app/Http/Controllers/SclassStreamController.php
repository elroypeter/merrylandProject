<?php

namespace App\Http\Controllers;

use App\SclassStream;
use App\Stream;
use Illuminate\Http\Request;

class SclassStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = SclassStream::all();
        return view('class.index', ['class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $check = SclassStream::where('sclass_id',$request->input('class_id'))
                          ->where('stream_id',$request->input('stream_id'))->first();
      // dd($check);
      if(!$check){
            $newclassstream = SclassStream::create([
              'sclass_id'=>$request->input('class_id'),
              'stream_id'=>$request->input('stream_id')
            ]);
            if($newclassstream){
                return redirect()->route('sclasses.create')
                ->with('success','class assigned successfully');
              }else {
                return back()->withErrors(['errors'=>'Error while creating stream-class assignment'])->withInput();
              }
            }else {
              return back()->withErrors(['errors'=>'Class-stream assignment already exists!!!'])->withInput();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SclassStream  $sclassStream
     * @return \Illuminate\Http\Response
     */
    public function show(SclassStream $sclassStream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SclassStream  $sclassStream
     * @return \Illuminate\Http\Response
     */
    public function edit(SclassStream $sclassStream)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SclassStream  $sclassStream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SclassStream $sclassStream)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SclassStream  $sclassStream
     * @return \Illuminate\Http\Response
     */
    public function destroy(SclassStream $sclassStream)
    {
        //
    }
}
