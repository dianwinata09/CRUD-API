<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormater;
use App\Http\Controllers\Controller;
use App\Models\siswa;
use Exception;
use Illuminate\Http\Request;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();

        if($data){
            return ApiFormater::createApi(200, 'Success', $data);
        }else{
            return ApiFormater::createApi(400, 'Failed');
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
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);
                
            $siswa = siswa::create([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = siswa::where('id', '=', $siswa->id)->get();

            if($data){
                return ApiFormater::createApi(200, 'Success', $data);
            }else{
                return ApiFormater::createApi(400, 'Failed');
            }
        }catch(Exception $error){
            return ApiFormater::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = siswa::where('id', '=', $id)->get();

        if($data){
            return ApiFormater::createApi(200, 'Success', $data);
        }else{
            return ApiFormater::createApi(400, 'Failed');
        }
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
        try {
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);
                
            $siswa = siswa::findOrFail($id);

            $siswa->update([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = siswa::where('id', '=', $siswa->id)->get();

            if($data){
                return ApiFormater::createApi(200, 'Success', $data);
            }else{
                return ApiFormater::createApi(400, 'Failed');
            }
        }catch(Exception $error){
            return ApiFormater::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = siswa::findOrFail($id);

        $data = $siswa->delete();

        if($data){
            return ApiFormater::createApi(200, 'Success Destory Data');
        }else{
            return ApiFormater::createApi(400, 'Failed');
        }
    }
}
