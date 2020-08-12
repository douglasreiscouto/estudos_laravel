<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;

        //$this->middleware('auth');
        // $this->middleware('auth')->only([
        //     'create', 'store'
        // ]);
        // $this->middleware('auth')->except([
        //     'index', 'show'
        // ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        dd('ok');
        // $request->validate([
        //     'name' => 'required|min:3|max:255',
        //     'description' => 'nullable|min:3|max:10000',
        //     'photo' => 'required|image',
        // ]);
        // dd('ok');
        //dd($request->all()); retorna todas a informacoes do formulario
        //dd($request->only(['name', 'description'])); retorna somente as informacoes dos campos passado no array
        //dd($request->name); retorna somente o valor do campo selecinado
        //dd($request->has('name')); verifica se o campo existe e retorna true ou false para o campo passado no paramentro
        //dd($request->input('name', 'default')); verifica se o campo existe e retorna o valor caso o mesmo nao tenha cido informado ele retorna o valor default
        //dd($request->except('_token')); retorna todos os campos exeto o informado
        if ($request->file('photo')->isValid()) {
            //dd($request->file('photo')->store('products')); faz o upload de arquivos
            $nameFile = $request->name . '.' . $request->photo->extension();
            dd($request->file('photo')->storeAs('products', $nameFile));
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
        return "Detalhe do produto $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.products.edit', compact('id'));
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
        dd("Editando o produto {$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
