<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::where(function ($query) use ($request) {
            if ($request->name)
                $query->where('name', 'like', '%' . $request->name . '%');

            if ($request->category)
                $query->where('category', 'like', '%' . $request->category . '%');
        })->get();
        return view('admin.services.index', ['services' => $services]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        Service::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.dashboard.services.index')->with('success', 'Serviço criado com sucesso');
    }

    public function show(Service $service)
    {
        return view();
    }

    public function edit(Service $service, $id)
    {
        $service = Service::where('id', $id)->first();
        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Request $request, Service $service, $id)
    {
        Service::where('id', $id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
        ]);
        return redirect()->route('admin.dashboard.services.index')->with('success', 'Serviço editado com sucesso');
    }

    public function destroy(Service $service, $id)
    {
        Service::where('id', $id)->delete();
        return redirect()->route('admin.dashboard.services.index')->with('success', 'Serviço deletado com sucesso');
    }

    public function homeSite(Service $service)
    {
      $services = Service::all();
      return view("site.index", ['services' => $services]);
    }
}
