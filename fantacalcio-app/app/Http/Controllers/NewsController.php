<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("news")->with("user", $user);
        }
        return view("news")->with("user", $user);
    }

    public function caricaNews() {
        $news = News::all();
        $newsArray = array();
        foreach($news as $value) {
            $newsArray[] = array('img' => $value->img, 'titolo' => $value->titolo,'id' => $value->Id,'descrizione' => $value->descrizione);
        }
        return response()->json($newsArray);
    }
    public function caricaCommenti() {
        $commenti = Comment::join('fantallenatore','fantallenatore.id','=','commenti.cod_fantallenatore')->orderBy('commenti.id')->get();
        $commentiArray = array();
        foreach($commenti as $value) {
            $commentiArray[] = array('commento' => $value->commento, 'id' => $value->Id,'cod_news' => $value->cod_news,'cod_fantallenatore' => $value->cod_fantallenatore ,'username' => $value->username);
        }
        return response()->json($commentiArray);
    }

    public function addCommento($commento,$id_news) {
        $commenti= Comment::insert(array('cod_news'=> $id_news,'commento'=> $commento,'cod_fantallenatore' => session('user_id')));
        $aggiunto = array();
        $user = User::find(session('user_id'));
        $aggiunto[] = array('username' => $user->username);        
        return response()->json($aggiunto);
    }
}
?>