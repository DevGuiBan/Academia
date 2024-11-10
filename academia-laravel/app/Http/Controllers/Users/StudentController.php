<?php

namespace App\Http\Controllers\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function profile(int $id){
        try{
            $user = User::findOrFail($id);
            return view('students.profile', compact('user'));
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Unable to access Student Profile');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%{$query}%")
        ->where('role','=','personal')->paginate(6);

        return view('students.searchPersonals', ['users' => $users, 'query' => $query]);
    }
    
    public function update(Request $request, $id){
        try{
            $user = User::findOrFail($id);

            $request->validate([
                'name' => ['required', 'string', 'max:255', 'min:3'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'address' => ['required', 'string', 'max:255'],
                'password' => ['nullable', 'string', 'min:6'],
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;

            if (!empty($request->password)) {
                $user->password = bcrypt($request->password);
            }        

            $user->save();

            return view('students.profile', compact('user'))->with('success', 'Your profile has been updated successfully!');
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return view('students.profile', compact('user'))->with('error', 'Unable to update your profile: ' . $e->getMessage());
        }
    }

    public function destroy($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('students.profile')->with('error', 'Student not found.');
        }

        try {
            $user->delete();
            Auth::logout();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('students.profile')->with('error', 'Unable to delete your account.');
        }

        return redirect()->route('login')->with('success', 'Your account has been deleted successfully!');
    }

}
