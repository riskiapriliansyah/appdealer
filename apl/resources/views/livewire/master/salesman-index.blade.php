<div>
    @if ($addMode == true)
        <div class="card overflow-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK (Nomor Induk Karyawan)</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="nik">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="nama">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="alamat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No Telp</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="no_telp">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select wire:model.lazy="jenis_kelamin" class="form-control form-control-sm">
                                <option value="">Pilih</option>
                                @foreach ($data['jenis_kelamin'] as $jk)
                                    <option value="{{$jk->val1}}">{{$jk->val2}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group float-right">
                    <button class="btn btn-success btn-sm" wire:click="store">Simpan</button>
                    <button class="btn btn-danger btn-sm" wire:click="close">Close</button>
                </div>
            </div>
        </div>
    @endif
    <div class="card overflow-auto">
        <div class="card-body">
            <button class="btn btn-primary btn-sm" wire:click="add">Add Data</button>
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['karyawan'] as $k)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$k->nik}}</td>
                            <td>{{$k->nama}}</td>
                            <td>{{$k->no_telp}}</td>
                            <td>{{$k->email}}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" wire:click="show('{{$k->nik}}')">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
