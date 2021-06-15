<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Fantacalcio;
use App\Models\Squadra;
use App\Models\Edizione_fantacalcio;


class LegheController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        return view("leghe")->with("user", $user);
    }
    
    public function caricaLeghe() {
        $iscritto= Squadra::where('Fantallenatore',session('user_id'))->join('Edizione_Fantacalcio','Edizione_Fantacalcio.Id','=','Squadra.Edizione_Fantacalcio')->get();
        $fantacalcio = Fantacalcio::all();
        $legheArray = array();
        foreach($fantacalcio as $fanta){
            $flag=0;
            $edizione= Edizione_fantacalcio::where('fantacalcio', $fanta->Cod)->max('id');
            foreach($iscritto as $value) {
                    if($edizione==$value->Edizione_Fantacalcio)
                    {   
                        $flag=1;
                        $legheArray[] = array('nome' => $fanta->Nome,'modalita' => $fanta->Modalità,'num_max_partecipanti' => $fanta->Num_Max_Partecipanti, 'img' => $fanta->img, 'cod' => $fanta->Cod,'presente' => true);
                        break;
                    }
            }
            if($flag!=1)
            {
                $legheArray[] = array('nome' => $fanta->Nome,'modalita' => $fanta->Modalità,'num_max_partecipanti' => $fanta->Num_Max_Partecipanti, 'img' => $fanta->img, 'cod' => $fanta->Cod,'presente' => false);
            }
        }
        return response()->json($legheArray);
    }

    public function fetchSquadre(){
        $squadre =Squadra::where('fantallenatore',session('user_id'))->get();
        $squadreArray = array();
        foreach($squadre as $squadra){
            $squadreArray[] = array('id' => $squadra->Cod_S,'nome' => $squadra->Nome_Squadra, 'lega' => $squadra->Edizione_Fantacalcio);
        }
        return response()->json($squadreArray);
    }
    public function fetchSquadreIscritte($id_lega){
        $edizione= Edizione_fantacalcio::where('fantacalcio', $id_lega)->max('id');
        $squadre =Squadra::where('fantallenatore',session('user_id'))->where('edizione_fantacalcio',$edizione)->get();
        $squadreArray = array();
        foreach($squadre as $squadra){
            $squadreArray[] = array('id' => $squadra->Cod_S,'nome' => $squadra->Nome_Squadra, 'lega' => $id_lega);
        }
        return response()->json($squadreArray);
    }

    public function addLega($id_squadra,$id_lega){
        $edizione= Edizione_fantacalcio::where('fantacalcio', $id_lega)->max('id');
        $query = Squadra::where('edizione_fantacalcio',$edizione)->where('fantallenatore',session('user_id'));
        $aggiunto = array();
        if (!isset($query)) {
            $aggiunto[] = array('squadra' => false);
        }
        else
        {
            $update = Squadra:: find($id_squadra); 
            if(isset($update))
            {
                $update = Squadra:: find($id_squadra)->update(['edizione_fantacalcio' => $edizione]);
                $aggiunto[] = array('squadra' => $id_squadra,'lega'=>$id_lega);
            }else{$aggiunto[] = array('squadra' => false);}
        }
        return response()->json($aggiunto);
    }
    public function eliminaIscrizione($id_squadra,$id_lega){
        $update = Squadra:: find($id_squadra)->update(['edizione_fantacalcio' => null]);
        $eliminata = array();
        if(isset($update)) {
            $eliminata[] = array('lega'=> $id_lega,'ok' => true);
        }else{
            $eliminata[] = array('lega'=> $id_lega,'ok' => false);
        }
        return response()->json($eliminata);
    }
}
?>