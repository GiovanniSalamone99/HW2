<?php

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller {


    protected function create()
    {
            $request = request();
            $hash_pass= Hash::make($request['password']);
            if($this->countErrors($request) === 0) {
                $newUser =  User::create([
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
                'username' => $request['username'],
                'password' => $hash_pass,
                ]);
                if ($newUser) {
                    Session::put('user_id', $newUser->id);
                    return redirect('home');
                } 
                else {
                    return redirect('iscrizione')->withInput();
                }
            } else {return redirect('iscrizione')->withInput();}
        
    }
    private function countErrors($data) {
        $error = array();
        
        # USERNAME
        if(!preg_match('/[A-Za-z0-9]{6,20}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $data['password'])) {
            $error[] = "Rispettare il formato richiesto della password";
        } 
        # NOME
        if (!preg_match('/[A-Za-z ]{2,20}$/', $data['nome'])) {
            $error[] = "Rispettare il formato richiesto del nome";
        } 
        # COGNOME
        if (!preg_match('/[A-Za-z ]{2,20}$/', $data['cognome'])) {
            $error[] = "Rispettare il formato richiesto del cognome";
        } 

        return count($error);
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function index() {
        if(session('user_id') != null) {
            return redirect("home");
        }
        return view("iscrizione");
    } 

}
?>