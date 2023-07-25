@extends('layouts.mainform')
@section('form')
<div class="register-box">
  <div class="register-logo">
    <b>Daftar Service</b>
  </div>

  <div class="card1">
    <div class="card-body register-card-body">
      <h5 class="login-box-msg text-bold">Data Kendaraan</h5>
    <div class="jenis">
      <p class="mb-1">Jenis Kendaraan:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->jenis }}" type="text" class="form-control" placeholder="" readonly>
      </div>
    </div>

   <div class="kendaraan">
    <p class="mb-1" >Nama Kendaraan:</p>
    <div class="input-group mb-1">
      <input value="{{ $aset->nama_kendaraan }}" id="nama_kendaraan" type="text" class="form-control small-input" style="max-width: 220px;" readonly>
    </div>
   </div>

   <div class="nopol">
      <p class="mb-1">Plat Nomer:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->nopol }}" type="text" class="form-control" style="max-width: 204px;" readonly>
      </div>
   </div>
   <div class="deskripsi">
      <p class="mb-1">Keterangan:</p>
      <div class="input-group mb-1">
        <textarea value="{{ $aset->deskripsi }}" type="text" class="form-control" placeholder="" readonly>{{ $aset->deskripsi }}</textarea>
      </div>
   </div>
<hr>

      
      @php
          $no=1;
      @endphp
      @foreach ($aset->service->where('status', 1) as $service)

      <h5 class="login-box-msg text-bold">Detail Bengkel ({{ $service->nama_bengkel }})</h5>

      <p class="mb-1">Nama Bengkel:</p>

      <div class="input-group mb-1">
          <input name="nama_bengkel" value="{{ $service->nama_bengkel }}" type="text" class="form-control" placeholder="Nama Bengkel" disabled>
        </div>
        
      <p class="mb-1">Alamat Bengkel:</p>

        <div class="input-group mb-1">
          <input name="alamat_bengkel" value="{{ $service->alamat_bengkel }}" type="text" class="form-control" placeholder="Alamat Bengkel" disabled>
        </div>

        <p class="mb-1">Nomor Telepon Bengkel:</p>

        <div class="input-group mb-1">
          <input name="alamat_bengkel" value="{{ $service->nohp_bengkel }}" type="text" class="form-control" placeholder="Alamat Bengkel" disabled>
        </div>

        <p class="mb-1">Deskripsi Bengkel:</p>

        <div class="input-group mb-1">
          <textarea name="alamat_bengkel" value="{{ $service->deskripsi_bengkel }}" type="text" class="form-control" placeholder="Alamat Bengkel" disabled>{{ $service->deskripsi_bengkel }}</textarea>
        </div>
        <hr>

      <h5 class="login-box-msg text-bold">Perbaikan {{ $no++ }}</h5>
           
       
      <form class="mt-2" action="" method="get">
        @csrf

        <p class="mb-1">Kegiatan Service:</p>

        <div class="input-group mb-1">
          <input value="{{ $service->nama_kegiatan }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        </div>

        <p class="mb-1">Tanggal Kegiatan:</p>

        <div class="input-group mb-1">
          <input name="tanggal_kegiatan" value="{{ $service->tanggal_kegiatan }}" type="date" class="form-control" placeholder="Tanggal Kegiatan" disabled>
        </div>

        <p class="mb-1">Kilometer Tiba:</p>

        <div class="input-group mb-1">
          <input value="{{ $service->kilometer_tiba }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        </div>

        <p class="mb-1">kilometer Kembali:</p>

        <div class="input-group mb-1">
          <input value="{{ $service->kilometer_kembali }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        </div>

        <p class="mb-1">Saran:</p>

          <div class="input-group mb-1">
            <textarea name="saran" value="{{ $service->saran }}" type="text" class="form-control" placeholder="Saran"disabled>{{ $service->saran }}</textarea disabled>
          </div>
        <hr>
        
        </form>
        @endforeach
        <a href="/tableaset" class="btn btn-danger btn-block">Kembali</button></a>

  </div>
</div>
@endsection


