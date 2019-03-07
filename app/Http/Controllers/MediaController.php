<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Media;

class MediaController extends Controller
{
    public function saveImage($request, $saveFor)
    {
      if ($request->media) {
        $image = $request->media;
        if ($saveFor == 'blog') {
          $name = $this->cleanString($request->blog_title).'-'.date('Ymd_His').'.'.$image->getClientOriginalExtension();
        } elseif ($saveFor == 'category') {
          $name = $this->cleanString($request->category).'-'.date('Ymd_His').'.'.$image->getClientOriginalExtension();
        } elseif ($saveFor == 'profile_picture') {
          $name = $this->cleanString($request->name).'-'.date('Ymd_His').'.'.$image->getClientOriginalExtension();
        } else {
          $name = date('Ymd_His').'.'.$image->getClientOriginalExtension();
        }

        if ($saveFor == 'blog') {
          $destinationPath = 'img/blogs/';
        } elseif ($saveFor == 'category') {
          $destinationPath = 'img/categories/';
        } elseif ($saveFor == 'profile_picture') {
          $destinationPath = 'img/profile_pictures/';
        } else {
          $destinationPath = 'img/';
        }

        $image->move($destinationPath, $name);
        $image_location_and_name = $destinationPath.$name;


        $media = new Media;
        if ($saveFor == 'blog') {
          $media->media_title = 'Blog-'.$request->blog_title;
        } elseif ($saveFor == 'category') {
          $media->media_title = 'Category-'.$request->category;
        } elseif ($saveFor == 'profile_picture') {
          $media->media_title = 'ProfilePicture-'.$request->name;
        } else {
          $media->media_title = 'Img-'.$request->category;
        }
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
      // this is just to ensure that we dont delete the predefined image used as a placeholder
      if ($id > 4) {
        $media = Media::find($id);
        $image_path = $media->media_location;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $media->delete();
      }
    }

    public function cleanString($string)
    {
     $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

     return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}
