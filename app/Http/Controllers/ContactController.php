<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function update(Request $request, int $id): RedirectResponse
    {
        /** @var Contact $contact */
        $contact = Contact::query()->findOrFail($id);

        if ($contact->name !== $request->input('name')) {
            $contact->name = $request->input('name');
        }

        if ($contact->contact !== $request->input('contact')) {
            $contact->contact = $request->input('contact');
        }

        $contact->save();

        return redirect()->route('about');
    }
}
