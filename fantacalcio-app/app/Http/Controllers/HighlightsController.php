<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Preferiti;


class HighlightsController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("highlights")->with("user", $user);
        }
        return view("highlights")->with("user", $user);
    }
    public function addPref($titolo,$img,$url) {
        $aggiunto = array();
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (isset($user))
        {
            $check = Preferiti::where('titolo',$titolo)->where('img',rawurldecode($img))->where('url',rawurldecode($url))->where('fantallenatore',session('user_id'))->first();
            if(isset($check)){
                $aggiunto[] = array('ok' => false);
            }else{
                Preferiti::insert(array('titolo'=> $titolo,'img'=> rawurldecode($img),'url'=> rawurldecode($url),'fantallenatore' => session('user_id')));
                $aggiunto[] = array('ok' => true);
            }
        }else{$aggiunto[] = array('ok' => 'not logged');}

        return response()->json($aggiunto);
     }
}
?>