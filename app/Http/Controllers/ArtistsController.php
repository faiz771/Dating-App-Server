<?php

namespace App\Http\Controllers;
use App\Models\ArtistModel;
use Illuminate\Http\Request;
//use App\Repositories\ArtistModel;

class ArtistsController extends Controller
{
    protected $pkg, $input;
    public function __construct(ArtistModel $pkg, Request $r)
    {
   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'artists'  =>  ArtistModel::All(),
        ];
       
        return view('admin.artists.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $data = [
            'artists'  =>  $this->ArtistModel->allArtistModel(),
          
        ];
    
        return view('admin.artists.create', $data);
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
            'services'          =>      'required',
         // 'name'              =>      'required',
            'price'             =>      'required|numeric',
            'type'              =>      'required'
        ]);

        if(!empty($request->comservice_more)){
            $request->validate([
                'comservice_more'          =>      'required',
            ]);
        }

        if ($request->id != NULL){
            $ArtistModel                    =   ArtistModel::findOrFail($request->id);
            $ArtistModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'ArtistModel_imgs');
        }else{
            $ArtistModel = new ArtistModel;
            $ArtistModel->image             =   uploadFile($request->image, 'ArtistModel_imgs');
        }

        if(!empty($request->addon)){    
            $ArtistModel->service_ids       =   json_encode($request->services);
            // $ArtistModel->AddonServices     =   $request->addon;
            $ArtistModel->price             =   $request->price;
            $ArtistModel->complementary     =   $request->comservice_more;
            $ArtistModel->type              =   $request->type;
            $ArtistModel->discount          =   $request->discount;
        }else{
            $ArtistModel->service_ids       =   json_encode($request->services);
            $ArtistModel->price             =   $request->price;
            $ArtistModel->complementary     =   $request->comservice_more;
            $ArtistModel->type              =   $request->type;
            $ArtistModel->discount          =   $request->discount;
        }

        $ArtistModel->save();

        if($request->id != NULL){
            return redirect('/ArtistModels')->with('success', 'ArtistModel Updated Successfully');
        }else{
            return redirect('/ArtistModels')->with('success', 'ArtistModel Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtistModel  $ArtistModel
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $ArtistModel)
    {
        $id = $this->pkg->decryptId($this->input->id);
        $data = [
            'ArtistModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies()
        ];

        return view('admin.artists.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtistModel  $ArtistModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtistModel $artistmodel, $val)
    {
        $id = $this->pkg->decryptId($val);


        $data = [
            'ArtistModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies(),
            'AddOnsServices'  =>  $AddOnsServices,
            'ArtistModel_types' =>  $ArtistModel_cats,
        ];
        return view('admin.artist.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArtistModel  $ArtistModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArtistModel $ArtistModel)
    {
        $request->validate([
            'service_ids.*'     =>      'required',
            // 'name'              =>      'required',
            // 'price'             =>      'required|numeric',
            'type'              =>      'required'
        ]);

        $ArtistModel                    =   ArtistModel::findOrFail($request->id);
        $ArtistModel->service_ids       =   json_encode($request->service_ids);
        // $ArtistModel->AddonServices     =   $request->addon;
        $ArtistModel->complementary     =   $request->comservice_more;
        $ArtistModel->price             =   $request->price;
        $ArtistModel->type              =   $request->type;
        $ArtistModel->discount          =   $request->discount;
        $ArtistModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'ArtistModel_imgs');
        $ArtistModel->save();

        return redirect('/ArtistModels')->with('success', 'ArtistModel Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtistModel  $ArtistModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtistModel $ArtistModel, $val)
    {
        $id = $this->pkg->decryptId($val);
        $pkg = $this->pkg->delete($id);
        $pkg->delete();
        return back()->with('delete', 'ArtistModel Deleted Successfully');
    }

    public function getPkgServiceById()
    {
        $id = $this->input->id;
        return $this->pkg->serviceById($id);
    }
}
