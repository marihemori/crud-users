<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('users', compact('users'));
    }

    public function create()
    {
        $title = 'Cadastrar novo usuário';

        return view("cadastrar");
    }

    public function edit($id)
    {
        $findedUser = $this->user->find($id);
        if ($findedUser) {
            return view('editar', ['user' => $findedUser]);
        }
        return redirect(route('user.list'));
    }

    public function update(Request $request, $id)
    {
        //Recupera todos os dados do formulario
        $dataForm = $request->all();
        $user = $this->user->find($id);

        //Valida os dados
        //$this->validate($request, $this->user->rules);
        $messages = [
            'name.required' => 'O campo Nome é de preenchimento obrigatório!',
            'email.required' => 'O campo E-Mail é de preenchimento obrigatório!',
            'password.required' => 'O campo Senha é de preenchimento obrigatório!',
            'password.min' => 'O campo Senha requer mais de 8 caracteres!',
            'password.max' => 'O campo Senha requer menos de 255 caracteres!',
        ];

        $validate = Validator::make($dataForm, $this->user->rules, $messages);
        if ($validate->fails()) {
            return redirect()
                ->route('user.edit', $user->id)
                ->withErrors($validate)
                ->withInput();
        } else {
            //Altera os dados
            $update = $user->update($dataForm);

            //Verifica se realmente houve mudança
            if ($update)
                return redirect()->route('user.list');
        }
    }

    public function store(Request $request)
    {
        //Pega todos os dados que vem do formulario
        $dataForm = $request->except('_token');

        //Valida os dados
        //$this->validate($request, $this->user->rules);
        $messages = [
            'name.required' => 'O campo Nome é de preenchimento obrigatório!',
            'email.required' => 'O campo E-Mail é de preenchimento obrigatório!',
            'password.required' => 'O campo Senha é de preenchimento obrigatório!',
            'password.min' => 'O campo Senha requer mais de 8 caracteres!',
            'password.max' => 'O campo Senha requer menos de 255 caracteres!',
        ];

        $validate = Validator::make($dataForm, $this->user->rules, $messages);
        if ($validate->fails()) {
            return redirect()
                ->route('user.create')
                ->withErrors($validate)
                ->withInput();
        } else {
            //Faz o cadastro
            $insert = $this->user->create($dataForm);

            if ($insert)
                return redirect()->route('user.list');
        }
    }

    public function delete($id)
    {
        $user = $this->user->find($id);

        $delete = $user->delete();
    }
}
