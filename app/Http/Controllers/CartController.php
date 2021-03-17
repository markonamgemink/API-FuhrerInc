<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $this->authorize('user');
        $cart = Cart::where('id_user', auth()->id())->get();
        $user = User::where('id', auth()->id())->first();
        return CartResource::collection($cart)->additional([
            'user' => [
                'name' => $user->name,
            ]
        ]);
    }
    public function update(Request $request)
    {
        $this->authorize('user');

        $if = Cart::where([
            'id_user' => auth()->id(),
            'id_stock' => $request->id_stock
        ])->first();

        $user = User::where('id', auth()->id())->first();

        if ($if) {
            Cart::where('id', $if->id)->update([
                'total' => $request->total,
            ]);

            $update = Cart::where('id', $if->id)->first();

            return (new CartResource($update))->additional([
                'user' => [
                    'name' => $user->name,
                ],
                'message' => 'succes added'
            ]);
        }

        Cart::create([
            'id_user' => auth()->id(),
            'id_stock' => $request->id_stock,
            'total' => $request->total
        ]);

        $cart = Cart::where([
            'id_user' => auth()->id(),
            'id_stock' => $request->id_stock,
        ])->first();

        // return response()->json($cart);
        return (new CartResource($cart))->additional([
            'user' => [
                'name' => $user->name,
            ],
            'message' => 'succes update'
        ]);
    }

    public function delete($id)
    {
        $this->authorize('user');

        Cart::where([
            'id_user' => auth()->id(),
            'id' => $id,
        ])->delete();

        return response()->json([
            'message' => 'delete succes'
        ]);
    }
}
