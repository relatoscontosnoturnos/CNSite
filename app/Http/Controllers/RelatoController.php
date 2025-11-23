<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\EnviarRelatoJob;

class RelatoController extends Controller
{
    public function enviar(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'mensagem' => 'required|string',
            'arquivo' => 'nullable|file|mimes:txt,pdf,doc,docx|max:10000',
        ]);

        // Dados do relato
        $data = [
            'nome'      => $request->nome ?? 'Anônimo',
            'email'     => $request->email ?? 'Não informado',
            'mensagem'  => $request->mensagem,
        ];

       $anexo = null;
       $anexoNome = null;

if ($request->hasFile('arquivo')) {
    $file = $request->file('arquivo');

    // Guarda o arquivo em storage/app/relatos
    $storedPath = $file->store('relatos');

    $anexo = storage_path('app/' . $storedPath); // caminho acessível pelo worker
    $anexoNome = $file->getClientOriginalName();
}

        // Dispara o Job (envia email em background)
        dispatch(new EnviarRelatoJob($data, $anexo, $anexoNome));

        // Retorno instantâneo ao usuário
        return redirect()->back()->with('success', 'Relato enviado com sucesso!');
    }
}
