<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Squadra;
use App\Models\Edizione_fantacalcio;
use Illuminate\Http\Request;

class SquadraController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
        {
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        return view("squadra")->with("user", $user);
    }

    public function caricaSquadre() {
        $squadra = Squadra::where('fantallenatore',session('user_id'))->get();
        $squadraArray = array();
        foreach($squadra as $value) {
            $squadraArray[] = array('nome' => $value->Nome_Squadra, 'id' => $value->Cod_S,'lega' => $value->Edizione_Fantacalcio);
        }
        return response()->json($squadraArray);
    }

    public function getNomeLega($query) {
        $nome_fanta = Edizione_fantacalcio::where('Id',$query)->join('Fantacalcio','Fantacalcio.Cod','=','Edizione_fantacalcio.Fantacalcio')->first();
        $nome= $nome_fanta->Nome . ' ('.$nome_fanta->Anno .')';
        return ['Nome' => $nome];
    }

    public function addSquadra($query) {
        $exist = Squadra::where('Nome_Squadra', $query)->where('fantallenatore',session('user_id'))->exists();
        if(!$exist){
            $squadra= Squadra::insert(array('Nome_Squadra'=> $query,'fantallenatore' => session('user_id')));
            if($squadra){
                $squadra = Squadra::where('Nome_Squadra', $query)->where('fantallenatore',session('user_id'))->first();
                $squadraArray = array();
                $squadraArray[] =array('ok' => true,'id' => $squadra->Cod_S,'nome' => $squadra->Nome_Squadra, 'lega' => $squadra->Edizione_Fantacalcio );
                return response()->json($squadraArray);
            }else{
                return array('ok' => false);
            }
        }else{
            return array('ok' => false);
        }
    }
    
    public function eliminaSquadra($query) {
        $squadra= Squadra::where('Cod_S',$query)->delete();
        if($squadra){
            return array('ok' => false);
        }else{
            return array('ok' => true);
        }
    }

}
?>