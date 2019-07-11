<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use \Auth;

class UpdateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        // dd($user);
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
      {
        try {
            $user = user::findOrFail($id);
                if($request->file('file')){
                    // $this->validate($request, [
                    //   'avatar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    // ]);

                    $filename = $user->id.'_'.time().'.'.$request->file('file')->getClientOriginalExtension();
                    $request->file('file')->move(public_path('/img'), $filename);
                    $user->img = $filename;
                    $user->save();
            }
        $user -> update(request()->all());
          return redirect()->route('home');
         } catch (\Throwable $th) {
             return back();
         }

      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    protected function random_string()
{
    $key = '';
    $keys = array_merge( range('a','z'), range(0,9) );

    for($i=0; $i<10; $i++)
    {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
}
