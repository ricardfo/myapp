<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateproductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request) {
        $this->request = $request;
        //$this->middleware('auth');
        $this->middleware('auth')->only([
//            'create',
//            'store',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teste = 123;
        $products = [1,2,3,4,5];
        return view('admin.pages.products.index', compact('teste','products'));
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
     * @param  \App\Http\Requests\StoreUpdateproductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateproductRequest $request)
    {
        /* validação não forma correta
        $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'nullable|min:3:max:1000',
            'photo' => 'required|image',
        ]);
         */

        #dd('Cadastrando');
        #dd($request->all());
        #dd($request->has('name'));
        #dd($request->only(['name','description']));
        #dd($request->name);
        #dd($request->except('_token'));
        #dd($request->file('photo')->isValid());
        if ($request->file('photo')->isValid()) {
            #dd($request->photo->extension());
            #dd($request->photo->getClientOriginalName());
            //dd($request->photo->store('products'));
            $nameFile = $request->name . "." . $request->photo->extension();
            dd($request->photo->storeAs('products', $nameFile));
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
        //
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
        dd("Editando...{$id}");
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
