<?php

// Refference URL
// https://ts0818.hatenablog.com/entry/2015/09/25/213400
// https://qiita.com/misogi@github/items/8d02f2eac9a91b4e6215

class ClassLoader
{  
  protected $dirs;
  
  public function register()
  {
    // $thisは擬似変数、ClassLoaderクラス自身のオブジェクト
    // 外部では、$this = new ClassLoader( );としてプロパティやメソッドにアクセスできる
    // 内部では、代わりに$thisで自身のプロパティやメソッドにアクセス
    spl_autoload_register(array($this,'laodClass'));
  }
  
  public function registerDir($dir)
  {
    $this->dirs[] = $dir;
  }
  
  // 引数を$class（クラス名）としたファイルを読み込む
  public function loadClass($class)
  {
    foreach($this->dirs as $dir) {
      $file = $dir . '/' . $class . '.php';
      if(is_readable($file)) {
        require $file;
        
        return;
      }
    }
  }
}