<?php

namespace App\Http\Controllers;

use App\MailSubcriber;
use Illuminate\Http\Request;

class MailSubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isContactUsMailSubManager']);
    }
    //
    public function index(Request $request) {
        $mailSub = MailSubcriber::orderBy('created_at','desc')->paginate(20);
        if($request->isXmlHttpRequest()) {
            return response(
                view('layouts.admin.mail_subscriber.table', ['sub' => $mailSub, 'count' => count($mailSub)]),
                200,
                ['Content-Type', 'application/json']
            );
        }
        return view('layouts.admin.mail_subscriber.index')->with('sub', $mailSub)->with('count', count($mailSub));
    }

    public function delete(Request $request, $id) {
        $mailSub = MailSubcriber::find($id);
        if($mailSub !=null) {
            $mailSub->delete();
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => true,
                    'message' => "Đã xóa thành công!",
                ],200);
            } else {
                return redirect()->route('mailsubscriber.index');
            }
        } else {
            if($request->isXmlHttpRequest()) {
                return response()->json([
                    'success' => false,
                    'message' => "Not Found ! May be it has been delete !",
                ],404);
            }
        }
        return redirect()->route('404');
    }

    public function getSearch(Request $request) {
        $arrSearch = [
            'email' => $request->input('email',null),
            'location' => $request->input('location', null),
            'industry' => $request->input('industry', null),
        ];
        $data = MailSubcriber::getData($arrSearch);
        return response(
            view('layouts.admin.mail_subscriber.table', ['sub' => $data, 'count' => count($data), 'arrSearch' => $arrSearch]),
            200,
            ['Content-Type', 'application/json']
        );
    }

}
