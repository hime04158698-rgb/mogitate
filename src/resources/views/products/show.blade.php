<h1>商品詳細</h1>

@if ($product->image)
  <div>
    <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" style="max-width:300px;">
  </div>
@endif

<div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
  <div>商品名：{{ $product->name }}</div>
  <div>価格：{{ $product->price }}</div>
  <div>説明：{{ $product->description }}</div>

  <div>季節：
    @foreach ($product->seasons as $season)
      {{ $season->name }}
    @endforeach
  </div>
</div>

<a href="/products">一覧へ戻る</a>