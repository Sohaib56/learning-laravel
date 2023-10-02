<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){
       $path=Storage::disk('public')->put('avatars',$request->file('Avatar'));
        // $path=$request->file('Avatar')->store('avatars','public');
        if($oldAvatar=$request->user()->Avatar){
            Storage::disk('public')->delete($oldAvatar);
        }
        // dd($path);
        auth()->user()->update(['Avatar'=>$path]);
        // dd(auth()->user());
        return redirect()->route('profile.edit')->with('message','Avatar is updated');

    }
}
