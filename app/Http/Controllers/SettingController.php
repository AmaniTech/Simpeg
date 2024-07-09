<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('admin.setting.index', [
            'min_sks' => Setting::where('variabel', 'min_sks')->value('value'),
            'hargapersks' => Setting::where('variabel', 'hargapersks')->value('value'),
        ]);
    }
    public function update(Request $request){

        Setting::where('variabel', 'min_sks')->update([
            'value' => $request->a
        ]);
        Setting::where('variabel', 'hargapersks')->update([
            'value' => $request->b
        ]);

        toastr()->success('Data berhasil dihapus');
        return redirect()->back();
    }
}
