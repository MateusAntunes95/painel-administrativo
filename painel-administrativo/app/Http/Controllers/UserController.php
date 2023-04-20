<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use App\Repositories\User\ListarRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request, ListarRepository $listarRepository)
    {
        $dados = $listarRepository->listar($request->all())->get();

        return view('user.index')
            ->with(compact('dados'));
    }

    public function create()
    {
        $user = new User();
        return view('user.create')
            ->with(compact('user'));
    }

    public function store(UserFormRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->saveOrFail();

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('user.edit')
            ->with(compact('user'));
    }

    public function update(UserFormRequest $request, User $user)
    {
        $user = User::find($user->id);
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->saveOrFail();

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
    }
}
