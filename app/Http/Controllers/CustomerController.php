<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CustomersImport;

class CustomerController extends Controller
{
    public function index()
    {
        $provinces = \App\Models\Province::all();
        $customers = Customer::all();

        $customers = Customer::select('customers.*', 'provinces.name as provinsi', 'regencies.name as kabupaten')
                                ->leftJoin('provinces', 'customers.provinsi_id', '=', 'provinces.id')
                                ->leftJoin('regencies', 'customers.kabupaten_id', '=', 'regencies.id')
                                ->get();
        return view('pages.customers', compact('customers', 'provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string',
            'alamat' => 'required|string',
            'contact_person' => 'required|string',
            'telp' => 'required|string',
            'provinsi_id' => 'required|exists:provinces,id',
            'kabupaten_id' => 'required|exists:regencies,id',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Customer created successfully.');
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama_instansi' => 'required|string',
            'alamat' => 'required|string',
            'contact_person' => 'required|string',
            'telp' => 'required|string',
            'provinsi_id' => 'required|exists:provinces,id',
            'kabupaten_id' => 'required|exists:regencies,id',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
                         ->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
                         ->with('success', 'Customer deleted successfully.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        Excel::import(new CustomersImport, request()->file('file'));

        return redirect()->route('customers.index')
                         ->with('success', 'Customers imported successfully.');
    }
}
