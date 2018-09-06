<?php

namespace App\Http\Controllers;

use App\Sclass;
use App\SclassStream;
use App\Stream;
use App\StudentGroup;
use Illuminate\Http\Request;

class SclassController extends Controller
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
        $arr = [];
        $index = 0;

        $view_stream = Stream::all();
        $myclass = Sclass::all();
        $mylevel = StudentGroup::all();

        foreach ($myclass as $value) {
          $arr[$index] = $value;
          $index = $index + 1;
          // break;
        }

        // foreach ($arr[0]->sclassstream as $key) {
        //   $f = $key;
        //   break;
        // }
        // dd($f->stream->name);
        // dd($arr[0]->sclassstream);
        return view('class.create',['view_stream'=>$view_stream, 'mylevel'=>$mylevel, 'arr'=>$arr]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newclass = Sclass::create([
          'name'=>$request->input('classname'),
          'classnumber'=>$request->input('classnumber'),
          'level_id'=>$request->input('level')
        ]);

        if($newclass){
            return redirect()->route('sclasses.create')
            ->with('success','class created successfully');
          }else {
            return back()->withErrors(['errors'=>'Error while creating class'])->withInput();
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sclass  $sclass
     * @return \Illuminate\Http\Response
     */
    public function show(Sclass $sclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sclass  $sclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Sclass $sclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sclass  $sclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sclass $sclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sclass  $sclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sclass $sclass)
    {
        //
    }
}
