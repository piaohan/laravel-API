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

        public function postNewCafe()
        {

        }
    }
