<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Giocatori;
use App\Models\Squadra;
use Illuminate\Http\Request;

class Modifica_squadraController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        return view("modifica_squadra")->with("user", $user);
    }

    public function fetchGiocatori($id){
        $giocatori = Squadra::find($id)->giocatori;
        $giocatoriArray = array();
        foreach($giocatori as $giocatore) {
            $giocatoriArray[] = array('id' => $giocatore->Id,'nome' => $giocatore->Nome, 'ruolo'=> $giocatore->Ruolo);
        }
        return response()->json($giocatoriArray);
    }
    public function fetchGiocatoriMancanti($id){
        $giocatori_mancanti = DB::select("SELECT id,nome,ruolo,url FROM giocatori EXCEPT SELECT g.id,g.nome,g.ruolo,g.url FROM giocatori g JOIN giocatori_appartenenti ga on g.id=ga.id where ga.squadra='$id'");
        $giocatoriArray = array();
        foreach($giocatori_mancanti as $giocatore_mancante) {
            $giocatoriArray[] = array('id' => $giocatore_mancante->id,'nome' => $giocatore_mancante->nome, 'ruolo'=> $giocatore_mancante->ruolo,'img' => $giocatore_mancante->url);
        }
        return response()->json($giocatoriArray);
    }
    
    public function addGiocatore($id_squadra,$id_giocatore){
        $query = Squadra::find($id_squadra)->giocatori->where('Id',$id_giocatore);
        $aggiunto = array();
            if (empty($query)) {
                $aggiunto[] = array('ok' => false);
            }
            else
            {
                $query = Squadra::find($id_squadra)->giocatori()->attach($id_giocatore);
                $aggiunto[] = array('ok' => true);
            }
            return response()->json($aggiunto);
    }
    public function eliminaGiocatore($id_squadra,$id_giocatore){
        $query = Squadra::find($id_squadra)->giocatori()->detach($id_giocatore);
        $eliminato = array();
        if(!$query) {
            $eliminato[] = array('ok' => true);
        }else{
            $eliminato[] = array('ok' => false);
        }
        return response()->json($eliminato);
    }
}
?>