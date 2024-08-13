<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    protected $user;

    public function __construct()
    {
        // $user = Auth::user();
    }

    public function index()
    {
        $user = Auth::user();
        return view('frontend.account.index', compact('user'));
    }

    // Menampilkan halaman detail pengaturan akun
    public function show()
    {
        $user = Auth::user();
        return view('frontend.account.show', compact('user'));
    }

    // Memperbarui data akun
    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_telp' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        DB::table('users')->where('id', auth()->id())->update([
            'name' => $request->input('name'),
            'nomor_telp' => $request->input('nomor_telp'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password_confirmation')),
        ]);

        // Redirect the user back to the account settings page
        return redirect()->route('account.index')->with('success', 'Pengaturan akun berhasil diperbarui.');
    }
}
