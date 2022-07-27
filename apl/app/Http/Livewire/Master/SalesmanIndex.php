<?php

namespace App\Http\Livewire\Master;

use App\Models\Config;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SalesmanIndex extends Component
{
    public $nik, $nama, $alamat, $no_telp, $email, $jenis_kelamin;
    public $addMode = false;

    public function add()
    {
        $this->addMode = true;
    }
    public function close()
    {
        $this->addMode = false;
        $this->nik = "";
        $this->nama = "";
        $this->alamat = "";
        $this->no_telp = "";
        $this->email = "";
        $this->jenis_kelamin = "";
    }

    public function store()
    {
        $k = Karyawan::where('nik', $this->nik)->first();
        if(!isset($k)){
            try{
                DB::beginTransaction();
                $u = new User;
                $u->role = "sales";
                $u->name = $this->nama;
                $u->email = $this->email;
                $u->password = bcrypt($this->nik);
                $u->save();

                $k = new Karyawan;
                $k->user_id = $u->id;
                $k->nik = $this->nik;
                $k->nama = $this->nama;
                $k->alamat = $this->alamat;
                $k->no_telp = $this->no_telp;
                $k->email = $this->email;
                $k->jenis_kelamin = $this->jenis_kelamin;
                $k->jabatan = "sales";
                $k->bagian = "marketing";
                $k->save();
                DB::commit();
                $this->close();
                session()->flash("sukses", "Berhasil Tambah Data");
            }catch(\Exception $ex){
                DB::rollBack();
               dd($ex->getMessage());
            }
        }else{
            try{
                DB::beginTransaction();
                $u = User::where('id', $k->user_id)->first();
                $u->name = $this->nama;
                $u->email = $this->email;
                $u->save();

                $k->nik = $this->nik;
                $k->nama = $this->nama;
                $k->alamat = $this->alamat;
                $k->no_telp = $this->no_telp;
                $k->email = $this->email;
                $k->jenis_kelamin = $this->jenis_kelamin;
                $k->save();
                DB::commit();
                $this->close();
                session()->flash("sukses", "Berhasil Update Data");
            }catch(\Exception $ex){
                DB::rollBack();
                dd($ex->getMessage());
            }
        }
    }

    public function show($nik)
    {
        $this->addMode = true;
        $k = Karyawan::where('nik', $nik)->first();
        $this->nik = $k->nik;
        $this->nama = $k->nama;
        $this->alamat = $k->alamat;
        $this->no_telp = $k->no_telp;
        $this->email = $k->email;
        $this->jenis_kelamin = $k->jenis_kelamin;
    }

    public function render()
    {
        $data = [
            'jenis_kelamin' => Config::where('key', "jenis_kelamin")->get(),
            "karyawan" => Karyawan::where("jabatan", "sales")->get()
        ];
        return view('livewire.master.salesman-index', compact("data"));
    }
}
