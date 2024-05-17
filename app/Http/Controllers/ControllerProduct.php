<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function create()
    {
        return view('create');
    }


    public function details($id)
    {
        return view('details', ['id' => $id]);
    }

    public function modify($id)
    {
        return view('modify', ['id' => $id]);
    }

    public function delete($id)
    {
        return view('delete', ['id' => $id]);
    }
}
