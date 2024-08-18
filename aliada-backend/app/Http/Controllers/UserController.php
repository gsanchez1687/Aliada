<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserGroupMember;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function myUser(Request $request)
    {
        $user = $request->user()->load('roles');
        return $user;
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            $request->validate([
                'group_leader_id' => 'required|int',
                'name' => 'required|string',
                'lastname' => 'required|string',
                'gender'=> 'required|string',
                'phone'=> 'required|int',
                'date_birth'=> 'required|date',
                'address'=> 'required|string',
                'code_postal'=> 'required|int',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);
    
            if($request->input('password') != $request->input('repeatPassword')){
                return response()->json(['message' => 'Las contraseñas no coinciden'], 400);
            }
            // Crear usuario
             $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'gender'=> $request->input('gender'),
                'phone'=> $request->input('phone'),
                'date_birth'=> date('Y-m-d', strtotime($request->input('date_birth'))),
                'address'=> $request->input('address'),
                'code_postal'=> $request->input('code_postal'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $folderPath = 'photos/' . $user->id;
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        $path = $image->storeAs($folderPath, $fileName, 'public');
                        $user = User::find($user->id);
                        $user->image = $path;
                        $user->save();
                    }
                }
            }

            $aliadoRole = Role::where('name', 'team leader')->first();
            $user->assignRole($aliadoRole);

            $existingGroupMember = UserGroupMember::where('member_id', $user->id)->first();
            if ($existingGroupMember) {
                return response()->json(['message' => 'El usuario ya pertenece a otro grupo'], 400);
            }

            UserGroupMember::create([
                'group_leader_id' => $request->input('group_leader_id'),
                'member_id' => $user->id,
            ]);

            DB::commit();
            return response()->json(['message' => 'Usuario aliado creado y añadido al grupo correctamente'], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al crear el usuario aliado: ' . $e->getMessage()], 500);
        }
    }

    public function admin(){
       
        try {
            $users = User::all();
            return response()->json(['data' => $users], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios: ' . $e->getMessage()], 500);
        }
    }

    public function createUserAliado(Request $request)
    {
        $request->validate([
            'group_leader_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'gender'=> $request->input('gender') ? 'required|string' : '',
            'phone'=> $request->input('phone') ? 'required|int' : '',
            'date_birth'=> $request->input('date_birth') ? date('Y-m-d', strtotime($request->input('date_birth')))  : '',
            'address'=> $request->input('address') ? 'required|string' : '',
            'code_postal'=> $request->input('code_postal') ? 'required|int' : '',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        try {
            $groupLeaderId = $request->input('group_leader_id');
            $memberCount = UserGroupMember::where('group_leader_id', $groupLeaderId)->count();
            if ($memberCount >= 10) {
                return response()->json(['message' => 'El grupo ya tiene el máximo de 10 miembros'], 400);
            }

            // Crear usuario
            $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'gender'=> $request->input('gender'),
                'phone'=> $request->input('phone'),
                'date_birth'=> date('Y-m-d', strtotime($request->input('date_birth'))),
                'address'=> $request->input('address'),
                'code_postal'=> $request->input('code_postal'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $folderPath = 'photos/' . $user->id;
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        $path = $image->storeAs($folderPath, $fileName, 'public');
                        $user = User::find($user->id);
                        $user->image = $path;
                        $user->save();
                    }
                }
            }

            $aliadoRole = Role::where('name', 'aliado')->first();
            $user->assignRole($aliadoRole);

            $existingGroupMember = UserGroupMember::where('member_id', $user->id)->first();
            if ($existingGroupMember) {
                return response()->json(['message' => 'El usuario ya pertenece a otro grupo'], 400);
            }

            UserGroupMember::create([
                'group_leader_id' => $request->input('group_leader_id'),
                'member_id' => $user->id,
            ]);

            return response()->json(['message' => 'Usuario aliado creado y añadido al grupo correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el usuario aliado: ' . $e->getMessage()], 500);
        }
    }

    public function createUserTeamLeader(Request $request)
    {
        $request->validate([
            'group_leader_id' => 'required|exists:users,id',
            'name' => 'required|string',
            'lastname' => $request->input('lastname'),
            'gender'=> $request->input('gender'),
            'phone'=> $request->input('phone'),
            'date_birth'=> date('Y-m-d', strtotime($request->input('date_birth'))),
            'address'=> $request->input('address'),
            'code_postal'=> $request->input('code_postal'),
            'email' => $request->input('email'),
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        try {
            $groupLeaderId = $request->input('group_leader_id');
            $memberCount = UserGroupMember::where('group_leader_id', $groupLeaderId)->count();
            if ($memberCount >= 3) {
                return response()->json(['message' => 'El grupo ya tiene el máximo de 3 miembros'], 400);
            }
            // Crear usuario
            $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'gender'=> $request->input('gender'),
                'phone'=> $request->input('phone'),
                'date_birth'=> date('Y-m-d', strtotime($request->input('date_birth'))),
                'address'=> $request->input('address'),
                'code_postal'=> $request->input('code_postal'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            //carga la imagen
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $folderPath = 'photos/' . $user->id;
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        $path = $image->storeAs($folderPath, $fileName, 'public');
                        $user = User::find($user->id);
                        $user->image = $path;
                        $user->save();
                    }
                }
            }

            $aliadoRole = Role::where('name', 'team leader')->first();
            $user->assignRole($aliadoRole);

            $existingGroupMember = UserGroupMember::where('member_id', $user->id)->first();
            if ($existingGroupMember) {
                return response()->json(['message' => 'El usuario ya pertenece a otro grupo'], 400);
            }

            UserGroupMember::create([
                'group_leader_id' => $request->input('group_leader_id'),
                'member_id' => $user->id,
            ]);

            return response()->json(['message' => 'Usuario aliado creado y añadido al grupo correctamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el usuario aliado: ' . $e->getMessage()], 500);
        }
    }

    public function getRoles(Request $request){

        try {
            $roles = Role::all();
            return response()->json(['data' => $roles], 201);

        } catch (\Exception $th) {
            return response()->json(['message' => 'Error al obtener los tipos de propiedad'], 500);
        }

    }

    public function allUsers(){

        try {
            $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name as role')
                ->get();
            return response()->json(['data' => $users], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios: ' . $e->getMessage()], 400);
        }
    }

    public function getAliados(){
        try {
            $users = User::join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->select('users.*', 'roles.name as role')
                ->where('roles.name', 'team leader')
                ->get();
            return response()->json(['data' => $users], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios: ' . $e->getMessage()], 400);
        }
    }
}
