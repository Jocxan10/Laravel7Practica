<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();

        return response()->json($users,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $usuarios_domicilios = $request->input("domicilios");

        $data['password'] = bcrypt($data['password']);

        DB::beginTransaction();
        try{
            $user = User::create($data);

            $user->domicilios()->createMany($usuarios_domicilios);

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
        $user = User::find($id);

        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::where('id',$id)
            ->withTrashed()
            ->firstOrFail();

        $user->update($data);

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
        User::findOrFail($id)->delete();

        return response()->json(['result' => 'ok'],200);
    }
}
