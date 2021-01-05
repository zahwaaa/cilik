<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Modules\Kompetisi\Entities\CompetitionUser;
use Modules\Shop\Entities\ProductCheckout;

class JogjaController extends Controller
{
    public function masuk(Request $request)
    {

        $cek = User::where('email', $request->email)->first();

        if(is_null($cek)){
            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'name' => $request->name,
                'last_name' => $request->last_name,
                'role_id' => 2
            ]);
        }

        Fortify::authenticateUsing(function () use($request) {
            $user = User::where('email', $request->email)->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }

    public function konfirmasi(Request $request)
    {
        $cek = ProductCheckout::where('kode', $request->payment_code)->first();

        if(is_null($cek)){
            return response()->json("not oke", 400);
        }else{
            if($cek->phone == "kompetisi"){
                $d = CompetitionUser::where('user_id', $cek->first_name)->where('competition_id', $cek->last_name)->first();
                $d->is_paid = 1;
                $d->save();
            }

            $cek->is_paid = 1;
            $cek->save();
            return response()->json("oke", 200);
        }
    }

}
