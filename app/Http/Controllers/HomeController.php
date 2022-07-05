<?php
namespace App\Http\Controllers;
    use App\Models\User;
    use App\Models\Post;
    use App\Models\Comment;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\DB;

    class HomeController extends Controller{
        public function showHome(){
            if(!empty(Session::get("user_id"))){;
                return view("home")->with('username', Session::get("username"));
            }else{
                return redirect("login");
            }
        }
    

        public function getPosts($user = array()){
            $key = '?key=ab7a5b9fbdc04a96823d553be23f4a29';
            $url = 'https://api.rawg.io/api/games/';
            if(!empty($user)){
                $posts = Post::where("Poster", Session::get("user_id"))->get();
            }else{
                $posts = Post::all();
            }
            $i = 0;
            foreach($posts as $p){
                $Us = User::where("Id", $p->Poster)->first();          
                $current_user = Session::get("user_id");
                $liked = !empty(DB::select("SELECT * FROM Likes WHERE PostId = $p->Id AND UserId = $current_user"));

                $game = $p->Game;
                $geturl = $url . $game . $key;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $geturl);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($curl);
                curl_close($curl);
                $result = json_decode($result,true);

                $post = array("Id" => $p->Id,"Username" => $Us->Username ,"Game" => $p->Game, "Title" => $p->Title, "Grade" => $p->Grade, "Content" => $p->Content, "nLikes" => $p->nLikes, "nComments" => $p->nComments, "Liked" => $liked, "name" => $result["name"], "image" => $result['background_image']);
                $json[$i] = $post;
                $i = $i + 1;
            }
            $json["length"] = $i;
            return json_encode($json);
        }

        public function LikeInsert($Postid){
            DB::table('likes')->insert(['UserID' => Session::get("user_id"), "PostID" => $Postid]);
        }

        public function LikeDelete($Postid){
            DB::table('likes')->where(['UserId'=> Session::get("user_id")])->delete();
        }

        public function sendComment(){
            $input = request();
            $comment = new Comment;
            $comment->Content = $input['Content'];
            $comment->Poster = $input['Username'];
            $comment->Post = $input['Post'];
            $postid = $input['Post'];
            $comment->save();
            
            DB::select("UPDATE POSTS SET nComments = nComments + 1 WHERE Id = $postid");
        }

        public function getComments($id){
            $Comments = Comment::where("Post", $id)->get();
            $i = 0;
            $json = array();
            foreach($Comments as $c){
                $json[$i]["Content"] = $c->Content;
                $json[$i]["Username"] = $c->Poster;
                $i = $i + 1; 
            }
            $json["length"] = $i;
            return json_encode($json);
        }

    }
?>