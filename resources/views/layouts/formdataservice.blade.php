@extends('layouts.mainform')
@section('form')
<div class="register-box">
  <div class="register-logo">
    <b>Input Service</b>
  </div>

  <div class="card1">
    <div class="card-body register-card-body">
      <h5 class="login-box-msg text-bold">Data Kendaraan</h5>

      <p class="mb-1">Jenis Kendaraan:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->jenis }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
      </div>

      <p class="mb-1">Nama Kendaraan:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->nama_kendaraan }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        
      </div>


      <p class="mb-1">Plat Nomor:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->nopol }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        
      </div>
      {{-- <div class="input-group mb-3">
        <input value="{{ $aset->nohp }}" type="text" class="form-control" id="input1" placeholder="Nama Kegiatan" disabled>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class=""></span>
          </div>
        </div>
      </div> --}}
      <p class="mb-1">Keterangan:</p>
      <div class="input-group mb-1">
        <input value="{{ $aset->deskripsi }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        
      </div>
      <hr>
      <h5 class="login-box-msg text-bold">Identitas Bengkel</h5>
      <form class="mt-1" action="{{ route('insertservice', ['id' => request('id') ]) }}" method="post">
        @csrf
        
        <input value="{{ $aset->id }}" name="aset_id" type="hidden" class="form-control" placeholder="Nama Kegiatan" hidden>
        
      <p class="mb-1">Nama Bengkel:</p>
        <div class="input-group mb-1">
          <input name="nama_bengkel" type="text" class="form-control" placeholder="Nama Bengkel" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('nama_bengkel')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
      <p class="mb-1">Alamat Bengkel:</p>
        <div class="input-group mb-1">
          <input name="alamat_bengkel" type="text" class="form-control" placeholder="Alamat Bengkel" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('alamat_bengkel')

        <div class="alert alert-danger">{{ $message }}</div>
          @enderror

      <p class="mb-1">Nomor Telpon Bengkel:</p>
          <div class="input-group mb-1">
            <input name="nohp_bengkel" type="number" class="form-control" placeholder="Nomor Telepon Bengkel" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('nohp_bengkel')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror


      <p class="mb-1">Deskripsi Bengkel:</p>
          <div class="input-group mb-1">
            <textarea name="deskripsi_bengkel" type="text" class="form-control" placeholder="Deskripsi Bengkel" required></textarea required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class=""></span>
                </div>
              </div>
          </div>
          @error('deskripsi_bengkel')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
         <hr>
      <h5 class="login-box-msg text-bold">Form Service</h5>

      <p class="mb-1">Kegiatan Service:</p>
        <div class="input-group mb-1">
          <input name="nama_kegiatan" maxlength="255" type="text" class="form-control" placeholder="Kegiatan Service" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('nama_kegiatan')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

      <p class="mb-1">Tanggal:</p>
        <div class="input-group mb-1">
          <input name="tanggal_kegiatan" value="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" style="max-width: 150px;" placeholder="Tanggal Kegiatan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('tanggal_kegiatan')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
      <p class="mb-1">Kilometer Tiba:</p>
          <div class="input-group mb-1">
            <input name="kilometer_tiba" type="number" class="form-control" placeholder="Kilometer Tiba">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('kilometer_tiba')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

      <p class="mb-1">Kilometer Kembali:</p>
          <div class="input-group mb-1">
            <input name="kilometer_kembali" type="number" class="form-control" placeholder="Kilometer Kembali">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('kilometer_kembali')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

      <p class="mb-1">Saran/Keterangan:</p>
          <div class="input-group mb-1">
            <textarea name="saran" type="text" class="form-control" placeholder="Saran/Keterangan" required></textarea required>
            <div class="input-group-append ">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('saran')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
          {{-- <a href="/tableaset" class="btn btn-danger btn-block">Kembali</button></a> --}}
      </form>

    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection
<!-- /.register-box -->





