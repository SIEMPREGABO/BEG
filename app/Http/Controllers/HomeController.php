<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome');
    }

    public function catalogo(Request $request)
    {
        $categorias = Category::all();
        $categoriasSeleccionadas = $request->input('categorias', []);

        if (empty($categoriasSeleccionadas)) {

            $categoriasConProductos = $categorias->map(function ($categoria) {
                // Paginación de productos por categoría
                //dd($categoria->id);

                $categoria->productosPaginados = $categoria->products()
                    ->orderBy('nombre')
                    ->paginate(6);
                return $categoria;
            });
        } else {
            $categoriasConProductos = Category::whereIn('id', $categoriasSeleccionadas)
                ->with(['products' => function ($query) {
                    $query->orderBy('nombre');
                }])
                ->get()
                ->filter(function ($categoria) {
                    return $categoria->products->isNotEmpty(); // Solo incluir categorías con productos
                })
                ->map(function ($categoria) {
                    // Paginación de los productos de la categoría
                    $categoria->productosPaginados = $categoria->products()->paginate(6);

                    return $categoria;
                });
        }


        // Filtra productos con precio entre 100 y 500.

        return view('store', compact('categoriasConProductos', 'categorias'));
    }

    public function categoria($categoria, Request $request)
    {

        $nombre = $request->nombre;
        $precios = $request->input('precios', []);
        $variante = $request->variante;
        // Determinar rango de precios
        $minPrecio = null;
        $maxPrecio = null;
        foreach ($precios as $rango) {
            if ($rango === '50000+') {
                $minPrecio = max($minPrecio ?? 0, 50000);
            } else {
                [$min, $max] = explode('-', $rango);
                $minPrecio = $minPrecio === null ? $min : min($minPrecio, $min);
                $maxPrecio = $maxPrecio === null ? $max : max($maxPrecio, $max);
            }
        }

        $category = Category::where('slug', $categoria)->firstOrFail();
        $products = $category->products()
            ->nombre($nombre)
            ->precio($minPrecio, $maxPrecio)
            ->variante($variante)
            ->paginate(12);
        return view('categoryStore', compact('category', 'products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $materialsEndurances = $product->materialsEndurances()->distinct()->get();
        $endurancesMaterial = $product->endurancesMaterials()->distinct()->get();
        $materials = $product->materials()->distinct()->get();
        $weightsLengths  = $product->weightsLengths()->distinct()->get();
        $lengthsWeights = $product->lengthsWeights()->distinct()->get();
        $lengths = $product->lengths()->distinct()->get();
        $weights =  $product->weights()->get();
        $sizes = $product->sizes()->distinct()->get();
        $wholesales = $product->wholesales()->distinct()->get();
        //$categoria = $product->categoria();
        $data = ['product' => $product];

        if ($materialsEndurances->isNotEmpty()) {
            $data['materialEndurances'] = $materialsEndurances;
        }

        if ($endurancesMaterial->isNotEmpty()) {
            $data['enduranceMaterials'] = $endurancesMaterial;
        }

        if ($materials->isNotEmpty()) {
            $data['materials'] = $materials;
        }

        if ($weightsLengths->isNotEmpty()) {
            $data['weightsLengths'] = $weightsLengths;
        }

        if ($lengthsWeights->isNotEmpty()) {
            $data['lengthsWeights'] = $lengthsWeights;
        }

        if ($lengths->isNotEmpty()) {
            $data['lengths'] = $lengths;
        }

        if ($weights->isNotEmpty()) {
            $data['weights'] = $weights;
        }

        if ($sizes->isNotEmpty()) {
            $data['sizes'] = $sizes;
        }

        if ($wholesales->isNotEmpty()) {
            $data['wholesales'] = $wholesales;
        }

        return view('product', $data);
    }

    public function contacto()
    {
        return view('contact');
    }

    public function carrito()
    {
        return view('cart');
    }

    public function pedidos()
    {
        //dd(Auth::user()->id);
        //$orders = Order::where('user_id', Auth::user()->id);

        $user = User::find(Auth::user()->id);
        $orders = $user->orders()->orderBy('created_at', 'desc')->get();
        foreach ($orders as $order) {
            $orderDetails = $order->details;
            $order->details_array = $orderDetails;
            foreach ($orderDetails as $detail) {
                // Obtén el producto relacionado con el detalle
                $product = $detail->product;
                // Agrega los atributos del producto al detalle
                $detail->product_attributes = $product->toArray();
            }
        }
        //dd($orders);
        //dd($orders);
        //dd($orders);
        return view('orders', compact('orders'));
    }
}
