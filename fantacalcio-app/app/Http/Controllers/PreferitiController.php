<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Preferiti;


class PreferitiController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        return view("preferiti")->with("user", $user);
    }
    public function caricaPreferiti() {
        $preferiti = Preferiti::where('fantallenatore',session('user_id'))->get();
        $preferitiArray = array();
        foreach($preferiti as $value) {
            $preferitiArray[] = array('id' => $value->id, 'img' => $value->img,'titolo' => $value->titolo,'url' => $value->url);
        }
        return response()->json($preferitiArray);
    }
    public function eliminaPref($id_pref){
        $query=Preferiti::find($id_pref)->delete();
        //$query="DELETE FROM preferiti WHERE id ='$id_pref'";
        $eliminato = array();
        if($query) {
            $eliminato[] = array('ok' => true);
        }else{
            $eliminato[] = array('ok' => false);
        }
        return response()->json($eliminato);

    }
}
?>