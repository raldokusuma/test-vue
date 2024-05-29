<?php

namespace App\Http\Controllers;
use File;
use Illuminate\Http\Request;
use App\Models\DataModel;
class DataController extends Controller
{
    public function data(){
        $contents = File::get(base_path('./inosoft.json'));
        $json = json_decode(json: $contents, associative: true);

        return $json['Sheet1'];
    }
}
