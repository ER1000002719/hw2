<?php
namespace App\Http\Controllers;
    use App\Models\User;
    use App\Models\Post;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;

    class PostCreatorController extends Controller{
        public function showCreator(){
            if(!empty(Session::get("user_id"))){;
                return view("createPost")->with('username', Session::get("username"));
            }else{
               return redirect("login");
            }
        }

        public function getGame($Game){
            $key = '?key=ab7a5b9fbdc04a96823d553be23f4a29';
            $url = 'https://api.rawg.io/api/games/';
    
            $curl = curl_init();
            $geturl = $url . $Game . $key;
            curl_setopt($curl, CURLOPT_URL, $geturl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $json = (array)json_decode($result);
            if(array_key_exists('redirect', $json)){
                $curl = curl_init();
                $geturl = $url . $json['slug'] .$key ;
                curl_setopt($curl, CURLOPT_URL, $geturl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                curl_close($curl);
            }
            echo($result);
        }
        
        public function insertPost(){
            $input = request();
            $Post = new Post;
            
            $Post->Title = $input["Title"];
            $Post->Game = $input["Game"];
            $Post->Grade = $input["Grade"];
            $Post->Content = $input["Content"];
            $Post->Poster = Session::get("user_id");

            $Post->save();
            return view("createPost")->with('username', Session::get("username"));
        }
    }
?>