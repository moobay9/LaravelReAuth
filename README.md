## About This Package

Laravel で次のページに移動する前にパスワードを求める認証モジュールです。


## 注意事項

- 認証されたあとのページで利用されることを想定しています。
- 認証されていないページで利用しようとするとエラーがおきます。
- セッションを利用します。
- 


## 使い方

Laravel をインストール後、composer.json に以下を追加してください。

```

"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/moobay9/LaravelReAuth.git",
        "symlink": true
    }
],
"require": {
    "funaffect/reauth": "dev-master"
},
```

追加後、`composer install` するとパッケージがインストールされます。  
`composer require funaffect/reauth:dev-master` でもたぶん入ります。（未検証）  
パッケージ追加後は忘れずに `php artisan vendor:publish --tag=reauth` を実行してください。
