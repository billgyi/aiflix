<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use App\Jobs\AutoStoryViewerJob;


use App\Models\Cookie_Dump;
use App\Models\Cookie_Client;
use App\Models\ManualBotHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AutoStoryViewerController extends Controller
{
    public static function outputStatus()
    {
        $manual_bot_history_model = ManualBotHistory::find(auth()->id());
        $log = $manual_bot_history_model->logs;

        // Check if $log is null
        if ($log === null) {
            $response = ['log' => 'logs masih kosong', 'status' => 'error', 'message' => 'Tidak ada log yang tersedia'];
        } else {
            $response = ['log' => $log, 'status' => 'success', 'message' => 'Proses Auto Story Viewer dimulai'];
        }

        return response()->json($response);
    }

    public static function startAutoStory()
    {
        $userId = Auth::id();

        $logs = ManualBotHistory::where('user_id', auth()->id())->first();
        if ($logs === null) {
            \App\Models\ManualBotHistory::create([
                'logs'    => null,
                'status'  => "Jalan",
                'user_id' => auth()->id()
            ]);
        } else {
            ManualBotHistory::where('user_id', auth()->id())->update(['status' => "Jalan"]);
        }

        AutoStoryViewerJob::dispatch($userId);

        $response = ['status' => 'success', 'message' => 'Proses Auto Story Viewer dimulai'];
        return response()->json($response);
    }

    public function stopAutoStory()
    {
        ManualBotHistory::where('user_id', auth()->id())->update(['status' => "stop"]);
        $response = ['status' => 'success', 'message' => 'Proses Auto Story Viewer dihentikan.'];
        return response()->json($response);
    }

    public function processTargets(Request $request)
    {
        $targets = $request->input('targets');
        $targets2 = $request->input('targets2');
        $targets3 = $request->input('targets3');

        Cookie::where('user_id', auth()->id())->update(array('target1' => $targets, 'target2' => $targets2, 'target3' => $targets3));
        $response = ['status' => 'success', 'message' => 'Targets berhasil diinput']; // Ubah pesan sesuai kebutuhan

        return response()->json($response);
    }

    public static function index()
    {
        $cookieDataModel = Cookie_Client::where('user_id', auth()->id())->first();
        $cookie = '';
        $useragent = '';

        if ($cookieDataModel !== null) {
            $cookie = $cookieDataModel->cookie_data;
            $useragent = $cookieDataModel->useragent;
        }

        $cookieDataModel_Dump = Cookie_Dump::where('user_id', auth()->id())->first();
        $cookie_dump = '';
        $useragent_dump = '';
        $target_data = '';
        $target2_data = '';
        $target3_data = '';

        if ($cookieDataModel_Dump !== null) {
            $cookie_dump = $cookieDataModel_Dump->cookie_data;
            $useragent_dump = $cookieDataModel_Dump->useragent;
            $target_data = $cookieDataModel_Dump->target1;
            $target2_data = $cookieDataModel_Dump->target2;
            $target3_data = $cookieDataModel_Dump->target3;
        }

        $username_akun_client = null;
        if ($cookie) {
            $getakun = igfuncController::proccess(1, $useragent, 'accounts/current_user/', $cookie);
            $getakun = json_decode($getakun[1], true);

            if ($getakun !== null && isset($getakun['status']) && $getakun['status'] == 'ok') {
                $getakunV2 = igfuncController::proccess(1, $useragent, 'users/' . $getakun['user']['pk'] . '/info', $cookie);
                $getakunV2 = json_decode($getakunV2[1], true);
                $username_akun_client = $getakun['user']['username'];
                $totalpost_akun = $getakunV2['user']['media_count'];
                $Followers_akun = $getakunV2['user']['follower_count'];
                $Following_akun = $getakunV2['user']['following_count'];
                $data_username_akun_client = $username_akun_client;
            } else {
                $username_akun_client = "login gagal";
            }
        }

        $username_akun_dump = null;
        if ($cookie_dump) {
            $getakun_dump = igfuncController::proccess(1, $useragent_dump, 'accounts/current_user/', $cookie_dump);
            $getakun_dump = json_decode($getakun_dump[1], true);

            if ($getakun_dump !== null && isset($getakun_dump['status']) && $getakun_dump['status'] == 'ok') {
                $getakunV2_dump = igfuncController::proccess(1, $useragent_dump, 'users/' . $getakun_dump['user']['pk'] . '/info', $cookie_dump);
                $getakunV2_dump = json_decode($getakunV2_dump[1], true);
                $username_akun_dump = $getakun_dump['user']['username'];
                $totalpost_akun_dump = $getakunV2_dump['user']['media_count'];
                $Followers_akun_dump = $getakunV2_dump['user']['follower_count'];
                $Following_akun_dump = $getakunV2_dump['user']['following_count'];
            } else {
                $username_akun_dump = "login gagal";
            }
        }

        return view('dashboard', compact('username_akun_client', 'username_akun_dump', 'target_data', 'target2_data', 'target3_data'));
    }
}