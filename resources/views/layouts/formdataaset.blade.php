@extends('layouts.mainform')
@section('form')
    <div class="register-box">
        <div class="register-logo">
            <b>Data Kendaraan</b>
        </div>

        <div class="card1">
            <div class="card-body register-card-body">
                <h5 class="login-box-msg text-bold">Isi Data</h5>

                <form class="" action="/insertaset" method="post">
                    @csrf
                    <p class="mb-1">Jenis Kendaraan:</p>
                    <div class="input-group mb-3">
                      <select name="jenis" class="form-control" required>
                       <option selected>Pilih Jenis Kendaraan</option disabled>
                       <option value="Mobil(kendaraan Roda Empat)">Mobil(kendaraan Roda Empat)</option>
                       <option value="Motor(kendaraan Roda Dua)">Motor(kendaraan Roda Dua)</option>
                       <option value="Sepeda(kendaraan Roda Dua)">Sepeda(kendaraan Roda Dua)</option>
                      </select>
                          <div class="input-group-append" required>
                            <div class="input-group-text">
                            </div>
                        </div>
                    </div>
                    @error('nama_kendaraan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <p class="mb-1">Nama Kendaraan:</p>
                    <div class="input-group mb-3">
                        <input name="nama_kendaraan" type="text" maxlength="" class="form-control" placeholder="Nama Kendaraan">
                        <div class="input-group-append" required>
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>

                    </div>
                    @error('nama_kendaraan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <p class="mb-1">Plat Nomor:</p>
                    <div class="input-group mb-3">
                        <input name="nopol" type="text" maxlength="12" class="form-control" placeholder="Nomor Polisi">
                        <div class="input-group-append" required>
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>

                    </div>
                    @error('nopol')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <p class="mb-1">Nomor HP:</p>
                    <div class="input-group mb-3">
                        <input name="nohp" type="number" maxlength="15" class="form-control" placeholder="Nomor HP"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                    @error('nohp')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <p class="mb-1">Deskripsi:</p>
                    <div class="input-group mb-3">
                        <textarea name="deskripsi" maxlenght="5" class="form-control" placeholder="Deskripsi" required></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>
                    </div>
                    @error('deskripsi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                    <a href="/tableaset" class="btn btn-danger btn-block">Kembali</button></a>
                </form>

                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    @endsection
    <!-- /.register-box -->

    <!-- jQuery -->
