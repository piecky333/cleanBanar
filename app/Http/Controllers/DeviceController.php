<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('device.index', compact('devices'));
    }

    public function create()
    {
        return view('device.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'main_area' => 'required|string|max:255',
            'sub_area' => 'nullable|string|max:255',
            'device_uid' => 'nullable|string|max:255|unique:devices',
            'status' => 'required|in:active,maintenance,inactive',
        ]);

        Device::create($request->all());

        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil ditambahkan!');
    }

    public function edit(Device $device)
    {
        return view('device.edit', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'main_area' => 'required|string|max:255',
            'sub_area' => 'nullable|string|max:255',
            'device_uid' => 'nullable|string|max:255|unique:devices,device_uid,' . $device->id,
            'status' => 'required|in:active,maintenance,inactive',
        ]);

        $device->update($request->all());

        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil diperbarui!');
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('admin.devices.index')->with('success', 'Perangkat berhasil dihapus!');
    }
}
