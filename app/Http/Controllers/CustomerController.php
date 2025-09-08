<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

   
    public function create()
    {
        return view('customer.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        Customer::create($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan');
    }

  
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

   
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

  
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
            'email' => 'nullable|email',
            'catatan' => 'nullable|string',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $customer->update($request->all());

        return redirect()->route('customer.index')->with('success', 'Customer berhasil diupdate');
    }

   
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus');
    }
}
