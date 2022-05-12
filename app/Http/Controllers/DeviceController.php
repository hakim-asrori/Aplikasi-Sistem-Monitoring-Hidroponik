<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'app_title' => "Device",
            'devices' => Device::all()
        ];
        return view('device.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_device' => 'required',
            'topic_publish' => 'required',
            'topic_subscribe' => 'required',
        ]);

        Device::create($validated);

        return back()->with('message', "<script>Swal.fire('Data berhasil tersimpan', '', 'success');</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_device' => 'required',
            'topic_publish' => 'required',
            'topic_subscribe' => 'required',
        ]);

        Device::where('id', $id)->update($validated);

        return back()->with('message', "<script>Swal.fire('Data berhasil tersimpan', '', 'success');</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Device::destroy($id);
        return back()->with('message', "<script>Swal.fire('Data berhasil dihapus', '', 'success');</script>");
    }
}
