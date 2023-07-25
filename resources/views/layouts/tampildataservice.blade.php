@extends('layouts.mainform')
@section('form')
<div class="register-box">
  <div class="register-logo">
    <b>Nama Service </b>
  </div>
  
  <div class="card1">
    <div class="card-body register-card-body">
      <h5 class="login-box-msg text-bold">Data Yang Ingin Di Perbaiki</h5>
      <div class="input-group mb-3">
        <input value="{{ $service->aset->nopol }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class=""></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input value="{{ $service->aset->nohp }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class=""></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <input value="{{ $service->aset->deskripsi }}" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class=""></span>
          </div>
        </div>
      </div>
      <h5 class="login-box-msg text-bold">Data</h5>

      <form class="mt-2" action="/editservice/{{ $service->id }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input name="nama_kegiatan" maxlength="255" value="{{ $service->nama_kegiatan }}" type="text" class="form-control" placeholder="Nama Kegiatan" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('nama_kegiatan')
          
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="input-group mb-3">
          <input name="tanggal_kegiatan" value="{{ $service->tanggal_kegiatan }}" type="date" class="form-control" placeholder="Tanggal Kegiatan" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class=""></span>
            </div>
          </div>
        </div>
        @error('tanggal_kegiatan')
          
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="input-group mb-3">
            <input name="nama_bengkel" maxlength="30" value="{{ $service->nama_bengkel }}" type="text" class="form-control" placeholder="Nama Bengkel" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('nama_bengkel')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="input-group mb-3">
            <input name="alamat_bengkel" value="{{ $service->alamat_bengkel }}" type="text" class="form-control" placeholder="Alamat Bengkel" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('alamat_bengkel')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="input-group mb-3">
            <input name="kilometer_tiba" value="{{ $service->kilometer_tiba }}" type="text" class="form-control" placeholder="Kilometer Tiba" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('kilometer_tiba')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="input-group mb-3">
            <input name="kilometer_kembali" value="{{ $service->kilometer_kembali }}" type="text" class="form-control" placeholder="Kilometer Kembali" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('kilometer_kembali')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="input-group mb-3">
            <textarea name="saran" value="{{ $service->saran }}" type="text" class="form-control" placeholder="Saran" required>{{ $service->saran }}</textarea required>
            <div class="input-group-append ">
              <div class="input-group-text">
                <span class=""></span>
              </div>
            </div>
          </div>
          @error('saran')
          
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <button type="submit" class="btn btn-success btn-block">Edit</button>
        <a href="/tableservice" class="btn btn-danger btn-block">Kembali</button></a>
      </form>

  </div>
</div>
@endsection
