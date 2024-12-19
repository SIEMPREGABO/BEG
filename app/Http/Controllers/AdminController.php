<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeRequest;
use App\Http\Requests\RegisterAdminRequest;
use App\Mail\Notification;
use App\Models\Category;
use App\Models\Code;
use App\Models\Endurance;
use App\Models\Length;
use App\Models\Material;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use App\Models\Suscriptor;
use App\Models\User;
use App\Models\Weight;
use App\Models\Wholesale;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isEmpty;

class AdminController extends Controller
{
    public function panel()
    {
        $users = User::paginate(10);
        $products = Product::paginate(10);
        //dd($users);
        //pedidos
        //$notis = ;

        //$codigos = ;

        return view('dashboard', compact('users', 'products'));
    }

    public function usuarios()
    {
        $usuarios = User::with('latestOrder')->paginate(10);
        //dd($usuarios);
        return view('usuarios', compact('usuarios'));
    }

    public function registrarAdmin()
    {
        return view('admin');
    }

    public function notificacionesAdministrador()
    {
        return view('notificaciones');
    }

    public function enviarNotificacion(Request $request)
    {
        $request->validate([
            'subject' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóú0-9._-]+$/',
            'header' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóú0-9._-]+$/',
            'body' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóú0-9._-]+$/',
            'dropzone-file' => 'nullable|image|mimes:jpg|max:2048',
            'footer' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóú0-9._-]+$/',
        ]);

        $imagePath = null;
        //dd($request);

        if (!is_null($request->file('dropzone-file'))) {

            $image = $request->file('dropzone-file');
            //$imageName = $request->input('slug') . '.jpg';
            $imageName = 'Notificacion' . '.jpg';
            //dd($imageName);
            //$imagePath = $request->file('image')->store($imageName, 'public');
            $imagePath = public_path('images/' . $imageName);
            //dd($imagePath);
            // Verificar si ya existe una foto con el mismo nombre y eliminarla
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la foto anterior
            }

            // Mover la nueva foto al directorio 'images'
            $image->move(public_path('images'), $imageName);
        }

        // Combinar correos de usuarios y suscriptores

        $emails = array_merge(
            User::pluck('email')->toArray(),
            Suscriptor::pluck('email')->toArray()
        );


        foreach ($emails as $email) {

            Mail::to($email)->send(
                new Notification(
                    $request->subject,
                    $request->header,
                    $request->body,
                    $request->footer,
                    $imagePath

                )
            );
        }

        return redirect()->back()->with(['success' => 'Correos enviados exitosamente.']);
    }

    public function registroAdmin(RegisterAdminRequest $request)
    {

        $cliente = new User();
        $cliente->nombre_pila = $request->nombre_pila;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->email = $request->email;
        $cliente->celular = $request->celular;
        $cliente->password = Hash::make($request->password);

        do {
            $token = Str::random(10);
        } while (User::where('remember_token', $token)->exists());

        $cliente->remember_token = $token;
        $cliente->email_verified_at = now();
        $cliente->created_at = now();
        $cliente->updated_at = now();
        $cliente->isAdmin = true;
        $cliente->mayorista = false;
        $cliente->save();

        return redirect()->route('Panel')
            ->with('success', '¡Registro exitoso!');
    }


    public function eliminarUsuario(Request $request)
    {
        $userId = $request->id_user;

        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('success', 'Usuario eliminado correctamente.');
    }

    public function pedidos()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        //$orders = $user->orders()->orderBy('created_at', 'desc')->get();
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

        return view('ordersAdmin', compact('orders'));
    }

    public function codigos()
    {
        $codigos = Code::all();
        return view('codigos', compact('codigos'));
    }

    public function productos()
    {
        $categorias = Category::all(); // Obtener todas las categorías

        $categoriasConProductos = $categorias->map(function ($categoria) {
            // Paginación de productos por categoría
            $categoria->productosPaginados = $categoria->products()->orderBy('nombre')->get();
            //dd($categoria->productosPaginados);
            return $categoria;
        });

        //dd($categoriasConProductos);

        //return $categoriasConProductos;
        return view('products', compact('categoriasConProductos'));
    }

    public function editarProducto($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $allMaterials = Material::all();
        $allEndurances = Endurance::all();
        $allWeights = Weight::all();
        $allLengths = Length::all();
        $allWholesales = Wholesale::all();
        $allSizes = Size::all();

        //$materialsEndurances = $product->materialsEndurances()->distinct()->get();
        //$endurancesMaterial = $product->endurancesMaterials()->distinct()->get();
        //$materials = $product->materials()->pluck('id')->toArray();

        //$weightsLengths  = $product->weightsLengths()->distinct()->get();
        //$lengthsWeights = $product->lengthsWeights()->distinct()->get();
        //$lengths = $product->lengths()->pluck('id')->toArray();

        $materialsEndurances = $product->materialsEndurances()
            ->withPivot('id', 'endurance_id', 'precio', 'material_id')
            ->get()
            ->map(function ($material) {
                return [
                    'id' => $material->pivot->id,
                    'material_id' => $material->id,
                    'endurance_id' => $material->pivot->endurance_id,
                    'precio' => $material->pivot->precio
                ];
            })->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()->toArray();

        $weightsLengths = $product->weightsLengths()
            ->withPivot('id', 'length_id', 'precio', 'weight_id')
            ->get()
            ->map(function ($weight) {
                return [
                    'id' => $weight->pivot->id,
                    'weight_id' => $weight->id,
                    'length_id' => $weight->pivot->length_id,
                    'precio' => $weight->pivot->precio
                ];
            })->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()->toArray();

        /*$materials = DB::table('materials')
            ->join('material_product', 'materials.id', '=', 'material_product.material_id')
            ->where('material_product.product_id', $product->id)
            ->pluck('materials.id')->toArray();
        */
        $materials = $product->materials()
            ->withPivot('id', 'material_id', 'precio')
            ->get()
            ->map(function ($material) {
                return [
                    'id' => $material->pivot->id,
                    'material_id' => $material->id,
                    'precio' => $material->pivot->precio
                ];
            })->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()->toArray();

        /*$lengths = DB::table('lengths')
            ->join('length_product', 'lengths.id', '=', 'length_product.length_id')
            ->where('length_product.product_id', $product->id)
            ->pluck('lengths.id')->toArray();
            */

        $lengths = $product->lengths()
            ->withPivot('id', 'length_id', 'precio')
            ->get()
            ->map(function ($length) {
                return [
                    'id' => $length->pivot->id,
                    'length_id' => $length->id,
                    'precio' => $length->pivot->precio
                ];
            })
            ->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values() // Reindexar los índices después de ordenar
            ->toArray();

        /*$weights = DB::table('weights')
            ->join('weight_product', 'weights.id', '=', 'weight_product.weight_id')
            ->where('weight_product.product_id', $product->id)
            ->pluck('weights.id')->toArray();*/

        $weights = $product->weights()
            ->withPivot('id', 'weight_id', 'precio')
            ->get()
            ->map(function ($weight) {
                return [
                    'id' => $weight->pivot->id,
                    'weight_id' => $weight->id,
                    'precio' => $weight->pivot->precio
                ];
            })
            ->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()
            ->toArray();

        /*$sizes = DB::table('sizes')
            ->join('size_product', 'sizes.id', '=', 'size_product.size_id')
            ->where('size_product.product_id', $product->id)
            ->pluck('size_product.precio', 'sizes.id')->toArray();
        */
        $sizes = $product->sizes()
            ->withPivot('id', 'size_id', 'precio')
            ->get()
            ->map(function ($size) {
                return [
                    'id' => $size->pivot->id,
                    'size_id' => $size->id,
                    'precio' => $size->pivot->precio
                ];
            })->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()->toArray();

        /*$wholesales = DB::table('wholesales')
            ->join('wholesale_product', 'wholesales.id', '=', 'wholesale_product.wholesale_id')
            ->where('wholesale_product.product_id', $product->id)
            ->pluck('wholesales.id')->toArray();*/

        $wholesales = $product->wholesales()
            ->withPivot('id', 'wholesale_id', 'precio')
            ->get()
            ->map(function ($wholesale) {
                return [
                    'id' => $wholesale->pivot->id,
                    'wholesale_id' => $wholesale->id,
                    'precio' => $wholesale->pivot->precio
                ];
            })->sortByDesc('precio') // Ordenar por 'precio' en orden descendente
            ->values()->toArray();

        //dd($weights);



        $data = [
            'wholesales' => $wholesales ?? [],
            'materialsEndurances' => $materialsEndurances ?? [],
            'materials' => $materials ?? [],
            'weightsLengths' => $weightsLengths ?? [],
            'lengths' => $lengths ?? [],
            'weights' => $weights ?? [],
            'sizes' => $sizes ?? [],
        ];

        //dd($data);

        // Filtrar las claves con valores no vacíos
        $data = array_filter($data, function ($value) {
            return !empty($value);
        });

        //$data = array_filter($data, function ($value) {
        //    return !empty($value);
        //});

        //dd($data);

        $data['product'] = $product;
        $data['allMaterials'] = $allMaterials;
        $data['allEndurances'] = $allEndurances;
        $data['allWeights'] = $allWeights;
        $data['allLengths'] = $allLengths;
        $data['allWholesales'] = $allWholesales;
        $data['allSizes'] = $allSizes;


        return view('editProduct', $data);
        /*
        return view('editProduct', [
            'product' => $product,
            'allMaterials' => $allMaterials,
            'allEndurances' => $allEndurances,
            'allWeights' => $allWeights,
            'allLengths' => $allLengths,
            'allWholesales' => $allWholesales,
            'allSizes' => $allSizes,
            
            'materialsEndurances' => $materialsEndurances,
            'weightsLengths' => $weightsLengths,

            'materials' => $materials,
            'lengths' => $lengths,
            'weights' => $weights,
            'sizes' => $sizes,
            'wholesales' => $wholesales,

        ]);*/

        //return view('product', $data);
    }

    public function almacenarProducto(Request $request)
    {
        $request->validate([
            'dropzone-file' => 'required|image|mimes:jpg|max:2048', // Solo JPG y máximo 2 MB
            'nombre' => 'required|unique:products,nombre|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\/\(\)]+$/u',
            'slug' => 'required|unique:products,slug|regex:/^[a-zA-Z0-9-]+$/',
            'category' => 'required',


        ]);
        $product = new Product();
        $product->nombre = $request->nombre;
        $product->slug = $request->slug;
        $product->category_id = $request->category;
        $product->mayoreo = 0;

        if (!is_null($request->file('dropzone-file'))) {
            $request->validate([
                'dropzone-file' => 'required|image|mimes:jpg|max:2048', // Solo JPG y máximo 2 MB
            ]);
            $image = $request->file('dropzone-file');
            $imageName = $request->input('slug') . '.jpg';
            //dd($imageName);
            //$imagePath = $request->file('image')->store($imageName, 'public');
            $imagePath = public_path('images/' . $imageName);
            //dd($imagePath);
            // Verificar si ya existe una foto con el mismo nombre y eliminarla
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la foto anterior
            }

            // Mover la nueva foto al directorio 'images'
            $image->move(public_path('images'), $imageName);
        }

        //dd($request);
        if ($request->has('variante')) {
            $request->validate([
                'Tipo' => 'required',
            ]);
            $product->variante = 1;


            // Insertar la variante asociada
            //$data = [
            //    'product_id' => $product->id, // ID del producto recién creado
            //    'tipo' => $request->Tipo,
            //    'precio' => $request->varianteprecio,
            //];

            if ($request->varianteweight !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                $varianteweight[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'weight_id' => $request->varianteweight, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('weight_product')->insert($varianteweight);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->variantewholesale !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                $variantewholesale[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'wholesale_id' => $request->variantewholesale, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('wholesale_product')->insert($variantewholesale);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->variantematerial !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                //dd('pase');
                $product->save();
                $variantematerial[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'material_id' => $request->variantematerial, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('material_product')->insert($variantematerial);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->variantesize !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                $variantesize[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'size_id' => $request->variantesize, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('size_product')->insert($variantesize);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->variantelength !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                $variantelength[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'length_id' => $request->variantelength, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('length_product')->insert($variantelength);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->variantematerialendurance !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                list($id_material, $id_endurance) = explode('_', $request->variantematerialendurance);
                $variantematerialendurance[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'material_id' => $id_material, // ID del material
                    'endurance_id' => $id_endurance, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('material_endurance')->insert($variantematerialendurance);
                //DB::table('material_endurance')->insert();

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } elseif ($request->varianteweightlength !== null) {
                $request->validate([
                    'varianteprecio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                $product->save();
                list($id_weight, $id_length) = explode('_', $request->varianteweightlength);
                $varianteweightlength[] = [
                    'product_id' => $product->id, // ID del producto recién creado
                    'weight_id' => $id_weight, // ID del material
                    'length_id' => $id_length, // ID del material
                    'precio' => $request->varianteprecio, // Precio de la variante
                ];
                DB::table('weight_length')->insert($varianteweightlength);

                return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
            } else {
                return back()->withErrors(['error' => 'La variante es requerida ']);
            }
        } elseif ($request->has('no_variante')) {
            $request->validate([
                'precio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                'precioMayoreo' =>  'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',

            ]);

            $product->precio = $request->precio;
            if (is_null($request->precioMayoreo)) {
                $product->precio_mayoreo = null;
                $product->mayoreo = 0;
            } else {
                $product->precio_mayoreo = $request->precioMayoreo;
                $product->mayoreo = 1;
            }
            $product->save();

            return redirect()->back()->with(['success' => 'Producto guardado correctamente ']);
        } else {
            return back()->withErrors(['error' => 'Escoja si contiene variante o no contiene ']);
        }
    }

    public function guardarProducto(Request $request) //editar
    {
        //dd($request);
        $request->validate([
            'nombre' => 'required|unique:products,nombre,' . $request->id_product . '|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\/\(\)]+$/u',
            'slug' => 'required|unique:products,slug,' . $request->id_product . '|regex:/^[a-zA-Z0-9-]+$/',
        ]);



        $product = Product::where('id', $request->id_product)->first();

        $product->nombre = $request->nombre;

        $product->slug = $request->slug;
        //dd($product);
        if ($product->variante) {
            $ids = [];
            foreach ($request->all() as $key => $value) {
                //MaterialEndurance
                if (str_starts_with($key, 'materialEndurance_')) {
                    $id = str_replace('materialEndurance_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('material_endurance')->where('id', $id)->update(['precio' => $value]);
                }
                //LengthWeight
                if (str_starts_with($key, 'weightLength_')) {
                    $id = str_replace('weightLength_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('weight_length')->where('id', $id)->update(['precio' => $value]);
                }
                //lenghts
                if (str_starts_with($key, 'length_')) {
                    $id = str_replace('length_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('length_product')->where('id', $id)->update(['precio' => $value]);
                }
                //Sizes
                if (str_starts_with($key, 'size_')) {
                    $id = str_replace('size_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('size_product')->where('id', $id)->update(['precio' => $value]);
                }
                //materials
                if (str_starts_with($key, 'material_')) {
                    $id = str_replace('material_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('material_product')->where('id', $id)->update(['precio' => $value]);
                }
                //Wholesales
                if (str_starts_with($key, 'wholesale_')) {
                    $id = str_replace('wholesale_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('wholesale_product')->where('id', $id)->update(['precio' => $value]);
                }
                //WEights
                if (str_starts_with($key, 'weight_')) {
                    $id = str_replace('weight_', '', $key);
                    $request->validate([
                        $key => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                    ]);
                    DB::table('weight_product')->where('id', $id)->update(['precio' => $value]);
                }
            }
            //dd($request);
            if ($request->has('varianteweight') && !is_null($request->varianteweight)) {
                //DB::table('weight_product')->where('id', $id)->update(['precio' => $value]);

                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                //dd('pase');

                DB::table('weight_product')->insert([
                    'weight_id' => $request->varianteweight,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('variantewholesale') && !is_null($request->variantewholesale)) {
                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);

                DB::table('wholesale_product')->insert([
                    'wholesale_id' => $request->variantewholesale,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('variantematerial') && !is_null($request->variantematerial)) {
                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);
                //dd('pase');
                DB::table('material_product')->insert([
                    'material_id' => $request->variantematerial,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('variantesize') && !is_null($request->variantesize)) {
                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);

                DB::table('size_product')->insert([
                    'size_id' => $request->variantesize,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('variantematerialEndurance') && !is_null($request->variantematerialEndurance)) {
                list($id_material, $id_endurance) = explode('_', $request->variantematerialEndurance);
                //dd('pasa');
                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);

                DB::table('material_endurance')->insert([
                    'material_id' => $id_material,
                    'endurance_id' => $id_endurance,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('variantelength') && !is_null($request->variantelength)) {
                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);

                DB::table('length_product')->insert([
                    'length_id' => $request->variantelength,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            } elseif ($request->has('varianteweightLength') && !is_null($request->varianteweightLength)) {
                list($weight_id, $length_id) = explode('_', $request->varianteweightLength);

                $request->validate([
                    'precioVarianteNueva' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                ]);

                DB::table('weight_length')->insert([
                    'weight_id' => $weight_id,
                    'length_id' => $length_id,
                    'product_id' => $product->id,
                    'precio' => $request->precioVarianteNueva
                ]);
            }
            $product->save();
        } else {

            $request->validate([
                'precio' =>  'required|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',
                'precioMayoreo' =>  'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/|gt:0',

            ]);
            //dd('pasa');

            $product->precio = $request->precio;
            if (is_null($request->precioMayoreo)) {
                //dd("pasa");
                $product->precio_mayoreo = null;
                $product->mayoreo = 0;
            } else {
                //dd('pasa bein');
                $product->precio_mayoreo = $request->precioMayoreo;
                $product->mayoreo = 1;
            }
            $product->save();
        }


        if (!is_null($request->file('dropzone-file'))) {
            $request->validate([
                'dropzone-file' => 'required|image|mimes:jpg|max:2048', // Solo JPG y máximo 2 MB
            ]);
            $image = $request->file('dropzone-file');
            $imageName = $request->input('slug') . '.jpg';
            //dd($imageName);
            //$imagePath = $request->file('image')->store($imageName, 'public');
            $imagePath = public_path('images/' . $imageName);
            //dd($imagePath);
            // Verificar si ya existe una foto con el mismo nombre y eliminarla
            if (file_exists($imagePath)) {
                unlink($imagePath); // Elimina la foto anterior
            }

            // Mover la nueva foto al directorio 'images'
            $image->move(public_path('images'), $imageName);
        }

        //$product->nombre = $request->precio;

        // Obtener el archivo de la solicitud


        // Asociar la imagen al producto
        //$product = Product::where('slug', $request->input('slug'))->first();

        /*if ($product) {
            $product->update(['image' => $imageName]); // Supongamos que tienes un campo 'image' en tu tabla `products`
        }*/

        return redirect()->back()->with('success', 'Producto actualizado');
    }

    public function nuevoProducto()
    {
        //$product = Product::where('slug', $slug)->firstOrFail();
        $allMaterials = Material::all();
        $allEndurances = Endurance::all();
        $allWeights = Weight::all();
        $allLengths = Length::all();
        $allWholesales = Wholesale::all();
        $allSizes = Size::all();

        //$data['product'] = $product;
        $data['allMaterials'] = $allMaterials;
        $data['allEndurances'] = $allEndurances;
        $data['allWeights'] = $allWeights;
        $data['allLengths'] = $allLengths;
        $data['allWholesales'] = $allWholesales;
        $data['allSizes'] = $allSizes;

        return view('newProduct', $data);
    }

    public function agregarCodigo(CodeRequest $request)
    {
        $codigo = new Code();
        if (preg_match('/B.*E.*G.*V/i', $request->code)) {
            $ultimoId = Code::getLastBegvCode();
            $numero = (int) substr($ultimoId->code, 4) + 1;
            $nuevoCodigo = 'BEGV' . str_pad($numero, 3, '0', STR_PAD_LEFT);
            //dd($nuevoCodigo);
            $codigo->code = $nuevoCodigo;
        } else {
            $request->validate([
                'caducidad' => 'required|date',
            ]);
            $fechaMinima = Carbon::now()->addWeeks(2);
            $fechaCaducidad = Carbon::parse($request->caducidad);
            if ($fechaCaducidad->lt($fechaMinima)) {
                return redirect()->back()->withErrors(['La fecha de caducidad debe ser al menos 2 semanas posterior a la fecha actual']);
            }
            $codigo->code = $request->code;
            $codigo->caducidad = $request->caducidad;
        }
        // Asignar el código formateado al modelo
        //
        //
        $codigo->active = $request->active; // o el valor que prefieras para el estado
        $codigo->save();
        //$code->save();

        /*return response()->json([
            'success' => true,
            'nuevoEstado' => $code->active
        ]);*/

        return redirect()->back()->with('success', 'Código agregado correctamente');
    }

    public function actualizarCodigo(Request $request)
    {
        $codeId = $request->id_code;
        $state = $request->estado;

        $code = Code::findOrFail($codeId);
        $code->active = $state; // Asumiendo que el campo de estado es 'active'
        $code->save();

        return response()->json([
            'success' => true,
            'nuevoEstado' => $code->active
        ]);

        //return redirect()->back()->with('success', 'Código actualizado correctamente.');

    }


    public function eliminarCodigo(Request $request)
    {
        $codeId = $request->id_code;

        $code = Code::findOrFail($codeId);
        $code->delete();

        return redirect()->back()->with('success', 'Código eliminado correctamente.');
    }

    public function eliminarVariante(Request $request)
    {
        try {
            foreach ($request->all() as $key => $value) {
                if (str_starts_with($key, 'materialEnduranceE')) {
                    DB::table('material_endurance')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'weightLengthE')) {
                    DB::table('weight_length')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'lengthE')) {
                    DB::table('length_product')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'sizeE')) {
                    DB::table('size_product')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'materialE')) {
                    DB::table('material_product')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'wholesaleE')) {
                    DB::table('wholesale_product')->where('id', $value)->delete();
                }
                if (str_starts_with($key, 'weightE')) {
                    DB::table('weight_product')->where('id', $value)->delete();
                }
            }

            // Responder con un estado exitoso
            return response()->json(['message' => 'Variantes eliminadas correctamente'], 200);
        } catch (\Exception $e) {
            // Manejo de errores y respuesta con estado 500
            return response()->json(['error' => 'Ocurrió un error al eliminar las variantes'], 500);
        }
    }



    public function eliminarProducto(Request $request)
    {
        $productId = $request->id_product;

        $product = Product::findOrFail($productId);
        $product->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }

    public function cambiarEstado(Request $request)
    {
        $estado = $request->estado;
        $id = $request->id;
        // Buscar y actualizar la orden
        $order = Order::find($id);
        $order->state = $estado;
        $order->save();

        return response()->json([
            'message' => 'Orden actualizada correctamente',
        ], 200);
    }

  

    public function cambiarEstadoMayorista(Request $request)
    {
        try {
            $user = $request->userId;
            $state = filter_var($request->isChecked, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
           
            // Buscar y actualizar la orden
            $usuario = User::find($user);
            $usuario->mayorista = $state;
            $usuario->mayorista_caducidad = $state ? Carbon::now()->addMonths(5) : null;
            $usuario->save();

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al actualizar el usuario',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
