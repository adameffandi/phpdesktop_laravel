<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Media;

class MediaController extends Controller
{
    public function saveCategoryImage($request)
    {
      if ($request->media) {
        $image = $request->media;
        $name = $request->category.'.'.$image->getClientOriginalExtension();
        $destinationPath = 'img/categories/';
        $image->move($destinationPath, $name);
        $image_location_and_name = $destinationPath.$name;


        $media = new Media;
        $media->media_title = 'Category-'.$request->category;
        $media->media_location = $image_location_and_name;
        $media->media_type = $image->getClientOriginalExtension();
        $media->uploader_id = Auth::id();
        $media->save();

        $media_id = $media->id;

        return $media_id;
      }
    }

    public function saveBlogImage($request)
    {
      if ($request->media) {
        $image = $request->media;
        $name = $request->blog_title.'.'.$image->getClientOriginalExtension();
        $destinationPath = 'img/blogs/';
        $image->move($destinationPath, $name);
        $image_location_and_name = $destinationPath.$name;

        $media = new Media;
        $media->media_title = 'BlogBg-'.$request->blog_title;
        $media->media_location = $image_location_and_name;
        $media->media_type = $image->getClientOriginalExtension();
        $media->uploader_id = Auth::id();
        $media->save();

        $media_id = $media->id;

        return $media_id;
      }
    }

    public function deleteImage($id)
    {
      $media = Media::find($id);

      $image_path = $media->media_location;

      if (File::exists($image_path)) {
          File::delete($image_path);
      }

      // $mediaName = substr($media->media_location, 4);
      // File::delete($mediaName);
      $media->delete();
    }


}
