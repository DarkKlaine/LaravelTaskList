<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TasksAdminController extends Controller
{
    public function lookUsers()
    {
        if (auth()->user()->hasRole('admin') === false) {
            abort(404);
        }

        $users = User::query()->get();

        return view('tasks/admin/main', compact('users'));
    }

    public function lookUser(User $user)
    {
        if (auth()->user()->hasRole('admin') === false) {
            abort(404);
        }

        return view('tasks/admin/look', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        if ($request->has('delete')) {
            $tasks = Task::query()
                ->where('user_id', $user->id)
                ->get();

            foreach ($tasks as $task) {
                $task->delete();
            }

            $user->delete();
        } else {
            $this->validate($request, [
                'name' => 'required|min:2|max:255',
                'email' => 'required|max:255|email',
                'password' => 'nullable|min:8|max:255|confirmed',
                'password_confirmation' => 'nullable|min:8|max:255',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;

            $user->syncRoles($request->roles);

            if ($request->password !== null) {
                $user->password = Hash::make($request->password);
            }

            $user->save();
        }

        return redirect()->route('admin');
    }
}
