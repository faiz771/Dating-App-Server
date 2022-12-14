<?php

namespace App\Http\Controllers;
use App\Models\LikeModel;
use Illuminate\Http\Request;
//use App\Repositories\LikesModel;

class LikesController extends Controller
{
    protected $pkg, $input;
    public function __construct(LikeModel $pkg, Request $r)
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
            'likes'  =>  LikeModel::All(),
        ];
     
        return view('admin.likes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $data = [
            'likes'  =>  $this->LikesModel->allLikesModel(),
          
        ];
        return view('admin.likes.create', $data);
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
            $LikesModel                    =   LikesModel::findOrFail($request->id);
            $LikesModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'LikesModel_imgs');
        }else{
            $LikesModel = new LikesModel;
            $LikesModel->image             =   uploadFile($request->image, 'LikesModel_imgs');
        }

        if(!empty($request->addon)){    
            $LikesModel->service_ids       =   json_encode($request->services);
            // $LikesModel->AddonServices     =   $request->addon;
            $LikesModel->price             =   $request->price;
            $LikesModel->complementary     =   $request->comservice_more;
            $LikesModel->type              =   $request->type;
            $LikesModel->discount          =   $request->discount;
        }else{
            $LikesModel->service_ids       =   json_encode($request->services);
            $LikesModel->price             =   $request->price;
            $LikesModel->complementary     =   $request->comservice_more;
            $LikesModel->type              =   $request->type;
            $LikesModel->discount          =   $request->discount;
        }

        $LikesModel->save();

        if($request->id != NULL){
            return redirect('/LikesModels')->with('success', 'LikesModel Updated Successfully');
        }else{
            return redirect('/LikesModels')->with('success', 'LikesModel Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LikesModel  $LikesModel
     * @return \Illuminate\Http\Response
     */
    public function show(like $LikesModel)
    {
        $id = $this->pkg->decryptId($this->input->id);
        $data = [
            'LikesModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies()
        ];

        return view('admin.likes.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LikesModel  $LikesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(LikesModel $likesmodel, $val)
    {
        $id = $this->pkg->decryptId($val);


        $data = [
            'LikesModel'   =>  $this->pkg->edit($id),
            'services'  =>  $this->pkg->allServies(),
            'AddOnsServices'  =>  $AddOnsServices,
            'LikesModel_types' =>  $LikesModel_cats,
        ];
        return view('admin.likes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LikesModel  $LikesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikesModel $LikesModel)
    {
        $request->validate([
            'service_ids.*'     =>      'required',
            // 'name'              =>      'required',
            // 'price'             =>      'required|numeric',
            'type'              =>      'required'
        ]);

        $LikesModel                    =   LikesModel::findOrFail($request->id);
        $LikesModel->service_ids       =   json_encode($request->service_ids);
        // $LikesModel->AddonServices     =   $request->addon;
        $LikesModel->complementary     =   $request->comservice_more;
        $LikesModel->price             =   $request->price;
        $LikesModel->type              =   $request->type;
        $LikesModel->discount          =   $request->discount;
        $LikesModel->image             =   UpdateUploadedFile($request->image, $request->ext_img, 'LikesModel_imgs');
        $LikesModel->save();

        return redirect('/songs')->with('success', 'Song Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LikesModel  $LikesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikesModel $LikesModel, $val)
    {
        $id = $this->pkg->decryptId($val);
        $pkg = $this->pkg->delete($id);
        $pkg->delete();
        return back()->with('delete', 'like Deleted Successfully');
    }

    public function getPkgServiceById()
    {
        $id = $this->input->id;
        return $this->pkg->serviceById($id);
    }
}
