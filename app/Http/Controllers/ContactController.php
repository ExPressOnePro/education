<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function update(Request $request, $id)
    {
        $contact = Contact::query()->find($id);

        // Сравнить старое значение с новым и обновить только измененные поля
        if ($request->has('name') && $contact->name !== $request->input('name')) {
            $contact->name = $request->input('name');
        }

        if ($request->has('contact') && $contact->contact !== $request->input('contact')) {
            $contact->contact = $request->input('contact');
        }

        if ($request->has('icon') && $contact->icon !== $request->input('icon')) {
            $contact->icon = $request->input('icon');
        }

        $contact->save();

        return redirect()->route('about');
    }


}
