<?php
    namespace App\Http\Controllers;
    use App\Models\User;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Hash;

    class SignupController extends BaseController
    {
        public function insertUser(){
            $request = request();
            $error = [];
            if(!empty($request["Nome"]) && !empty($request["Cognome"]) && !empty($request["user"]) && !empty($request["mail"]) && !empty($request["pass"]) && !empty($request["pass-confirm"])){
                if(!preg_match('/^[a-z A-Z]+$/', $request["Nome"])){
                    $error[] = "Nome non valido";
                }
                if(!preg_match('/^[a-z A-Z]+$/', $request["Cognome"])){
                    $error[] = "cognome non valido";
                }
                if(!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $request["pass"])){
                    $error[] = "password non valida";
                }
                if($request["pass"] != $request["pass-confirm"]){
                    $error[] = "pass non confermata";
                }
                if(!filter_var($request["mail"], FILTER_VALIDATE_EMAIL)){
                    $error[] = "Mail non valida";
                }
                if(!preg_match('/^[a-zA-Z0-9_]+$/', $request["user"])){
                    $error[] = "user non valido";
                }
                $username = User::where('Username', $request['user'])->first();
                if ($username !== null) {
                    $error[] = "Username già utilizzato";
                }
                $mail = User::where('Email', $request['mail'])->first();
                if ($username !== null) {
                    $error[] = "Username già utilizzato";
                }

                if(count($error) == 0){
                    $password = password_hash($request['pass'], PASSWORD_BCRYPT);
                    $newUser =  User::create([
                        'Username' => $request['user'],
                        'Pass' => $password,
                        'Nome' => $request['Nome'],
                        'Cognome' => $request['Cognome'],
                        'Email' => $request['mail'],
                        ]);
                    if($newUser){
                        Session::put('user_id', $newUser->id);
                        Session::put('username', $newuser["Username"]);
                        return redirect('home');
                    } else{
                        return redirect('signup');
                    }
                } else{
                    return redirect('signup');
                }
            }
    
        }
        public function checkUsername($user){
            $exists = User::where('Username', $user)->exists();
            return ["exists" => $exists];
        }
        public function checkMail($mail){
            $exists = User::where('Email', $mail)->exists();
            return ["exists" => $exists];
        }

        public function checkLogin(){
            $request = request();
            $error = array();
            if(!empty($request['user']) && !empty($request['pass'])){
            $check = $this->checkUsername($request['user']);
            if(!$check['exists']){
                    $error[] = "Username inesistente";
            }else{
                    $user = User::where("Username", $request['user'])->first();
                    $password = $user["Pass"];
                    if(!password_verify($request['pass'], $password)){
                        $error[] = "Password sbagliata";
                    }
                }
                
                if(empty($error)){
                    Session::put('user_id', $user["Id"]);
                    Session::put('username', $user["Username"]);
                    
                    return redirect("home");
                }
            }
        }
    }
?>