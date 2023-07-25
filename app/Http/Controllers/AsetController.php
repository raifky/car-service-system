<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;

class AsetController extends Controller
{
    public function forminputaset(){
        return view('layouts.formdataaset', ['title' => 'Input Nama Aset']);
    }
    public function tableaset(){
        $aset = Aset::with('service');
        if(request('search')){
            $aset->where('nopol', 'like', '%' . request('search') . '%');
        }else{
            return view('layouts.dataaset', 
        ['title' => 'Master Nama Kendaraan',
          'aset' => $aset
        ]);
        }
        return view('layouts.dataaset', 
        ['title' => 'Master Nama Kendaraan',
          'aset' => $aset->get()
        ]);
        // $aset = Aset::all();

        // return view('layouts.dataaset', compact('aset'));
    }
    public function insertaset(Request $request){

        $this->validate($request,[
            'nama_kendaraan' => 'required|min:5|max:20',
            'jenis' => 'required',
            'nopol' => 'required|min:5|max:12',
            'nohp' => 'required|min:7|max:15',
            'deskripsi' => 'required'
            
        ]);
        
        Aset::create($request->all());

        Session::forget('success');

        return redirect()->route('tableaset')->with([
            'success' => 'Data Berhasil Di Tambahkan',
            'info' => 'Data Tidak Berhasil di Tambahkan!!',
        ]);
    }
    public function tampilqrcode(){

        $aset = Aset::all();

        return view('qrcode', compact('aset'));
    }
    public function editaset(Request $request, $id){

        $this->validate($request,[
            'nama_kendaraan' => 'required|min:5|max:20',
            'jenis' => 'required',
            'nopol' => 'required|min:5|max:15',
            'nohp' => 'required|min:7|max:15',
            'deskripsi' => 'required'
            
        ]);

        $aset = Aset::find($id);
        $aset->update($request->all());

        Session::forget('success');

        return redirect()->route('tableaset')->with([
            'success' => 'Data Berhasil Di Update',
            'info' => 'Gagal Update Data',
        ]);
    }
    public function tampilaset($id){
        $aset = Aset::find($id);

        return view('layouts.tampilaset', compact('aset'), ['title' => 'Edit Nama Aset']);
    }
    public function deleteaset($id){

        $aset = Aset::find($id);
        $aset->service()->delete();
        $aset->delete();
        return redirect()->route('tableaset');
    }
    public function read($id){
        
        $aset = Aset::with('service')->find($id);
        return view('layouts.formread', compact('aset'), ['title' => 'Detail Aset Dan Detail Perbaikan']);
    }
    public function search(){

        return view('layouts.searching', ['title' => 'Dashboard']);
    }
    public function qrkode($id)
{
    $aset = Aset::find($id);

    // Cek apakah aset ditemukan, jika tidak kembalikan respons dengan status 404
    if (!$aset) {
        abort(404);
    }

    // Proses pembuatan QR Code dan menyimpannya sebagai file sementara
    // Gantikan bagian ini dengan kode untuk membuat QR Code dari data aset
    $qrCodeData = route('forminputservice', ['id' => $aset->id]); // Ganti dengan data yang sesuai dari $aset
    $fileName = 'qr_code_' . $aset->nopol . '.png'; // Ubah nama file QR Code sesuai kebutuhan

    // Simpan QR Code sebagai file di folder "public"
    QrCode::size(300)->margin(6)->format('png')->generate($qrCodeData, public_path($fileName));

    // Memodifikasi gambar dengan menambahkan teks di atasnya
    $image = imagecreatefrompng(public_path($fileName));
    $fontColor = imagecolorallocate($image, 0, 0, 0); // Warna teks (hitam dalam contoh ini)
    $fontSize = 12; // Ukuran font teks

    // Teks pertama
    $x1 = 100; // Koordinat X teks pertama (posisi horizontal)
    $y1 = 18; // Koordinat Y teks pertama (posisi vertikal)
    $text1 = $aset->nopol; // Ganti dengan teks pertama yang ingin ditambahkan
    imagestring($image, $fontSize, $x1, $y1, $text1, $fontColor);

    // Teks kedua
    $x2 = 100; // Koordinat X teks kedua (posisi horizontal)
    $y2 = 1; // Koordinat Y teks kedua (posisi vertikal)
    $text2 = 'Plat Nomor:'; // Ganti dengan teks kedua yang ingin ditambahkan
    imagestring($image, $fontSize, $x2, $y2, $text2, $fontColor);

    // Simpan gambar yang telah dimodifikasi
    imagepng($image, public_path($fileName));
    imagedestroy($image);

    // Mengembalikan file QR Code sebagai respon download
    return $this->downloadQRCode($fileName);
}



     /**
     * Fungsi untuk mengirimkan file QR Code sebagai respon download.
     *
     * @param string $fileName
     * @return Response
     */
    private function downloadQRCode($fileName)
    {
        $file = public_path($fileName);

        if (file_exists($file)) {
            $headers = [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="' . basename($file) . '"',
            ];

            return response()->download($file, null, $headers);
        } else {
            abort(404);
        }
    }
    
}


    
    
    

