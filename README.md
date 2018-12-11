# Fob.FormalBearsDemo

FormalBears 設定言語機能のミニマムな使用例

## Requires

PHP7.0.8以上

## ミニマムサンプル

### Github のユーザー情報一覧を表示するAPIクライアント

- 「APIのURL」、「表示したいユーザー名のリスト」の２つを設定項目とする
- 「APIのURL」は `共通設定` 、「表示対象ユーザー名のリスト」は、 `環境によって切り替えたい` とする

### 設定

- `etc/config/modules/app/user_list.yaml` デフォルト
- `etc/config/modules/{環境のコンテキスト}/user_list.yaml` 環境で切り替えるオーバーライド設定

### 実行

デフォルト `app` の設定（`app/user_list.yaml` のユーザー一覧）

```
php ./bin/app.php  get 'app://self/userlist/users' 
```

環境毎オーバーライドの設定（`{環境のコンテキスト}/user_list.yaml` がマージされたユーザー一覧）

`dev` 

```
php ./bin/dev.php  get 'app://self/userlist/users' 
```

`prod` 

```
php ./bin/prod.php  get 'app://self/userlist/users' 
```

## TODO

- 環境変数統合の実装サンプルの追加
- CS
- CI build

## License

These codes are licensed under CC0.

[![CC0](http://i.creativecommons.org/p/zero/1.0/88x31.png "CC0")](http://creativecommons.org/publicdomain/zero/1.0/deed.ja)
