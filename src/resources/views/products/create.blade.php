<h1>商品登録</h1>

{{-- エラー表示 --}}
@if ($errors->any())
  <div style="color: red; margin-bottom: 16px;">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="/products/register" method="POST" enctype="multipart/form-data"
  style="padding: 12px; border: 1px solid #ccc; width: 500px;"
>
  @csrf

  <div style="margin-bottom: 12px;">
    <label>商品名</label><br>
    <input type="text" name="name" value="{{ old('name') }}" style="width: 100%;">
  </div>

  <div style="margin-bottom: 12px;">
    <label>価格</label><br>
    <input type="number" name="price" value="{{ old('price') }}" style="width: 100%;">
  </div>

  <div style="margin-bottom: 12px;">
    <label>商品画像</label><br>
    <input type="file" name="image" accept=".png,.jpg,.jpeg">
  </div>

  <div style="margin-bottom: 12px;">
    <label>季節（複数選択可）</label><br>
    @foreach ($seasons as $season)
      <label style="margin-right: 8px;">
        <input
          type="checkbox"
          name="seasons[]"
          value="{{ $season->id }}"
          {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}
        >
        {{ $season->name }}
      </label>
    @endforeach
  </div>

  <div style="margin-bottom: 12px;">
    <label>商品説明（最大120文字）</label><br>
    <textarea name="description" rows="4" style="width: 100%;">{{ old('description') }}</textarea>
  </div>

  <button type="submit">登録</button>
</form>

<div style="margin-top: 16px;">
  <a href="/products">一覧へ戻る</a>
</div>