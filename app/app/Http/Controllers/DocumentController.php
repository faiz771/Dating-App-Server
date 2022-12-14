<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Crypt;
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::where('user_id',auth()->user()->id)->get();
        $n = 1;
        return view('admin.user_documents.index',compact('documents','n'));
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
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {

        // $request->validate([
        //     'docment' => 'required|mimes:pdf,docx,doc,xml|max:7000',
        // ]);

        if($file = $request->file('docment')) {
            foreach ($request->file('docment') as $image) {
                $name = rand(0,100000).'.'. $image->extension();
                $image->move(public_path().'/customer_documents/', $name);  
                // $image_names[] = $name;

                $Document = Document::create([
                    'file' => $name,                                              
                    'desc' => $request->input('Description'),                                              
                    'user_id' => $request->input('id'),                                              
                    'status' => 0,                      
                ]);
            }
        } 

        return back()->with('success', 'Customer Document has been uploaded Successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document,$id)
    {
        $id = Crypt::decrypt($id);
        return view('admin.user_documents.create',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('admin.user_documents.view',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($val)
    {
        $State = Document::findorFail($val)->delete();
        return back()->with('delete','This Document has been deleted');
    }
}
