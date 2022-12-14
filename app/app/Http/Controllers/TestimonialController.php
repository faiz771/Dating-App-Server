<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Repositories\Setting;
use App\Repositories\Testimonials;

class TestimonialController extends Controller
{
    protected $testimonial, $input, $setting;
    public function __construct(Testimonials $t, Setting $s, Request $req)
    {
        $this->testimonial      =   $t;
        $this->input            =   $req;
        $this->setting          =   $s;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->id == 1){
            $data = [
                'testimonials'  =>  $this->testimonial->all()
            ];
        }else{
            $data = [
                'testimonials'  =>  Testimonial::where('user_id',auth()->user()->id)->get(),
                'testimonialss'  =>  Testimonial::where('user_id',auth()->user()->id)->first()
            ];
        }

        return view('admin.settings.testimonials.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $alert = "";
        $data = [
            'name'          =>  auth()->user()->name,
            'rating'        =>  $this->input->rating,
            'comment'       =>  $this->input->comment,
            'id'            =>  $this->input->id,
            'user_id'       =>  auth()->user()->id,
        ];

        if($data['id'] != NULL){
            $data['image'] = UpdateUploadedFile($this->input->image,$this->input->existing_img,'testimonials_img');
        }else{
            $data['image'] = uploadFile($this->input->image,'testimonials_img');
        }

        $this->testimonial->save($data);
        if($data['id'] != NULL){
            return redirect($this->testimonial->page())->with('success', 'Testimonial Update Successfully');
        }else{
            return redirect($this->testimonial->page())->with('success', 'Testimonial Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial,$val)
    {
        $id = $this->setting->decrypt($val);
        $data = [
            'row'   =>  $this->testimonial->row($id)
        ];
        return view('admin.settings.testimonials.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->input->validate([
            'name'  =>  'required'
        ]);
        $data = [
            'name'          =>  $this->input->name,
            'rating'        =>  $this->input->rating,
            'description'   =>  $this->input->description,
        ];
        $this->testimonial->update($data, $this->input->id);
        return redirect($this->testimonial->page())->with('success', 'Testimonial Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $id = $this->setting->decrypt($this->input->id);
        $this->testimonial->delete($id);
        return redirect($this->testimonial->page())->with('delete', 'Testimonial Deleted Successfully');
    }
}
