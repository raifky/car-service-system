@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Master Nama Kendaraan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Nama Kendaraan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h5 class="row justify-content-center mb-3">Cari Menggunakan Plat Nomor Kendaraan</h5>

            <form action="/tableaset">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari Menggunakan Plat Nomor Kendaraan" name="search" value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>
</section>
<div class="card mr-3 ml-3">
    <div class="card-header">
        <h3 class="card-title">Tambahkan Data</h3>
        <div class="">
            <a href="forminputaset"><button type="button" class="btn btn-primary plus float-right">Tambahkan Data</button></a>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Master Nama Kendaraan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">QR Code</th>
                                    <th class="text-center">Jenis Kendaraan</th>
                                    <th class="text-center">Nama Kendaraan</th>
                                    {{-- <th class="text-center">Nama_Kegiatan</th> --}}
                                    <th class="text-center">Nomor Polisi</th>
                                    <th class="text-center">Nomor HP</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                @foreach ($aset as $asets)
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                {{ $no++ }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="visible-print text-center">
                                                {!! QrCode::size(125)->format('svg')->generate(route('forminputservice', ['id' => $asets->id])) !!}
                                            </div>
                                        </td>
                                        {{-- <td>{{ $asets->services->nama_kegiatan }}</td> --}}
                                        <td class="text-center">{{ $asets->jenis }}</td>
                                        <td class="text-center">{{ $asets->nama_kendaraan }}</td>
                                        <td class="text-center">{{ $asets->nopol }}</td>
                                        <td class="text-center">{{ $asets->nohp }}</td>
                                        <td class="text-center">{{ $asets->deskripsi }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('tampilaset', ['id' => $asets->id]) }}" type="button"
                                                class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                            <a href="#" type="button" class="btn btn-danger delete"
                                                data-id="{{ $asets->id }}"
                                                data-platnomer="{{ $asets->nopol }}"><i
                                                    class="bi bi-trash3"></i></a>
                                            <a href="{{ route('forminputservice', ['id' => $asets->id]) }}"
                                                type="button" class="btn btn-primary"><i
                                                    class="bi bi-arrow-right-square"></i></a>
                                            <a href="{{ route('read', ['id' => $asets->id]) }}" type="button"
                                                class="btn btn-success"><i class="bi bi-journal"></i></a>
                                            <a href="{{ route('qrkode', ['id' => $asets->id]) }}" type="button"
                                                class="btn btn-light"><i class="bi bi-printer"></i></a>
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
@endsection
    

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
                text: "Kamu Akan Menghapus aset kendaraan dengan plat nomer " + platnomer + " ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location =  "/deleteaset/" + asetid + "";
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

    

