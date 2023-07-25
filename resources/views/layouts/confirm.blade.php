@extends('layouts.mainform')
@section('form')
    <div class="register-box">
        <div class="register-logo">
            <b>Konfirmasi Service</b>
        </div>


        <div class="card2">
            <div class="card-body register-card-body">
                <h5 class="login-box-msg text-bold">Informasi Kendaraan</h5>
                <div class="jenis">
                  <p class="mb-1">Jenis Kendaraan:</p>
  
                  <div class="input-group mb-1">
                      <input value="{{ $service->aset->jenis }}" type="text" class="form-control" placeholder="" disabled>
                  </div>


                </div>
                 <div class="nama_kendaraan">

                   <p class="mb-1">Nama Kendaraan:</p>
   
                   <div class="input-group mb-1">
                       <input value="{{ $service->aset->nama_kendaraan }}" type="text" class="form-control" style="max-width: 220px;" disabled>
                       
                   </div>
                 </div>
                <div class="nopol">
                  <p class="mb-1">Plat Nomor:</p>
  
                  <div class="input-group mb-1">
                      <input value="{{ $service->aset->nopol }}" type="text" class="form-control" style="max-width: 204px;"
                          disabled>
                      
                  </div>

                </div>
                
                <div class="deskripsi">

                  <p class="mb-1">Keterangan:</p>
                    <div class="input-group mb-1">
                        <textarea value="{{ $service->aset->deskripsi }}" type="text" class="form-control"
                            placeholder="Nama Kegiatan" disabled>{{ $service->aset->deskripsi }}</textarea>
                        
                    </div>
                    <hr>
                </div>

        <div class="judul_identitas">
          <h5 class="login-box-msg text-bold">Identitas Bengkel</h5>
        
      <p class="mb-1">Nama Bengkel:</p>
        <div class="input-group mb-1">
          <input value="{{ $service->nama_bengkel }}" type="text" class="form-control" placeholder="Nama Bengkel" disabled>
          
        </div>
        
        
      <p class="mb-1">Alamat Bengkel:</p>
        <div class="input-group mb-1">
          <input value="{{ $service->alamat_bengkel }}" type="text" class="form-control" placeholder="Alamat Bengkel" disabled>
          
        </div>
        

      <p class="mb-1">Nomor Telpon Bengkel:</p>
          <div class="input-group mb-1">
            <input value="{{ $service->nohp_bengkel }}" type="number" class="form-control" placeholder="Nomor Telepon Bengkel" disabled>
            
          </div>
          


      <p class="mb-1">Deskripsi Bengkel:</p>
          <div class="input-group mb-1">
            <textarea value="{{ $service->deskripsi_bengkel }}" type="text" class="form-control" placeholder="Deskripsi Bengkel" disabled>{{ $service->deskripsi_bengkel }}</textarea>
            
          </div>
          
         <hr>
        </div>
      <div class="judul_identitas">

      <h5 class="login-box-msg text-bold">Form Service</h5>

      <p class="mb-1">Nama Service:</p>
        <div class="input-group mb-1">
          <input value="{{ $service->nama_kegiatan }}" maxlength="255" type="text" class="form-control" placeholder="Nama Kegiatan" disabled>
          
        </div>
        
      <div class="tanggal_kegiatan">

        <p class="mb-1">Tanggal Service:</p>
          <div class="input-group mb-1">
            <input value="{{ $service->tanggal_kegiatan }}" type="date" class="form-control" style="max-width: 220px;" disabled>
            
          </div>
      </div>
        
      @if ($service->kilometer_tiba)

      <p class="mb-1">Kilometer Tiba:</p>
      <div class="input-group mb-1">
        <input value="{{ $service->kilometer_tiba }}" type="number" class="form-control" style="max-width: 220px;" disabled>
        
      </div>
      @elseif ($service->kilometer_tiba == null)

      <p class="mb-1">Kilometer Tiba:</p>
      <div class="input-group mb-1">
        <input value="-" type="number" class="form-control" placeholder="-" style="max-width: 220px;" disabled>
        
      </div>
      @endif
      
          
      @if ($service->kilometer_kembali)
      <div class="kilometer_tiba">

        <p class="mb-1">Kilometer Kembali:</p>
            <div class="input-group mb-1">
              <input value="{{ $service->kilometer_kembali }}" type="number" class="form-control" style="max-width: 204px;" disabled>
              
            </div>
      </div>
          @elseif ($service->kilometer_kembali == null)
          <div class="kilometer_kembali">
            <p class="mb-1">Kilometer Kembali:</p>
            <div class="input-group mb-1">
              <input value="-" type="number" class="form-control" placeholder="-" style="max-width: 204px;" disabled>
              
            </div>

          </div>
      @endif
          
         <div class="saran">

           <p class="mb-1">Saran/Keterangan:</p>
               <div class="input-group mb-1">
                 <textarea value="{{ $service->saran }}" type="text" class="form-control" placeholder="Saran/Keterangan" disabled>{{ $service->saran }}</textarea>
                 
               </div>
         </div>
          
                {{-- @foreach ($services as $row) --}}

                <form class="confirm_form" action="/editstatus/{{ $service->id }}" method="post">
                    @csrf
                    <h3> Apakah Anda yakin Untuk Service Mobil Ini?</h3>

                    <button type="submit" name="konfirmasi" id="konfirmasi" class="btn btn-success btn-block"value="ya">Ya, Konfirmasi</button>
                    
                </form>
              </div>



            </div>
        </div>
    @endsection


    





