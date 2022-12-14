<?php

namespace App\Http\Controllers;
use App\Models\SongModel;
use Illuminate\Http\Request;
//use App\Repositories\SongModel;

class SongsController extends Controller
{
    protected $pkg, $input;
    public function __construct(SongModel $pkg, Request $r)
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
            'songs'  =>  SongModel::All(),
        ];
       
        return view('admin.songs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $data = [
            'song'  =>  $this->SongModel->allSongModel(),
          
        ];
        return view('admin.songs.create', $data);
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
            $SongModel                    =   SongModel::findOrFail($request->id);
            $SongModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'SongModel_imgs');
        }else{
            $SongModel = new SongModel;
            $SongModel->image             =   uploadFile($request->image, 'SongModel_imgs');
        }

        if(!empty($request->addon)){    
            $SongModel->service_ids       =   json_encode($request->services);
            // $SongModel->AddonServices     =   $request->addon;
            $SongModel->price             =   $request->price;
            $SongModel->complementary     =   $request->comservice_more;
            $SongModel->type              =   $request->type;
            $SongModel->discount          =   $request->discount;
        }else{
            $SongModel->service_ids       =   json_encode($request->services);
            $SongModel->price             =   $request->price;
            $SongModel->complementary     =   $request->comservice_more;
            $SongModel->type              =   $request->type;
            $SongModel->discount          =   $request->discount;
        }

        $SongModel->save();

        if($request->id != NULL){
            return redirect('/SongModels')->with('success', 'SongModel Updated Successfully');
        }else{
            return redirect('/SongModels')->with('success', 'SongModel Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SongModel  $SongModel
     * @return \Illuminate\Http\Response
     */
    public function show(Song $SongModel)
    {
        $id = $this->pkg->decryptId($this->input->id);
        $data = [
            'SongModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies()
        ];

        return view('admin.songs.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SongModel  $SongModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SongModel $songmodel, $val)
    {
        $id = $this->pkg->decryptId($val);


        $data = [
            'SongModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies(),
            'AddOnsServices'  =>  $AddOnsServices,
            'SongModel_types' =>  $SongModel_cats,
        ];
        return view('admin.songs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SongModel  $SongModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SongModel $SongModel)
    {
        $request->validate([
            'service_ids.*'     =>      'required',
            // 'name'              =>      'required',
            // 'price'             =>      'required|numeric',
            'type'              =>      'required'
        ]);

        $SongModel                    =   SongModel::findOrFail($request->id);
        $SongModel->service_ids       =   json_encode($request->service_ids);
        // $SongModel->AddonServices     =   $request->addon;
        $SongModel->complementary     =   $request->comservice_more;
        $SongModel->price             =   $request->price;
        $SongModel->type              =   $request->type;
        $SongModel->discount          =   $request->discount;
        $SongModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'SongModel_imgs');
        $SongModel->save();

        return redirect('/songs')->with('success', 'Song Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SongModel  $SongModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SongModel $SongModel, $val)
    {
        $id = $this->pkg->decryptId($val);
        $pkg = $this->pkg->delete($id);
        $pkg->delete();
        return back()->with('delete', 'Song Deleted Successfully');
    }

    public function getPkgServiceById()
    {
        $id = $this->input->id;
        return $this->pkg->serviceById($id);
    }
}
