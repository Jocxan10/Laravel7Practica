<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersDomiciliosRequest;
use App\Models\UserDomicilio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class UsersDomiciliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domicilios = UserDomicilio::get();

        return response()->json($domicilios,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersDomiciliosRequest $request)
    {
        $data = $request->all();

        DB::beginTransaction();
        try{
            $user = UserDomicilio::create($data);

            DB::commit();

            return response()->json($user,200);

        }catch (\Exception $e){
            Log::info($e->getMessage());
            DB::rollBack();
            return response()->json(['Error al guardar el Cliente.'],422);
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
        $user = UserDomicilio::find($id);

        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersDomiciliosRequest $request, $id)
    {
        $data = $request->all();

        $user = UserDomicilio::findOrFail($id)
            ->update($data);

        return response()->json($user,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserDomicilio::findOrFail($id)->delete();

        return response()->json(['result' => 'ok'],200);
    }
}
