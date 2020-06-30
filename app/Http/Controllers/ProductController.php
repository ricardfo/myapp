<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateproductRequest;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product) {
        $this->request = $request;
        $this->repository = $product;
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
        $products = Product::all(); //or Product::get();

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
        /*if ($request->file('photo')->isValid()) {
            #dd($request->photo->extension());
            #dd($request->photo->getClientOriginalName());
            //dd($request->photo->store('products'));
            $nameFile = $request->name . "." . $request->photo->extension();
            dd($request->photo->storeAs('products', $nameFile));
          }
         */
        $data = $request->only('name','description', 'price');

        //$this->repository->create($data);
        Product::create($data);

        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
        if(!$product = Product::find($id))
            return redirect()->back();

        return view('admin.pages.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$product = Product::find($id))
            return redirect()->back();

        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateproductRequest $request, $id)
    {
        if(!$product = Product::find($id))
            return redirect()->back();

        $product->update($request->all());

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->repository->find($id);
        if(!$product)
            return redirect()->back();

        $product->delete();

        return redirect()->route('products.index');

    }

    /**
     * Products search
    */
    public function search(Request $request)
    {
        //dd($request->all());
        $filters = $request->except('_token');
        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index', [
            'products' => $products,
            'filters' => $filters,
        ]);
    }
}
