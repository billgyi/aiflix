<?php

namespace App\Http\Controllers;
use App\Http\Controllers\igfuncController;

use Illuminate\Http\Request;
class InstagramLogin_Dump extends Controller
{
    public function login(Request $request)
    {
        $userig    = $request->input('instagram_username');
        $passig    = $request->input('instagram_password');

        $userIP = $request->ip();

        $useragent = igfuncController::generate_useragent();
        $device_id = igfuncController::generate_device_id();
        $user      = $userig;
        $pass      = $passig;

        $login     = igfuncController::proccess(1, $useragent, 'accounts/login/', 0, igfuncController::hook('{"device_id":"' . $device_id . '","guid":"' . igfuncController::generate_guid() . '","username":"' . $userig . '","password":"' . $passig . '","Content-Type":"application/x-www-form-urlencoded; charset=UTF-8"}'), array(
            'Accept-Language: id-ID, en-US',
            'X-IG-Connection-Type: WIFI'
        ));

        $ext		= json_decode($login[1]);
        preg_match('#set-cookie: csrftoken=([^;]+)#i', str_replace('Set-Cookie:', 'set-cookie:', $login[0]), $token);
        preg_match_all('%set-cookie: (.*?);%', str_replace('Set-Cookie:', 'set-cookie:', $login[0]), $d);
        $cookie 	= '';
        for($o = 0; $o < count($d[0]); $o++){
            $cookie .= $d[1][$o] . ";";
        }
        
        if ($ext->status == 'ok') {
            $uname = $ext->logged_in_user->username;
            $uid = $ext->logged_in_user->pk;

            $sessionid = urlencode($uid . ':' . $token[1]);
            $ds_user_id = $uid;
            $csrftoken = $token[1];
            $mid = igfuncController::generate_mid();
            $output = "sessionid=$sessionid;ds_user_id=$ds_user_id;csrftoken=$csrftoken;mid=$mid;";

            // Cari atau buat entri dalam tabel cookie_clients
            $cookieClient = \App\Models\Cookie_Dump::where('user_id', auth()->id())->first();
            if ($cookieClient === null) {
                \App\Models\Cookie_Dump::create([
                    'username'   => $uname,
                    'pk'         => $uid,
                    'cookie_data' => $cookie,
                    'useragent'  => $useragent,
                    'user_id'  => auth()->id()
                ]);  
                session()->flash('success', 'Login berhasil');
            } else {
                \App\Models\Cookie_Dump::where('user_id', auth()->id())
                    ->update([
                        'username'   => $uname,
                        'pk'         => $uid,
                        'cookie_data' => $cookie,
                        'useragent'  => $useragent,
                        'user_id'  => auth()->id()
                    ]);
                session()->flash('success', 'Update berhasil');
            }
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } elseif($ext->error_type == 'bad_password'){
            return redirect()->route('dashboard')->with('error', 'Password yang Anda masukkan salah. Silakan coba lagi.');
        } else {
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan yang tidak diketahui: ' . $ext->message);
        }
    }
}
