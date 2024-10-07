<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $data = $request->only(['name', 'email', 'message']);
        $content = "Naam: {$data['name']}\nEmail: {$data['email']}\nBericht: {$data['message']}\n";
        
        Storage::disk('local')->put('contact_form.txt', $content);

        return redirect()->route('contact')->with('success', 'Bericht verstuurd!');
    }
}