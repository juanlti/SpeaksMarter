<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // sin paginar
       //$allData=Category::all();
        // con paginacion
        define('NUMERO_DE_PAGINAS',25);
        $categorias=Category::paginate(NUMERO_DE_PAGINAS);

        //return en laravel (blade)
       //return view('index',compact('categorias'));

        // return en Vue, a un elemento con arreglo en parametros
        return inertia('Categories/Index',['categories'=>$categorias]);
        //OBSERVACION: inertia SIEMPRE nos retorna a la carpeta (o directorio)  Pages
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Pintamos la vista en donde se cargan los datos para el create

        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $cr)
    {

        //APLICAMOS EL PATRON SOLID ( una responsabilidad por funcion)

        //guardamos el  objeto en el sistema, todavia falta subirlo a la bd
        //Si $cr es valido sigue . Caso contrario sale
        //Fuerzo la valicion con validate(['name']) pero no es necesario pq ya lo hace automaticamente
        // Creo el objeto category y lo guardo en la bd, todo en la misma sentencia de codigo linea 69
        Category::create(['name'=>$cr['name']]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category )
    {

        return inertia('Categories/Edit',['category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $cr,int $unaCategory)
    {

        $buscar=Category::find($unaCategory);


        // Aplicar los cambios en el objeto
        $buscar->fill($cr->all()); //
        // Puedes usar fill() para asignar los nuevos valores
        $buscar->save();



        // Luego, redirijo al metodo index para mostrar los resultados post modifiacion
        return redirect()->route('categories.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return redirect()->route('categories.index');

    }
}
