<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function submit_contact_us(ContactUsRequest $request)
    {
        $request->validated();
        try{
            Mail::to('contact@oasisagroenterprise.com')->send( new ContactUsMail($request->all()));
            return $this->successResponse('Message was sent', []);
        }catch(\Exception $ex)
        {
            Log::critical($ex);
            Log::error($ex->getMessage(), ['id' => $ex->getCode(), 'file' => $ex->getFile(), 'line' => $ex->getLine()]);
            return $this->errorResponse($ex->getMessage());
        }
    }
}
