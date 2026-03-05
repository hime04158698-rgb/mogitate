# mogitate

## 環境構築

### Dockerビルド

1. git clone
2. docker-compose up -d --build

```bash
git clone git@github.com:coachtech-material/laravel-docker-template.git
cd mogitate
docker-compose up -d --build
```

---

## Laravel環境構築

### 1. PHPコンテナへ入る

```bash
docker-compose exec php bash
```

### 2. Composerインストール

```bash
composer install
```

### 3. .envファイル作成

```bash
cp .env.example .env
```

### 4. アプリケーションキー作成

```bash
php artisan key:generate
```

### 5. マイグレーション

```bash
php artisan migrate
```

### 6. シーディング（ダミーデータ）

```bash
php artisan db:seed
```

### 7. シンボリックリンク作成（画像表示用）

```bash
php artisan storage:link
```

---

## 使用技術

- PHP
- Laravel
- MySQL 8.0
- nginx 1.21.1
- phpMyAdmin

---

## URL

### 商品一覧

http://localhost/products

### phpMyAdmin

http://localhost:8080

---

## 機能一覧

- 商品一覧表示
- 商品詳細表示
- 商品登録（画像アップロード）
- 商品削除
- 商品検索
- ページネーション

---

## 動作確認方法

1. 商品一覧ページにアクセスする

```
http://localhost/products
```

2. 商品登録を行う
3. 商品一覧に表示されることを確認
4. 商品名リンクを押し、商品詳細ページが表示されることを確認
5. 検索フォームから商品検索
6. 商品削除
7. 商品が5件以上ある状態でページネーション確認
8. Next / Previousでページ遷移できることを確認
