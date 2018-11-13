<?php

    namespace App\Http\Controllers\API;

    use App\Models\Cafe;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class cafesController extends Controller
    {
        public function getCafes()
        {
            $cafes = Cafe::all();
            return response()->json($cafes);
        }

        public function getCafe($id)
        {
            $cafe = Cafe::where('id', '=', $id)->first();
            return response()->json($cafe);

        }

        public function postNewCafe(){
            $cafe = new Cafe();

            $cafe->name     = Request::get('name');//咖啡店的名字
            $cafe->address  = Request::get('address');//咖啡店的地址
            $cafe->city     = Request::get('city');//咖啡店所在城市
            $cafe->state    = Request::get('state');//咖啡店所在的身份
            $cafe->zip      = Request::get('zip');//邮政编码

            $cafe->save();

            return response()->json($cafe, 201);
        }
    }
