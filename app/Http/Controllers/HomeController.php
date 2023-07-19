<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;


class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function ingredientes(Request $r)
    {
        return view('ingredientes');
    }

    public function ingredientesAcao(Request $r)
    {
        $client = new Client([
            'base_uri' => 'https://api.openai.com/v1/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY')
            ]
        ]);

        $response = $client->post('completions', [
            'json' => [
                'model' => "text-davinci-003",
                'prompt' => 'Gere uma receita incrível SOMENTE COM os seguintes ingredientes: ' . $r->ingredientes . 'Importante: se o usuário fornecer apenas um ingrediente, informe que é necessário adquirir mais ingredientes no mercado antes de criar a receita.',
                'temperature' => 0.5,
                'max_tokens' => 500
            ],
        ]);
        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            $viewData['receita'] = $data['choices'][0]['text'];
            $viewData['ingredientes'] = $r->ingredientes;
            return view('ingredientes', $viewData);
        }else{
            return ['error' => 'Deu algum Erro!'];
        }

    }
}
