<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        $status = '';
        $n = 1;
        return view('admin.faq.index',compact('faqs','n','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFaqRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function faqs_filter_byStatus(Request $request)
    {
        if($request->status == 'all'){
            return redirect()->route('faq.index');
        }else{
            $faqs = Faq::where('type',$request->status)->get();
            $data = [
                'faqs'    =>  $faqs,
                'status'    =>  $request->status,
                'n'    =>  1
            ];

            return view('admin.faq.index', $data);
        }
    }

    public function store(StoreFaqRequest $request)
    {
        $request->validate([
            'question'=> 'required',
            'answer'=> 'required',
            'type'=> 'required',
        ]);

            $Faq = Faq::create([
                'question' => $request->input('question'),                        
                'answer' => $request->input('answer'),                       
                'type' => $request->input('type'),                       
                'status' => 0,                      
            ]);

        return redirect()->route('faq.index')->with('success','Faq has been Added.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findorFail($id);
        return view('admin.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFaqRequest  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request,$id)
    {
        $request->validate([
            'question'=> 'required',
            'answer'=> 'required',
            'type'=> 'required',
        ]);
        
        $Faq = Faq::findorFail($id);

        $Faq->update([
            'question' => $request->input('question'),     
            'type' => $request->input('type'),                      
            'answer' => $request->input('answer'),                       
        ]);

        return redirect()->route('faq.index')->with('success','Faq has been Update.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($val)
    {
        $faq = Faq::findorFail($val)->delete();
        return back()->with('delete','Faq deleted successfully');
    }
}
