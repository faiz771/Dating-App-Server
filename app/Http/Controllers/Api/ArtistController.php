<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ArtistModel;
use App\Models\TasteModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ArtistController extends Controller
{

    protected $res,$status;
    function __construct()
    {
        $this->res=new stdClass;
        $this->status=200;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if($request->input('search')){
                $this->res->artists=ArtistModel::where('artist','like','%'.$request->search.'%')->get();
            }else if(Auth::user()) {
                //return user's fav artists
                $taste=TasteModel::
                select('artist_id')->
                where('user_id',Auth::id())
                ->distinct()
                ->pluck('artist_id')
                ->get();
    
                $artists=ArtistModel::whereIn('id',$taste)
                ->orderBy('artist')
                ->get();
                $this->res->artists=$artists;
            }
        }catch(Exception $ex){
            $this->res->error=$ex->getMessage();
        }finally{
            return response()->json($this->res,$this->status);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
