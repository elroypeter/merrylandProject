<?php

namespace App\Http\Controllers;

use App\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    //  if(Auth::check()){
            $stream = Stream::create([
              'name'=>$request->input('stream')
            ]);

            if($stream){
              return redirect()->route('sclasses.create')
              ->with('success','Stream created successfully');
            }

            return back()->withErrors(['errors'=>'Error while creating stream make sure you are logged in'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function edit(Stream $stream)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stream $stream)
    {
        $stream->name = $request->input('update_name');
        $stream->save();
        return redirect()->route('sclasses.create')->with('success','stream updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stream  $stream
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
      //dd($company);
      $findstream = Stream::find( $stream->id );
      if($findstream->delete()){
      //redirect
      return redirect()->route('sclasses.create')->with('success','stream deleted successfully');
      }

      return back()->withInput()->with('errors','stream could not be deleted');
    }
}
