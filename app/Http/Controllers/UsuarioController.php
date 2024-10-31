<?php


namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all(); // Busca todos os usuários do banco de dados
        return view('usuarios.index', compact('usuarios')); // Retorna a view com os dados dos usuários
    }


    public function create()
    {
        return view('usuarios.create'); // Retorna a view para criar um novo usuário
    }


    public function store(Request $request)
    {
        // Valida os dados recebidos
        $request->validate([
            'usuario' => 'required|unique:usuarios',
            'senha' => 'required',
        ]);


        // Cria um novo usuário com os dados validados
        Usuario::create([
            'usuario' => $request->usuario,
            'senha' => bcrypt($request->senha), // Hash da senha
        ]);


        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso.');
    }


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id); // Busca o usuário pelo ID ou retorna 404 se não encontrado
        return view('usuarios.edit', compact('usuario')); // Retorna a view de edição do usuário
    }


    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $request->validate([
            'usuario' => 'required|unique:usuarios,usuario,' . $id,
            'senha' => 'required',
        ]);
        // Busca o usuário pelo ID
        $usuario = Usuario::findOrFail($id);
        // Atualiza os dados do usuário
        $usuario->update([
            'usuario' => $request->usuario,
            'senha' => bcrypt($request->senha), // Hash da senha
        ]);
        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso.');
    }


    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete(); // Busca o usuário e o exclui
        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso.');
    }
}
