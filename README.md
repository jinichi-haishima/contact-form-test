・アプリケーション名
    お問い合わせフォーム（FashionablyLate）

環境構築
・Dockerビルド
	git clone git@github.com:jinichi-haishima/contact-form-test.git
	docker compose up -d —build

・Laravel環境構築
	docker-compose exec php bash
	composer install
	cp env.example .env
	php artisan key:generate
	php artisan migrate
	php artisan db:seed

・開発環境
	お問い合わせ画面：http://localhost/
	ユーザー登録：http://localhost/regisrer
	ログイン画面：http://localhost/login
	管理画面：http://localhost/admin
	phpmyadmin：http://localhost:8080/

・使用技術（実行環境）
	PHP:8.1-fpm
	Laravel:8.83.8
	MySQL:8.0.26
	Nginx:1.21.1
	PhpMyadmin
	Laravel Fortify