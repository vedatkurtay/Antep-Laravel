<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SmsController extends Controller
{
    public function index() {
        return view('sms.index');
    }

    public function forgot() {
        return view('sms.forgot');
    }

    public function Reset(Request $request) {
        $phone = $request->get('phone');
        $sifre = Str::random(8);
        $hash = Hash::make($sifre);
        if (User::where('phone', '=', $phone)->count() > 0 ) {
            User::where('phone', $phone)->update(['password' => $hash]);


            /* $ch = curl_init('https://textbelt.com/text');
             $data = array(
                 'phone' => $phone,
                 'message' => 'Degerli uyemiz, talebiniz uzerine sifreniz sifirlanmistir. Yeni Sifreniz' . $sifre . ' olarak guncellenmistir.',
                 'key' => 'textbelt',
             );

             curl_setopt($ch, CURLOPT_POST, 1);
             curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

             $response = curl_exec($ch);
             curl_close($ch); */

            $basic = new \Vonage\Client\Credentials\Basic('APIKEY','API_SECRET');
            $client = new \Vonage\Client($basic);

            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($phone, SMSAPI, 'Degerli uyemiz, talebiniz uzerine sifreniz sifirlanmistir. Yeni Sifreniz: ' . $sifre . ' olarak guncellenmistir.')
            );

            $message = $response->current();

            if ($message->getStatus() == 0) {
                return redirect()->route('sms.index')->with('success', 'Sifreniz basariyla sifirlandi!');

            } else {
                echo "The message failed with status: " . $message->getStatus() . "\n";
            }
        } else {
            echo "Kullanici bulunamadi";
        }
    }
}
