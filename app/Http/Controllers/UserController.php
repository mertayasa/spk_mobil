<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function datatable()
    {
        $user = User::where('level', 2)->get();

        return UserDataTable::set($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        try{
            $data = $request->all();
            if($request['photo']){
                $base_64_foto = json_decode($request['photo'], true);
                $upload_image = uploadFile($base_64_foto);
                if ($upload_image == 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
        
                $data['photo'] = $upload_image;
            }else{
                $data['photo'] = 'default.jpeg';
            }

            $data['password'] = bcrypt($data['password']);

            $data['level'] = 2;
    
            User::create($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna');
        }

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data pengguna');
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
    public function edit(User $user)
    {
        // dd($user);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        try{
            $data = $request->all();
    
            if($request['photo']){
                $base_64_foto = json_decode($request['photo'], true);
                $upload_image = uploadFile($base_64_foto);
                if ($upload_image == 0) {
                    return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
                }
        
                $data['photo'] = $upload_image;
            }

            if($data['password']){
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }
        
            $data['level'] = 2;
    
            $user->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna');
        }

        return redirect()->route('user.index')->with('success', 'Berhasil menambahkan data pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            if($user->booking->count() > 0){
                return response(['code' => 0, 'message' => 'Gagal menghapus data jenis pengguna, data masih digunakan di tabel booking']);
            }

            $user->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data pengguna']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data pengguna']);
    }
}
