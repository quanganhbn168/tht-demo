<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $services = Service::with('category')->latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::pluck('name', 'id');
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $this->service->create($request);
        return redirect()->route('admin.services.index')->with('success', 'Tạo dịch vụ thành công.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::pluck('name', 'id');
        $images = $service->images->pluck('image')->toArray();
        return view('admin.services.edit', compact('service', 'categories','images'));
    }

    public function update(Request $request, Service $service)
    {
        $this->service->update($request, $service);
        return redirect()->route('admin.services.index')->with('success', 'Cập nhật dịch vụ thành công.');
    }

    public function destroy(Service $service)
    {
        $this->service->delete($service);
        return redirect()->back()->with('success', 'Xoá dịch vụ thành công.');
    }
}