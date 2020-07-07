<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('priority', 'asc')->get();
        return view('admin.slider.index',compact('sliders'));
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
        $this->validate($request,[
            'title' => 'required',
            'image' => 'required|image'
        ],
         [
             'title.required' => 'Please provide a slider title',
             'image.image' => 'Please provide a valid slider image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

        // get from image
        $sliderImage = $request->file('image');
        $slug = Str::slug($request->title);
        if (isset($sliderImage))
        {
//          Make unique name for image
            $currentdate = Carbon::now()->toDateString();
            $sliderImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$sliderImage->getClientOriginalExtension();

//          Check Category directory is exists
            if (!Storage::disk('public')->exists('sliders'))
            {
                Storage::disk('public')->makeDirectory('sliders');
            }
//          Resize image for category and upload
            $slider = Image::make($sliderImage)->resize(850,360)->stream();
            Storage::disk('public')->put('sliders/'.$sliderImageName,$slider);

        }else{
            $sliderImageName = "default.png";
        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->button_text = $request->button_text;
        $slider->description = $request->description;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        $slider->image = $sliderImageName;
        $slider->save();
        Toastr::success('Slider Item Successfully Saved', 'Success');
        return back();
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
        $this->validate($request,[
            'title' => 'required',
            'image' => 'nullable|image'
        ],
         [
             'title.required' => 'Please provide a slider title',
             'image.image' => 'Please provide a valid slider image with .jpg, .png, .gif, .jpeg extension',
         ]
         );

        // get from image
        $sliderImage = $request->file('image');
        $slug = Str::slug($request->title);
        $slider = Slider::find($id);
        if (isset($sliderImage))
    {
//          Make unique name for image
        $currentdate = Carbon::now()->toDateString();
        $sliderImageName = $slug.'-'.$currentdate.'-'.uniqid().'.'.$sliderImage->getClientOriginalExtension();

//          Check sliders directory is exists
        if (!Storage::disk('public')->exists('sliders'))
        {
            Storage::disk('public')->makeDirectory('sliders');
        }

//          Delete old image
        if (Storage::disk('public')->exists('sliders/'.$slider->image))
        {
            Storage::disk('public')->delete('sliders/'.$slider->image);
        }

//          Resize image for sliders and upload
        $sliderImageSize = Image::make($sliderImage)->resize(850,360)->stream();
        Storage::disk('public')->put('sliders/'.$sliderImageName,$sliderImageSize);

    }else{
        $sliderImageName = $slider->image;
    }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->button_text = $request->button_text;
        $slider->description = $request->description;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        $slider->image = $sliderImageName;
        $slider->save();
        Toastr::success('Slider Item Successfully Updated', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        if (!is_null($slider)){
            if (Storage::disk('public')->exists('sliders/'.$slider->banner_image))
            {
                Storage::disk('public')->delete('sliders/'.$slider->banner_image);
            }

            $slider->delete();
            Toastr::success('slider Successfully Deleted', 'Success');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
