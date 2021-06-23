<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class BannerController extends Controller
{

    public function create()
    {
        return view('admin.banner.create');
    }
    public function save(Request $a)
    {
        $data= new Banner;

        $data->title=$a->title;
        $data->url=$a->url;

        $file=$a->File('image');
        $filename='image'.time().'.'.$a->image->extension();
        $file->move('upload/',$filename);
        $data->image=$filename;

        $data->save();
        if($data)
        {
            return redirect('banner/display')->with('message','Banner added');
        }
    }
    public function display()
    {
        $data=Banner::all();

        return view('admin.banner.display',compact('data'));
    }

    public function view($id)
    {
        $data=Banner::find($id);

        return view('admin.banner.view',compact('data'));
    }

    public function edit($id)
    {
        $data=Banner::find($id);

        return view('admin.banner.edit',compact('data'));
    }

    public function update(Request $a)
    {
        if($a->hasFile('image'))
        {
            $data=Banner::find($a->id);

            $data->title=$a->title;
            $data->url=$a->url;

            $file=$a->File('image');
            $filename='image'.time().'.'.$a->image->extension();
            $file->move('upload/',$filename);
            $data->image=$filename;

            $data->save();
            if($data)
            {
                return redirect('banner/display')->with('message','Banner added');
            }
        }
        else
        {
            $data=Banner::find($a->id);

            $data->title=$a->title;
            $data->url=$a->url;
            $data->save();
            if($data)
            {
                return redirect('banner/display')->with('message','Banner added');
            }
        }
    }
    public function delete($id)
    {
        $data=Banner::find($id);

        $data->delete();

        if($data)
        {
            return redirect('banner/display')->with('message','Banner Deleted');
        }
    }

}
