<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;



class AuthenticationController extends Controller {

    public function __construct() {
    }

    public function login(Request $request){
        $data = '';
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            $user = Auth::user();
            if($user->status == '1') {
                $token = $user->createToken('C4B')->accessToken;
                $status = TRUE;
                $message = 'LOGGED_IN_SUCCESSFULLY';
                $data = $token;
            } else {
                $status = FALSE;
                $message = 'USER_BLOCKED';
            }
        } else {
            $status = FALSE;
            $message = 'AUTHENTICATION_FAILED';
        }
        return Response::json(['status'=>$status,'message'=>$message,'token'=>$data]);
    }

    public function registration(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required'
        ]);
        if(! $validator->fails()) {
            $product = new User;
            $product->name = $request->name;
            $product->email = $request->email;
            $product->email_verified_at = date('Y-m-d H:i:s');
            $product->password = Hash::make($request->password);
            $product->status = '1';
            $product->save();
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
                $user = Auth::user();
                $token = $user->createToken('C4B')->accessToken;
                $data = $token;
            }
            $status = TRUE;
            $message = 'REGISTRATION_SUCCESSFUL';
        } else {
            $status = FALSE;
            $custom_message = $validator->errors()->all();
            $message = $custom_message['0'];
            $data = '';
        }
        return Response::json(['status'=>$status,'message'=>$message,'token'=>$data]);
    }

    public function forgot_password(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
        ]);
        if(! $validator->fails()) {
            $user = User::where('email', $request->email)->first();
            if(count($user) > 0){
                if($user->status == '1') {
                    $otp = rand(100000, 999999);
                    $user->otp = $otp;
                    $user->save();
                    Mail::send('emails.forgot-password', ['user' => $user], function ($m) use ($user) {
                        $m->from('hello@code4balance.com', 'Code4Balance Support');
                        $m->to($user->email, $user->name)->subject('Reset Password Link');
                    });
                    $status = TRUE;
                    $message = 'OTP_SENT_TO_EMAIL';
                } else {
                    $status = FALSE;
                    $message = 'USER_BLOCKED';
                }
            } else {
                $status = FALSE;
                $message = 'USER_NOT_FOUND';
            }
        } else {
            $status = FALSE;
            $custom_message = $validator->errors()->all();
            $message = $custom_message['0'];
        }
        return Response::json(['status'=>$status,'message'=>$message]);
    }

    public function reset_password(Request $request){
        $validator = Validator::make($request->all(), [
            'otp'=>'required',
            'password'=>'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required'
        ]);

        if(! $validator->fails()) {
            $user = User::where('otp', $request->otp)->first();
            if(is_object($user) && count($user) > 0) {
                $user->password = Hash::make($request->password);
                $user->save();
                if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                    $user = Auth::user();
                    $token = $user->createToken('C4B')->accessToken;
                    $status = TRUE;
                    $message = 'PASSWORD_RESET_SUCCESSFUL';
                    $data = $token;
                } else {
                    $status = FALSE;
                    $message = 'PASSWORD_RESET_UNSUCCESSFUL';
                    $data = '';
                }
            } else {
                $status = FALSE;
                $message = 'WRONG_OTP';
                $data = '';
            }
        } else {
            $status = FALSE;
            $custom_message = $validator->errors()->all();
            $message = $custom_message['0'];
            $data = '';
        }

        return Response::json(['status'=>$status,'message'=>$message, 'token'=>$data]);
    }
}






