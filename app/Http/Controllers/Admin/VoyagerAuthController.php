<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;

class VoyagerAuthController extends BaseVoyagerAuthController
{

    public function username()
    {
        return 'username';
    }
    public function postLogin(Request $request){
            $this->validate($request, [
                'username' => 'required', 'password' => 'required',
            ]);

            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            $credentials = $request->only('username', 'password');

            if ($this->guard()->attempt($credentials, $request->has('remember'))) {
                return $this->sendLoginResponse($request);
            }
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
     }
}
