<?php

namespace App\Http\Controllers;

use App\CandidateInfo;
use App\GuestContactInfo;
use App\MailSubcriber;
use Illuminate\Http\Request;
use App\ContactInfo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Purifier;
use Validator;
use App\Job;
class ContactUsPublicController extends Controller
{
    //
    public function storeContact(Request $request) {
        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max:200',
                'phone' => 'required|max:20',
                'email' => 'required|email',
                'address' => 'required|max:200',
                'title' => 'required|max:200',
                'contentlienhe' => 'required',
            ]);
            if(!$validate->fails()) {
                $newContact = new ContactInfo();
                $newContact->name = $request->name;
                $newContact->phone = $request->phone;
                $newContact->email = $request->email;
                $newContact->address = $request->address;
                $newContact->title = $request->title;
                $newContact->content = Purifier::clean($request->contentlienhe);

                $newContact->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => "Something went wrong! Please try again later ."
            ],400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ],500);
        }
    }

    public function storeCandidateContact(Request $request) {
//        return $request
        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max:200',
                'phone' => 'required|max:20',
                'email' => 'required|email',
                'address' => 'required|max:200',
                'current_post' => 'required|max:200',
                'expect_post' => 'required|max:200',
                'industry' => 'required|max:200',
                'language' => 'required|max:200',
                'current_salary' => 'required|max:200',
                'expect_salary' =>  'required|max:200',
                'gioithieu' => 'required',
                'file' => 'sometimes|file|max:3072',
                'job_id' => 'required|max:200',
            ]);
            if(!$validate->fails()) {
                $newContact = new CandidateInfo();
                $newContact->name = $request->name;
                $newContact->phone = $request->phone;
                $newContact->email = $request->email;
                $newContact->address = $request->address;
                $newContact->current_position = $request->current_post;
                $newContact->expected_position = $request->expect_post;
                $newContact->industry = $request->industry;
                $newContact->language_skills = $request->language;
                $newContact->current_salary = $request->current_salary;
                $newContact->expected_salary = $request->expect_salary;
                $newContact->gioithieu = Purifier::clean($request->gioithieu);

                if($request->hasFile('file')) {
                    $file = $request->file('file');
                    if(in_array(strtolower($file->getClientOriginalExtension()),['pdf','doc','docx','png','jpg','jpeg','xlxs'])) {
                        $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                        $newContact->file = $fileName;
                        $newContact->file_type = $file->getClientOriginalExtension();
                        Storage::disk('public')->put($fileName,File::get($file));
                    }
                }
                if($request->job_id != '-1' && $request->job_id != -1) {
                    Job::increaseApplyNumber($request->job_id);
                    $newContact->job_id = $request->job_id;
                }
                $newContact->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => "Something went wrong! Please try again later ."
            ],400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ],500);
        }
    }

    public function storeGuestContact(Request $request) {
        try {
            $validate = Validator::make($request->all(),[
                'name' => 'required|max:200',
                'phone' => 'required|max:20',
                'email' => 'required|email',
                'address' => 'required|max:200',
                'title' => 'required|max:200',
                'contentlienhe' => 'required',
            ]);
            if(!$validate->fails()) {
                $newContact = new GuestContactInfo();
                $newContact->name = $request->name;
                $newContact->phone = $request->phone;
                $newContact->email = $request->email;
                $newContact->address = $request->address;
                $newContact->title = $request->title;
                $newContact->content = Purifier::clean($request->contentlienhe);

                $newContact->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => "Something went wrong! Please try again later ."
            ],400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ],500);
        }
    }

    public function storeInMailSubscribe(Request $request) {
        try {
            $validate = Validator::make($request->all(),[
                'job_type_id' => 'required|numeric',
                'province_ìd' => 'required|numeric',
                'email' => 'required|email',
            ]);
            if(!$validate->fails()) {
                $newContact = new MailSubcriber();
                $newContact->email = $request->email;
                $newContact->job_type_id = $request->job_type_id;
                $newContact->province_id = $request->province_ìd;
                $newContact->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Cám ơn bạn đã gửi thông tin , bên chúng tôi sẽ liên hệ với bạn trong thời gian gần nhất'
                ], 200);
            }
            return response()->json([
                'success' => false,
                'message' => "Something went wrong! Please try again later ."
            ],400);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e,
            ],500);
        }
    }
}
