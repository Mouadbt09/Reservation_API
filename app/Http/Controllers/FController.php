<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\flight;
class FController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f=flight::all();
        return view('admin',['f'=>$f]);
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
        $request->validate([
            'sc'=>'required|min:4',
            'ec'=>'required|min:4',
            'price'=>'required|integer'

        ]);
        $sc=$request->input('sc');
        $ec=$request->input('ec');
        $price=$request->input('price');
        $p=new flight();
        $p->Scity=$sc;
        $p->Ecity=$ec;
        $p->price=$price;
        $p->save();

        return back()
        ->with('success','You have successfully added a flight.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $f=flight::find($id);
        return view('edit',['f'=>$f]);
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
        $flight = flight::find($id);
        $request->validate([
            'Scity'=>'required|min:4',
            'Ecity'=>'required|min:4',
            'price'=>'required|integer'
        ]);
        $flight->price = $request->price;
        $flight->Scity = $request->Scity;
        $flight->Ecity = $request->Ecity;
        $flight->save();


        return redirect('/admin')
        ->with('success','You have successfully updated a flight.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fl=flight::find($id);
        $fl->delete();
        return back()
        ->with('success','You have successfully deleted a flight.');
    }
}
