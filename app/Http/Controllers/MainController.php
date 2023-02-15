<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Generator as Faker;

use App\Models\Category;
use App\Models\Typology;
use App\Models\Product;

class MainController extends Controller
{

  public function home()
  {
    $categories = Category::orderBy('created_at', 'DESC')->get();
    ;

    return view('home', compact('categories'));
  }

  public function product()
  {
    $products = Product::orderBy('created_at', 'DESC')->get();
    ;

    return view('product', compact('products'));
  }

  public function create()
  {

    $typologies = Typology::orderBy('created_at', 'DESC')->get();
    ;
    $categories = Category::orderBy('created_at', 'DESC')->get();
    ;

    return view(
      'create',
      compact('categories', 'typologies')
    );
  }

  public function store(Request $request)
  {
    $data = $request->validate([
      'name' => 'required|string|max:64',
      'description' => 'nullable|string',
      'price' => 'required|integer',
      'weight' => 'required|integer',
      'typology_id' => 'required|integer',
      'categories' => 'required|array'
    ]);

    $code = rand(10000, 99999);
    $data['code'] = $code;

    $product = Product::make($data);
    $typology = Typology::find($data['typology_id']);

    $product->typology()->associate($typology);
    $product->save();

    $categories = Category::find($data['categories']);
    $product->categories()->attach($categories);

    return redirect()->route('home');
  }
}