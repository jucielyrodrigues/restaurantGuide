<?php

namespace App\Uploader;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class Uploader{
  public static function handler($data, $dir){
    $dir = new Folder(WWW_ROOT . 'uploader' . DS . $dir, true);
    $file =  new File($data['tmp_name']);
    $file->copy($dir->pwd() . DS . $data['name']);
    return $data['name'];
  }
}