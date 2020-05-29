<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends controller
{
    public function index()
    {
        $products = ['Product01', 'Product02', 'Product03'];

        return  $products;
    }

    public function show($id)
    {
        return "Exibindo produto de id: {$id}";
    }

    public function create()
    {
        return "Exibindo forms de cadastro de produto";
    }

    public function edit($id)
    {
        return "O $id foi editado com sucesso.";
    }

    public function registre()
    {
        return 'Cadastrando novo produto';
    }

    public function update($id)
    {
        return "Alterado o produto {$id}";
    }

    public function destroy($id)
    {
        return "A produto {$id} foi deletado.";
    }
}
