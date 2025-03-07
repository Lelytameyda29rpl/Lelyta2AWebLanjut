<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //public function profile($id, $name) {
        //return view('user.profile', ['id' => $id, 'name' => $name]);
    //}

    //public function index() {
        // coba akses model UserModel
        //$user = UserModel::all(); //ambil semua data dari tabel m_user
        //return view('user', ['data' => $user]);
    //}

    //public function index() {
        // tambah data user dengan Eloquent Model
            //$data = [
                //'username' => 'customer-1',
                //'nama' => 'Pelanggan',
                //'password' => Hash::make('12345'), // Perbaikan: tambahkan spasi setelah Hash::
                //'level_id' => 5
            //];
    
            //UserModel::insert($data); // tambahkan data ke tabel m_user
    
            // coba akses model UserModel
            //$user = UserModel::all(); // ambil semua data dari tabel m_user
            //return view('user', ['data' => $user]);
        //}

        // Jobsheet 3
        //public function index() {
            // tambah data user dengan Eloquent Model
                //$data = [
                    //'nama' => 'Pelanggan Pertama',
                //];
        
                //UserModel::where('username', 'customer-1')->update($data); // update data ke tabel m_user
        
                // coba akses model UserModel
                //$user = UserModel::all(); // ambil semua data dari tabel m_user
                //return view('user', ['data' => $user]);
            //}

        // Jobsheet 4
        public function index() {
            // tambah data user dengan Eloquent Model
                $data = [
                    'level_id' => '2',
                    'username' => 'manager_tiga',
                    'nama' => 'Manager 3',
                    'password' => Hash::make('12345')
                ];
        
                UserModel::create($data); 
        
                // coba akses model UserModel
                $user = UserModel::all();
                return view('user', ['data' => $user]);
            }
}

