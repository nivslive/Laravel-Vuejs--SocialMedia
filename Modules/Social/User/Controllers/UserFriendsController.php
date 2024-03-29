<?php

namespace Modules\Social\User\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Social\User\Models\UserFriend;

class UserFriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return UserFriend::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request) {
        $this->validate($request, [
            // aqui vão as regras de validação para o armazenamento do recurso
            // por exemplo:
            //'title' => 'required|string',
            //'body' => 'required|string',
        ]);

        UserFriend::create($request->all());
        return response()->json(['message' => 'Criado com sucesso'], 200);
    }
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            // aqui vão as regras de validação para o armazenamento do recurso
            // por exemplo:
            //'title' => 'required|string',
            //'body' => 'required|string',
        ]);

        $entity = UserFriend::create($request->all());

        return response()->json(['message' => 'Criado com sucesso', 'data' => $entity], 200);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function show($id)
    {
        $entity = UserFriend::find($id);

        if (!$entity) {
            return response()->json(['message' => 'Recurso não encontrado'], 404);
        }

        return response()->json(['data' => $entity], 200);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(Request $request, $id)
    {
        $entity = UserFriend::find($id);

        if (!$entity) {
            return response()->json(['message' => 'Recurso não encontrado'], 404);
        }

        $this->validate($request, [
            // aqui vão as regras de validação para a atualização do recurso
            // por exemplo:
            //'title' => 'string',
            //'body' => 'string',
        ]);

        $entity->update($request->all());

        return response()->json(['message' => 'Atualizado com sucesso', 'data' => $entity], 200);
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy($id)
    {
        $entity = UserFriend::find($id);

        if (!$entity) {
            return response()->json(['message' => 'Recurso não encontrado'], 404);
        }

        $entity->delete();

        return response()->json(['message' => 'Excluído com sucesso'], 200);
    }
}
