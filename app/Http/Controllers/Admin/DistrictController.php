<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::latest()->get();
        return view('admin.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('admin.district.create',compact('divisions'));
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
            'name' => 'required | unique:districts',
            'division_id' => 'required',
        ]);


        $district = new District();
        $district->name = $request->name;
        $district->slug = Str::slug($request->name);
        $district->division_id = $request->division_id;
        $district->save();
        Toastr::success('District Successfully Saved', 'Success');
        return redirect()->route('admin.district.index');
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
        $district = District::find($id);
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('admin.district.edit',compact('district','divisions'));
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
        $this->validate($request,[
            'name' => 'required',
            'division_id' => 'required',
        ]);


        $district = District::find($id);
        $district->name = $request->name;
        $district->slug = Str::slug($request->name);
        $district->division_id = $request->division_id;
        $district->save();
        Toastr::success('District Successfully Saved', 'Success');
        return redirect()->route('admin.district.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        if (!is_null($district)){

            $district->delete();
            Toastr::success('Division Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            Toastr::error('Data not found', 'Error');
            return redirect()->back();
        }
    }
}
