<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // キーワード検索（商品名）
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $products = $query->paginate(5)->withQueryString();

        return view('products.index', compact('products'));
    }
    public function show($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        return view('products.show', compact('product'));
    }
    public function create()
    {
        $seasons = Season::all();
        return view('products.create', compact('seasons'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'integer', 'min:0', 'max:10000'],
            'image' => ['required', 'file', 'mimes:png,jpeg,jpg'],
            'seasons' => ['required', 'array'],
            'seasons.*' => ['integer', 'exists:seasons,id'],
            'description' => ['required', 'max:120'],
        ]);

        // 画像アップロード（public/storage 配下に保存）
        $path = $request->file('image')->store('products', 'public');

        // productsテーブルに保存
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $path,
            'description' => $validated['description'],
        ]);

        // 中間テーブルに保存
        $product->seasons()->attach($validated['seasons']);

        // 一覧へ戻す
        return redirect('/products');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // 画像も一緒に消したい場合（任意）
        // if ($product->image) {
        //     \Storage::disk('public')->delete($product->image);
        // }

        $product->delete();

        return redirect('/products');
    }
}
