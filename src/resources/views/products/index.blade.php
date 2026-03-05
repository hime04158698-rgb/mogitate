<h1>商品一覧</h1>

<form action="/products" method="GET" style="margin: 12px 0;">
  <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名で検索" style="width: 260px;">
  <button type="submit">検索</button>
  <a href="/products" style="margin-left: 8px;">クリア</a>
</form>

<a href="/products/register">商品登録へ</a>

@foreach ($products as $product)
  <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
    <div>
  商品名：
  <a href="/products/detail/{{ $product->id }}">
    {{ $product->name }}
  </a>
  @if ($product->image)
  <div>
    <img src="{{ asset('storage/' . $product->image) }}" alt="商品画像" style="max-width:200px;">
  </div>
  
@endif
</div>
    <div>価格：{{ $product->price }}</div>
    <form action="/products/{{ $product->id }}" method="POST" style="margin-top: 8px;">
  @csrf
  @method('DELETE')
  <button type="submit" onclick="return confirm('削除しますか？')">削除</button>
</form>
    <div>季節：
      @foreach ($product->seasons as $season)
        {{ $season->name }}
      @endforeach
    </div>
  </div>
@endforeach
<div style="margin-top: 16px;">
  {{ $products->links('pagination::simple-default') }}
</div>