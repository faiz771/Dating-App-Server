<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Crypt;
use App\Models\Testimonial;

class Testimonials{

    public function all()
    {
        return Testimonial::latest()->get();
    }

    public function row($id)
    {
        return Testimonial::findOrFail($id);
    }

    public function save($array)
    {
        $testimonial    = "";
        $arr            =   array_keys($array);
        if($array['id'] != NULL){
            $testimonial = Testimonial::findOrFail($array['id']);
        }
        else{
            $testimonial    =   new Testimonial;
        }
        foreach($arr as $key => $val){
            $testimonial->$val = $array[$val];
        }
        $testimonial->save();
        return true;
    }

    public function update($array,$id)
    {
        $arr            =   array_keys($array);
        $testimonial    =   Testimonial::findOrFail($id);
        foreach($arr as $key => $val){
            $testimonial->$val = $array[$val];
        }
        $testimonial->save();
        return true;
    }


    public function delete($id)
    {
        $testimonial    =   Testimonial::findOrFail($id);
        $testimonial->delete();
        return true;
    }

    public function page()
    {
        return url('/testimonials');
    }
}
