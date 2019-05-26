<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email|unique:subscribers'
    	]);

    	$subscribers = new Subscriber();
    	$subscribers->email = $request->email;
    	$subscribers->save();

    	return back()->withInfo('Email anda telah berhasil ditambahkan ke dalam daftar Subscriber kami');
    }

    public function index()
    {
    	$subscribers = Subscriber::latest()->get();

    	return view('admin.subscriber.index', compact('subscribers'));
    }

    public function destroy($subscriber)
    {
    	$subscriber = Subscriber::findOrFail($subscriber);
    	$subscriber->delete();

    	return back()->withInfo('Berhasil menghapus subscriber');
    }
}
