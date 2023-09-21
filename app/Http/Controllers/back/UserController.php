<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user_data(){
        $user = DB::table('users')->paginate(10);
        return view('back.user', [
            'user' => $user
        ]);
    }

    public function edit_user($id){
        $user = DB::table('users')->where('id', $id)->get();
        return view('back.edit-user', [
            'user' => $user
        ]);        
    }

    public function update_user(Request $request){
        DB::table('users')->where('id',$request->id)->update([
            'users.name' => $request->name,
            'users.email' => $request->email
        ]);
        return redirect('user');
    }

    public function delete_user($id){
        DB::table('users')->where('id', $id)->delete();
        return redirect('user');
    }
}