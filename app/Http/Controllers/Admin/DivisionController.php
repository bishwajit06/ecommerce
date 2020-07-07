<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::latest()->get();
        return view('admin.division.index',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required | unique:divisions',
            'priority' => 'required | unique:divisions',
        ]);


        $division = new Division();
        $division->name = $request->name;
        $division->slug = Str::slug($request->name);
        $division->priority = $request->priority;
        $division->save();
        Toastr::success('Division Successfully Saved', 'Success');
        return redirect()->route('admin.division.index');
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
        $division = Division::find($id);
        return view('admin.division.edit',compact('division'));
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
        $division = Division::find($id);

        $this->validate($request,[
            'name' => 'required | unique:divisions,name,'.$division->id,
            'priority' => 'required',
        ]);



        $division->name = $request->name;
        $division->slug = Str::slug($request->name);
        $division->priority = $request->priority;
        $division->save();
        Toastr::success('Division Successfully Updated', 'Success');
        return redirect()->route('admin.division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
        if (!is_null($division)){
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district){

                $district->delete();
            }
            $division->delete();
            Toastr::success('Division Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            Toastr::error('Data not found', 'Error');
            return redirect()->back();
        }
    }
}
