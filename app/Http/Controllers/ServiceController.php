<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Session;
use App\Models\service;
use App\Models\aset;

class ServiceController extends Controller
{
    public function forminputservice($id)
    {

        $aset = Aset::find($id);

        return view('layouts.formdataservice', compact('aset'), [ 'title' => 'Input Data Service']);
    }
    
    public function insertservice(Request $request, $id)
    {    
    $this->validate($request, [
        'nama_bengkel' => 'required|max:255',
        'alamat_bengkel' => 'required|max:255',
        'nohp_bengkel' => 'required|max:20',
        'deskripsi_bengkel' => 'required|max:255',
        'nama_kegiatan' => 'required|min:5|max:255',
        'tanggal_kegiatan' => 'required',
        'kilometer_tiba' => 'max:255',
        'kilometer_kembali' => 'max:255',
        'saran' => 'required|max:255'          
    ]);

    $service = Service::create($request->all());

    $aset = Aset::find($id);
    $nohp = $aset->nohp;

    $this->send($service->id, $nohp);

    Session::forget('success');

    return redirect()->route('tableaset')->with([
        'success' => 'Mohon Verifikasi Data Service Anda Melalui WhatsApp Anda',
        'info' => 'Data Tidak Berhasil di Tambahkan!!',
    ]);
    

    }

    public function verifikasi($id){

        // $service = Service::find($id);
        $service = Service::with('aset')->find($id);

        
        return view('layouts.confirm', compact('service'), ['title' => 'Verifikasi Service']);
    }
    public function send($id, $nohp)
{
    $curl = curl_init();
    $token = " mf7hQyQDva76fnSmmDSzShCqgw9bCOv0H61wDdsqMfDlzm2cy3t59Myejj7F3x82";


    // $aset = Aset::find($id);
    // $aset->services->save($service);
    
    
    // if($aset){
        // $nomor = '62' . substr($nohp, 1);
    

    $data = [
        'phone' => $nohp,
        'message' => route('verifikasi', ['id' => $id]),
    ];
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: $token"));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_URL, "https://solo.wablas.com/api/send-message");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($curl);
    curl_close($curl);

    // Mengembalikan hasil curl_exec sebagai nilai kembali dari fungsi send
    return $result;
    // }else{
    //     return "Nomor tidak ada";
    // }
}

    public function editservice(Request $request, $id)
    {   
        $this->validate($request,[
            'nama_kegiatan' => 'required|min:5|max:255',
            'tanggal_kegiatan' => 'required',
            'nama_bengkel' => 'required|max:255',
            'alamat_bengkel' => 'required|max:255',
            'kilometer_tiba' => 'required|max:15',
            'kilometer_kembali' => 'required|max:15',
            'saran' => 'required|max:255'
            
        ]);

        $service = Service::find($id);
        $service->update($request->all());

        Session::forget('success');

        return redirect()->route('tableservice')->with([
            'success' => 'Data Berhasil Di Update',
            'info' => 'Gagal Update data!!',
        ]);
    }
    public function tampilservice($id)
    {

        $service = Service::with('aset')->find($id);


        return view('layouts.tampildataservice', compact('service'), ['title' => 'Edit Data Service']);
    }
    public function deleteservice($id)
    {

        $service = Service::find($id);
        $service->delete();
        return redirect()->route('tableservice');
    }
    public function tableservice(){
        $services = Service::with('aset')->get();
        
        return view('layouts.dataservice', compact('services'), ['title' => 'Master Nama Service']);
    }
    
    // public function terkonfirmasi(Request $request, $id){
        
    //     if ($request->has('konfirmasi')) {
    //         $konfirmasi = $request->input('konfirmasi');
    //         if ($konfirmasi === 'ya') {

    //             Service::update(['status' => 1]);
    //             return redirect()->route('tableaset')->with([
    //                 'success' => 'Data Berhasil Di Tambahkan',
    //                 'info' => 'Data Tidak Berhasil di Tambahkan!!',
    //             ]);
    //         } elseif ($konfirmasi === 'tidak') {
    //             return redirect()->route('tableaset');
    //         }
    //     }

    //     return 'Invalid Request';
    // }
    public function editstatus(Request $request, $id){

        Service::where('id', $id)->update(['status' => 1]);

        Session::forget('success');
 
        return redirect()->route('tableaset')->with([
            'success' => 'Data Service Berhasil Di Tambahkan',
            'info' => 'Gagal Menambahkan Data!!',
        ]);
    }
}