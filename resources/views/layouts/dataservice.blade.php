@extends('layouts.main')
@section('content')
        
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Master Nama Service</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Nama Service</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Master Nama Service</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO</th>
                                                <th class="text-center">Nomor Polisi</th>
                                                <th class="text-center">Nama Kegiatan</th>
                                                <th class="text-center">Tanggal Kegiatan</th>
                                                <th class="text-center">Nama Bengkel</th>
                                                <th class="text-center">Alamat Bengkel</th>
                                                <th class="text-center">Kilometer tiba</th>
                                                <th class="text-center">Kilometer Kembali</th>
                                                <th class="text-center">Saran</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        
                                            
                                        
                                            
                                        
                                        <tbody>
                                            @foreach ($services as $service)
                                            
                                                <tr>
                                                    {{-- <td>
                                                        <div class="visible-print text-center">
                                                            {!! QrCode::size(125)->generate() !!}
                                                        </div>
                                                    </td> --}}
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $service->aset->nopol }}</td> 
                                                    <td class="text-center">{{ $service->nama_kegiatan }}</td>
                                                    <td class="text-center">{{ $service->tanggal_kegiatan }}</td>
                                                    <td class="text-center">{{ $service->nama_bengkel }}</td>
                                                    <td class="text-center">{{ $service->alamat_bengkel }}</td>
                                                    <td class="text-center">{{ $service->kilometer_tiba }}</td>
                                                    <td class="text-center">{{ $service->kilometer_kembali }}</td>
                                                    <td class="text-center">{{ $service->saran }}</td>
                                                    <td>
                                                        <a href="{{ route('tampilservice', ['id' => $service->id]) }}" type="button"
                                                            class="btn btn-warning"><i
                                                                class="bi bi-pencil-square"></i></a>
                                                        <a href="#" type="button" data-id="{{ $service->id }}"
                                                            data-platnomer="{{ $service->aset->nopol }}"
                                                            class="btn btn-danger delete"><i class="bi bi-trash3"></i></a>
                                                    </td>
                                                </tr>
                                           
                                            @endforeach
                                        </tbody>
                                        

                                        
                                        
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
          @endsection
    <!-- ./wrapper -->

    <!-- jQuery -->
    {{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> --}}
        
    @push('js')
        
    <script>
        $(document).ready(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        //delete alert
        $('.delete').click(function() {
            var asetid = $(this).attr('data-id');
            var platnomer = $(this).attr('data-platnomer');
            Swal.fire({
                title: 'Apakah Kamu Yakin?',
                text: "kamu akan menghapus data service kendaraan dengan plat nomer " + platnomer + " ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/deleteservice/" + asetid + ""
                    Swal.fire(
                        'Sukses!',
                        'Aset kendaraan mu sukses terhapus.',
                        'success'
                    )
                }
            });
        });
    </script>
    <script>
        @if (Session::has('success'))
          toastr.success("{{ Session::get('success') }}")
          @elseif (Session::has('info'))
            toastr.error("{{ Session::get('info') }}")
        @endif
    </script>
   @endpush
