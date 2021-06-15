<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\News;
class HomeController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        { 
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        
        return view("home")->with("user", $user);
    }
    public function caricaNews() {
        $news= News::all();
        $newsArray = array();
        foreach($news as $value) {
            $newsArray[] = array('img' => $value->img, 'id' => $value->Id,'titolo' => $value->titolo,'descrizione' => $value->descrizione );
        }
        return response()->json($newsArray);
     }
}
?>