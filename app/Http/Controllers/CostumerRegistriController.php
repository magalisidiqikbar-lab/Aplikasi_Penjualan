<?php

namespace App\Http\Controllers;

use App\Models\Citie;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Province;
use App\Models\District;

class CostumerRegistriController extends Controller
{
    use RegistersUsers;
    
    protected $redirectTo = '/costumer/home';

    public function __construct()
    {
        // Tetap biarkan guest agar admin tidak terganggu
        $this->middleware('guest:costumer')->except('logout');
    }

    public function showRegisterForm()
    {
        if (Auth::guard('costumer')->check()) {
            return redirect('/costumer/home');
        }
        
        // Ambil data provinsi untuk dropdown di form
        $provinces = Province::orderBy('name', 'ASC')->get();
        return view('costumerAuth.register', compact('provinces'));
    }

    public function getCity()
    {
        $cities = Citie::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }

    public function getDistrict()
    {
        $districts = District::where('city_id', request()->city_id)->get();
        return response()->json(['status' => 'success', 'data' => $districts]);
    }

    public function createCostumer(Request $request)
    {
        // 1. Validasi Input sesuai kolom database kamu
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:11'],
            'address' => ['required', 'string'],
            'province_id' => ['required'],
            'citie_id' => ['required'],
            'district_id' => ['required'],
        ]);

        try {
            // 2. Simpan ke Database
            Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Lebih aman pakai Hash
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'province_id' => $request->province_id,
                'citie_id' => $request->citie_id,
                'district_id' => $request->district_id,
                'status' => 1 // Berikan default status aktif
            ]);

            return redirect('/costumer/login')->with('success', 'Pendaftaran Berhasil! Silakan Login.');
        } catch (\Exception $e) {
            // Jika error, kembali ke form dengan pesan error
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}