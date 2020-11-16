<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function login(Request $req) {
      $role = $req->role;
      $user = User::where('role', '=', $role)->firstOrFail();
      if ($user->role === $role)
        return response()->json(['role' => $role, 'user' => $user, 'success' => true]);
      else 
        return response()->json(['error' => 'role mismatch']);
    }

    function submitProduct(Request $req) {
      $prod = $req->product;
      $newProd = Products::create([
        'name' => $prod['name'] ,
        'description' => $prod['description'] ,
        'price' => $prod['price'] ,
        'image' => $prod['image'] ,
      ]);
      return response()->json(['result' => $newProd, 'success' => true]);
    }

    function listProducts(Request $req) {
      $prods = Products::all();
      return response()->json(['list' => $prods]);
    }

    function setProductApprovalStatus(Request $req) {
      $prodId = $req->productId;
      $prod = Products::where('id', '=', $prodId)->firstOrFail();
      if ($prod) {
        $prod->approved = $req->status ? 1 : 0;
        $result = $prod->save();
        return response()->json(['result' => $result, 'status' => $req->status, 'model' => $prod]);
      } else {
        return response()->json(['error' => true]);
      }

    }
  }