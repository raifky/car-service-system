@extends('layouts.mainform')
@section('form')
<div class="register-box">
  <div class="register-logo">
    <b>Edit Aset</b>
  </div>

  <div class="card1">
    <div class="card-body register-card-body">
      <h5 class="login-box-msg text-bold">Edit Data</h5>

      <form class="mt-2" action="/editaset/{{ $aset->id }}" method="post">
        @csrf

        <p class="mb-1">Jenis Kendaraan:</p>
        <div class="container">
          <div class="input-group mb-3">
            <?php
// Array yang berisi opsi-opsi yang diperbolehkan
$opsiJenis = array(
    "Mobil(kendaraan Roda Empat)",
    "Motor(kendaraan Roda Dua)",
    "Sepeda(kendaraan Roda Dua)"
);

// Jika $aset->jenis tidak ada dalam $opsiJenis, tambahkan ke array $opsiJenis
if (!in_array($aset->jenis, $opsiJenis)) {
    $opsiJenis[] = $aset->jenis;
}

?>

<select name="jenis" class="form-control" required>
    <?php foreach ($opsiJenis as $jenis): ?>
        <option value="<?php echo $jenis; ?>" <?php if ($aset->jenis === $jenis) echo 'selected'; ?>><?php echo $jenis; ?></option>
    <?php endforeach; ?>
</select>

            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('jenis')
          <div class="alert alert-danger">{{ $message }}</div>
          
          @enderror

        <p class="mb-1">Nama Kendaraan:</p>
          <div class="input-group mb-3">
            <input name="nama_kendaraan" type="text" maxlength="15" value="{{ $aset->nama_kendaraan }}" class="form-control" placeholder="Nama Kendarran" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('nama_kenadaraan')
          <div class="alert alert-danger">{{ $message }}</div>
          
          @enderror

        <p class="mb-1">Plat Nomor:</p>
        <div class="input-group mb-3">
          <input name="nopol" type="text" maxlength="15" value="{{ $aset->nopol }}" class="form-control" placeholder="Nomor Polisi" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('nopol')

          <div class="alert alert-danger">{{ $message }}</div>

          @enderror

          <p class="mb-1">Nomor Handphone:</p>  
        <div class="input-group mb-3">
          <input name="nohp" type="number" maxlength="15" value="{{ $aset->nohp }}" class="form-control" placeholder="Nomor HP" required>
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
          <textarea name="deskripsi" value="{{ $aset->deskripsi }}" type="text" class="form-control" placeholder="Deskripsi" required>{{ $aset->deskripsi }}</textarea required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('deskripsi')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        
        <button type="submit" class="btn btn-success btn-block">Edit</button>
        <a href="/tableaset" class="btn btn-danger btn-block">Kembali</button></a>
      </form>

  </div>
</div>
@endsection
