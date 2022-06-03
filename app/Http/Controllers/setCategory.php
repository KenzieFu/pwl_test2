<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MakeCategory;

class setCategory extends Controller
{
    public function add()
    {
        $make_categories = MakeCategory::get();
        return view('admin.addcategory',['make_categories' => $make_categories])->with('success',' Kategori berhasil ditambah!');
    }

    public function post(Request $request)
    {
        $this -> validate($request,[
            'file' => 'required | file | image | mimes:jpeg,png,jpg|max:2048',
            'jenis' => 'required',
            'keterangan'=> 'required',
        ]);
 
       $file = $request -> file('file');
       $file_name = time()."_".$file -> getClientOriginalName();

       $tujuan = 'data_file_category';
       $file-> move($tujuan,$file_name);

       $make_categories = MakeCategory::create([
           'file' => $file_name ,
           'jenis' => $request->jenis,
           'keterangan' => $request ->keterangan,
       ]);

        return view('admin.makecategory',['make_categories' => $make_categories]);
    }

    public function make()
    {
        $make_categories = DB::table('make_categories')->paginate(2);
        return view('admin.makecategory',['make_categories'=> $make_categories]);
    }

    public function hapus($id)
    {
        $make_categories = MakeCategory::find($id);
        $make_categories->delete();
        return redirect('/makecategory');
    }

    public function trash()
    {
        $make_categories = MakeCategory::onlyTrashed() ->get();
        return view('admin.trashcategory',['make_categories'=> $make_categories]);
    }

    public function restore($id)
    {
        $make_categories= MakeCategory::onlyTrashed() -> where('id',$id);
        $make_categories -> restore();
        return redirect('/trashcategory');
    }

    public function hapuspermanen($id)
    {
        $make_categories = MakeCategory::onlyTrashed()->where('id',$id);
        $make_categories -> forceDelete();
        return redirect('/trashcategory');
    }

    public function selectcategory()
    {
        $make_categories= DB::table('make_categories')->get();
        return view('admin.makepost',['make_categories' => $make_categories]);
    }
}
