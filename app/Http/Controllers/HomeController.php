<?php


namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController
{
    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|string|max:20',
            'nip' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            Mail::to(env('MAIL_TO_ADDRESS', 'hello@example.com'))
                ->send(new ContactFormMail([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phoneNumber' => $request->phoneNumber,
                    'nip' => $request->nip,
                ]));

            return response()->json([
                'message' => 'Formularz został wysłany pomyślnie!',
            ]);
        } catch (\Exception) {
            return response()->json([
                'error' => 'Wystąpił błąd. Spróbuj ponownie.',
            ], 500);
        }
    }
}