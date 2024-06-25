# Webサイト制作用タスクランナー

## Version

### 2022.01.xx
- ブレイクポイントの調整

### 2021.01.xx
- タスクランナーをGulpからnpm scriptsに変更
- node-sassをdart-sassに変更予定
- watchはchokidarがよく使われてそうなのでchokidar採用
- webpack依存しないようにCSSとJSは分ける
  slickなどwebpackでまとめるCSSもあるのでstyle-loaderは必要
- pugは初期構築のみでwordpressなど組み込み時に削除する。
- pug-cliはnpmのものが_includeファイルまで出力されてしまうので、GITのバージョンを使用
- npm-run-allは使ってないが入れておく

## インストール

- node バージョン14.x
- 下記不要なものは外すdependencies
- worpdressの場合はpath_destの値をpath_wpに変更
- - gsap
- - jquery-jpostal-ja
- - slick-carousel
- 
```bash
npm install
```

## タスクランナー実行
```bash
npm run watch
```

# 各サイトに必要な情報あれば下記に記述

polifill
- position:sticky;
x - css-variables

CSS
x - configの整理
x - スクロールアンカー
x - HTML5
x - media


JS
- swipper
- スムーズスクロール GSAP
- barba

## node-sassがコンパイルできない場合
エラーコードから必要なファイルを見つけ、ここからbinding.nodeをダウンロード
https://github.com/sass/node-sass/releases
/node_modules/node-sass/vendor/darwin-x64-00/binding.nodeにコピー
