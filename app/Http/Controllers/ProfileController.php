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

    class ProfileController extends Controller{
        public function showProfile(){
            if(!empty(Session::get("user_id"))){
                $posts = Post::where("Poster", Session::get("user_id"))->get();
                $numPosts = count($posts);
                $likes = DB::table('likes')->where("UserId", Session::get("user_id"))->get();
                $numLikes = count($likes);
                $comments = Comment::where("Poster", Session::get("username"))->get();
                $numComments = count($comments);
                return view("Profile")->with('numPosts', $numPosts)->with('username', Session::get("username"))->with("numLikes", $numLikes)->with("numComments", $numComments);
            }else{
                return redirect("login");
            }
        }

        public function deletePost($id){
            DB::select("DELETE FROM POSTS WHERE Id = $id");
            $Comments = Comment::where("Post", $id)->get();
            foreach($Comments as $c){
                $c->delete();
            }
        }

    }
?>