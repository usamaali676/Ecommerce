<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
class GlobalHelper
{

  public static function crm_upload_img($img_file, $folder_name)
  {
      $imgpath = 'images/'.$folder_name;
      File::makeDirectory($imgpath, $mode = 0777, true, true);
      $imgDestinationPath = $imgpath.'/';
      $file_name = time().'_'.$img_file->getClientOriginalName();
      $success = $img_file->move($imgDestinationPath, $file_name);

      return $file_name;
  }
  public static function delete_img($img_file,$folder_name)
  {
      $imgpath = 'images/'.$folder_name;
      File::makeDirectory($imgpath, $mode = 0777, true, true);
      $imgDestinationPath = $imgpath.'/';
      $old_image=$imgDestinationPath.$img_file;
      if (File::exists($old_image))
      {
          File::delete($old_image);
          return true;
      }
      else
      {
          return false;
      }
  }
}
