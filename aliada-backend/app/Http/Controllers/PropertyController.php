<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Approval;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\ImageProperty;
use App\Models\ViewsProperty;
use App\Models\PropertyAmenity;
use App\Models\UserGroupMember;
use Google\Service\AdMob\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PropertyController extends Controller
{
    public function index()
    {
        try {
            $properties = Property::where('user_id', Auth::id())->get();
            return response()->json(['data' => $properties]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las propiedades del usuario', 'error' => $e->getMessage()], 500);
        }
    }
    public function allProperties(Request $request, $page)
    {
        try {
            $categoryProperty = $request->query('categoryProperty');
            $priceProperty = $request->query('priceProperty');
            $typeProperty = $request->query('typeProperty');
            $areaProperty = $request->query('areaProperty');
            $roomsProperty = $request->query('roomsProperty');
            $bathsProperty = $request->query('bathsProperty');

            $properties = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->leftJoin('users', 'properties.user_id', '=', 'users.id')
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name',  'users.name as user_name')
                ->whereHas('latestApproval.approvalState', function ($query) {
                    $query->where('name', 'Aprobado');
                });

            if ($categoryProperty != 'undefined' && $categoryProperty != "null" && $categoryProperty != null) {
                $properties->whereHas('category', function ($query) use ($categoryProperty) {
                    $query->where('name', $categoryProperty);
                });
            }

            if ($priceProperty != 'undefined' && $priceProperty != "null" && $priceProperty != null) {
                $properties->whereBetween('price', $priceProperty);
            }

            if ($typeProperty != 'undefined' && $typeProperty != "null" && $typeProperty != null) {
                $properties->whereHas('typeProperty', function ($query) use ($typeProperty) {
                    $query->where('name', $typeProperty);
                });
            }
            if ($areaProperty != 'undefined' && $areaProperty != "null" && $areaProperty != null) {
                $properties->whereBetween('square_meters', $areaProperty);
            }
            if ($roomsProperty != 'undefined' && $roomsProperty != "null" && $roomsProperty != null) {
                $properties->where('rooms', $roomsProperty);
            }
            if ($bathsProperty != 'undefined' && $bathsProperty != "null" && $bathsProperty != null) {
                $properties->where('bathroom', $bathsProperty);
            }
            $properties = $properties->paginate(20, ['*'], 'page', $page);
            
            return response()->json($properties);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener las propiedades del usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function allPropertiesByUserId(Request $request, $page)
    {
        try {
            $categoryProperty = $request->query('categoryProperty');
            $priceProperty = $request->query('priceProperty');
            $typeProperty = $request->query('typeProperty');
            $areaProperty = $request->query('areaProperty');
            $roomsProperty = $request->query('roomsProperty');
            $bathsProperty = $request->query('bathsProperty');
            $statusProperty = $request->query('status');

            $properties = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name')
                ->where('user_id', '=', Auth::id());

            if ($statusProperty  != 'undefined' && $statusProperty  != "null" && $statusProperty  != null) {

                if ($statusProperty === 'pendiente') {
                    $properties->whereHas('latestApproval.approvalState', function ($query) {
                        $query->whereIn('name', ['Pendiente', 'Rechazado']);;
                    });
                } elseif ($statusProperty === 'aprobada') {
                    $properties->whereHas('latestApproval.approvalState', function ($query) {
                        $query->where('name', 'Aprobado');
                    });
                }
            }

            if ($categoryProperty != 'undefined' && $categoryProperty != "null" && $categoryProperty != null) {
                $properties->whereHas('category', function ($query) use ($categoryProperty) {
                    $query->where('name', $categoryProperty);
                });
            }

            if ($priceProperty != 'undefined' && $priceProperty != "null" && $priceProperty != null) {
                $properties->whereBetween('price', $priceProperty);
            }

            if ($typeProperty != 'undefined' && $typeProperty != "null" && $typeProperty != null) {
                $properties->whereHas('typeProperty', function ($query) use ($typeProperty) {
                    $query->where('name', $typeProperty);
                });
            }
            if ($areaProperty != 'undefined' && $areaProperty != "null" && $areaProperty != null) {
                $properties->whereBetween('square_meters', $areaProperty);
            }
            if ($roomsProperty != 'undefined' && $roomsProperty != "null" && $roomsProperty != null) {
                $properties->where('rooms', $roomsProperty);
            }
            if ($bathsProperty != 'undefined' && $bathsProperty != "null" && $bathsProperty != null) {
                $properties->where('bathroom', $bathsProperty);
            }
            $properties = $properties->paginate(20, ['*'], 'page', $page);
            return response()->json($properties);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener las propiedades del usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            $request->validate([
                'category_id' => 'required',
                'label_id' => 'required',
                'type_property_id' => 'required',
                'typology_id'=> 'required',
                'price' => 'required',
                'square_meters' => 'required',
                'rooms' => 'required',
                'bathroom' => 'required',
                'parking' => 'required',
                'state_id' => 'required',
                'municipality_id' => 'required',
                'description' => 'required',
                'coordinates_x' => 'required',
                'coordinates_y' => 'required',
                'title' => 'required',
                'images' => 'required',
                'views' => "required",
                'currency' => "required",
                'half_bathroom' => "required",
                'capture' => "required",
                'estimated_monthly_payment' => "required",
                'maintenance_fee' => "required",
                'postal_code'=> "required",
                'address'=> "required",
            ]);

            // Generar slug a partir del título

            $originalSlug = \Illuminate\Support\Str::slug($request->title);
            $count = 0;
            $slug = $originalSlug;
            while (Property::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $request->merge(['slug' => $slug]);
            DB::beginTransaction();
            $propertyData = $request->all();
            $viewProperty = $propertyData['views'];
            $propertyData['views'] = 0;
            $propertyData['user_id'] =  Auth::id();
            $property = Property::create($propertyData);

            ViewsProperty::create(
                [
                    'property_id' => $property->id,
                    'view_id' =>  $viewProperty
                ]
            );

            if (count($propertyData['amenities']) > 0) {
                foreach ($propertyData['amenities'] as $amenityID) {
                    PropertyAmenity::create(
                        [
                            'property_id' => $property->id,
                            'amenity_id' => $amenityID
                        ]
                    );
                }
            }

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $folderPath = 'photos_property/' . $property->id;
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        $path = $image->storeAs($folderPath, $fileName, 'public');

                        ImageProperty::create([
                            'property_id' => $property->id,
                            'url' => $path,
                        ]);
                    }
                }
            }

            Approval::create([
                'property_id' => $property->id,
                'user_id' => Auth::id(),
                'approval_state_id' => 1
            ]);

            DB::commit();
            return response()->json(['message' => 'Propiedad creada exitosamente', 'data' => $property], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al crear la propiedad', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($slug)
    {
        try {
            // Incrementar las vistas de la propiedad
            $property = Property::where('slug', $slug)->firstOrFail();
            $property->views += 1;
            $property->save();

            // Obtener la propiedad con sus relaciones
            $property = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'viewsProperty'
            ])->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('labels_category', 'properties.label_id', '=', 'labels_category.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->select('properties.*',  'states.name as state_name', 'municipalities.name as municipality_name')
                ->where('slug', $slug)
                ->first();

            $propertyRelated = Property::with([
                'images',
                'category',
                'typeProperty',
                'label'
            ])
                ->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('labels_category', 'properties.category_id', '=', 'labels_category.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name')
                ->where('properties.category_id', $property->category_id) // Cambiado de 'category_id' a 'properties.category_id'
                ->take(4)
                ->get();

            $property['property_related'] = $propertyRelated;
            return response()->json($property);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la propiedad', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Property $property, Request $request)
    {
        try {
            if ($property->user_id != Auth::id()) {
                return response()->json(['error' => 'No autorizado'], 403);
            }

            $request->validate([
                'category_id' => 'required|numeric',
                'label_id' => 'required|numeric',
                'type_property_id' => 'required|numeric',
                'price' => 'required|numeric',
                'rooms' => 'required|numeric',
                'bathroom' => 'required|numeric',
                'parking' => 'required|numeric',
                'state_id' => 'required|numeric',
                'municipality_id' => 'required|numeric',
                'description' => 'required|string',
                'coordinates_x' => 'required|string',
                'coordinates_y' => 'required|string',
                'title' => 'required|string',
                'images' => 'required',
                'views' => 'required',
                'currency' => "required",
                'half_bathroom' => "required",
                'capture' => "required",
                'estimated_monthly_payment' => "required",
                'maintenance_fee' => "required"
            ]);
            DB::beginTransaction();
            if ($request->has('title') && $property->title != $request->title) {

                $originalSlug = \Illuminate\Support\Str::slug($request->title);
                $count = 0;
                $slug = $originalSlug;
                while (Property::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }

                $request->merge(['slug' => $slug]);
            }

            $propertyData = $request->all();
            $viewProperty = $propertyData['views'];

            $property->update($propertyData);

            ViewsProperty::updateOrCreate(
                ['property_id' => $property->id],
                ['view_id' => $viewProperty]
            );

            if ($request->has('amenities')) {
                $property->amenities()->delete();

                if (count($propertyData['amenities']) > 0) {
                    foreach ($propertyData['amenities'] as $amenityID) {
                        PropertyAmenity::create(
                            [
                                'property_id' => $property->id,
                                'amenity_id' => $amenityID
                            ]
                        );
                    }
                }
            }

            ImageProperty::where('property_id', $property->id)->delete();

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                $folderPath = 'photos_property/' . $property->id;
                foreach ($images as $image) {
                    if ($image->isValid()) {
                        $fileName = time() . '_' . $image->getClientOriginalName();
                        $path = $image->storeAs($folderPath, $fileName, 'public');

                        ImageProperty::create([
                            'property_id' => $property->id,
                            'url' => $path,
                        ]);
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'Propiedad actualizada exitosamente', 'data' => $property], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Propiedad no encontrada'], 404);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al actualizar la propiedad', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Property $property)
    {
        try {

            // if ($property->user_id !== Auth::id()) {
            //     return response()->json(['error' => 'No autorizado'], 403);
            // }

            DB::beginTransaction();
            $property->viewsProperty()->delete();
            $property->amenities()->delete();
            $property->images()->delete();
            $property->delete();

            DB::commit();

            return response()->json(['message' => 'Propiedad eliminada exitosamente'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Error al eliminar la propiedad', 'error' => $e->getMessage()], 500);
        }
    }
    public function getHomePropertySales()
    {
        try {
            $propertySales = Property::with([
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])
                ->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('labels_category', 'properties.category_id', '=', 'labels_category.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->whereHas('latestApproval.approvalState', function ($query) {
                    $query->where('name', 'Aprobado');
                })
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name')
                ->where('properties.category_id', 1) // Cambiado de 'category_id' a 'properties.category_id'
                ->take(6)
                ->get();

            return response()->json($propertySales);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error al eliminar la propiedad', 'error' => $e->getMessage()], 500);
        }
    }

    public function getHomePropertyRent()
    {
        try {
            $propertyRent = Property::with([
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])
                ->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('labels_category', 'properties.category_id', '=', 'labels_category.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->whereHas('latestApproval.approvalState', function ($query) {
                    $query->where('name', 'Aprobado');
                })
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name')
                ->where('properties.category_id', 2)
                ->take(3)
                ->get();
            return response()->json($propertyRent);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Error al eliminar la propiedad', 'error' => $e->getMessage()], 500);
        }
    }
    public function getImage(Request $request)
    {

        try {
            // Obtener la ruta del archivo desde la consulta
            $path = $request->query('path');
            // Verificar si el archivo existe en el almacenamiento de Laravel
            if (Storage::exists('public/' . $path)) {
                // Obtener el contenido del archivo
                $contents = Storage::get('public/' . $path);

                // Obtener el tipo de contenido
                $contentType = Storage::mimeType('public/' . $path);

                // Crear una respuesta HTTP con el contenido del archivo y el tipo de contenido
                $response = response()->make($contents, 200);
                $response->header('Content-Type', $contentType);

                // Establecer el nombre del archivo en la respuesta HTTP (opcional)
                $response->header('Content-Disposition', 'attachment; filename="' . basename($path) . '"');

                // Devolver la respuesta HTTP
                return $response;
            } else {
                // El archivo no existe
                return response()->json(['error' => 'El archivo no existe '], 404);
            }
        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra
            return response()->json(['error' => 'Error al obtener la imagen'], 500);
        }
    }

    public function getTypologyByPropertyId($propertyId){

        try {
            return DB::table('property_typology')
            ->join('typologies', 'property_typology.typology_id', '=', 'typologies.id')
            ->select('typologies.id','typologies.name')
            ->where('property_typology.type_property_id', $propertyId)
            ->get();
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }

    }

    public function propertyTeam(){

        try {
        $user = Auth::user()->load('roles');
       
        if($user->roles[0]->name == "team leader"){
            $aliados = UserGroupMember::where('group_leader_id', "=", $user->id)->get();
            $idTeams = [];
            foreach($aliados as $aliado){
                $idTeams[] =  $aliado->member_id; 
            }
            $properties = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])
            ->leftJoin('states', 'properties.state_id', '=', 'states.id')
            ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id') 
            ->select(
                'properties.*', 
                'states.name as state_name', 
                'municipalities.name as municipality_name',
                'users.name as user_name_aliado' 
            )
            ->whereIn('properties.user_id', $idTeams)
            ->get();
            return response()->json($properties);  
        }elseif($user->roles[0]->name == "mentor"){
            $teams_leaders = UserGroupMember::where('group_leader_id', $user->id)->get();
            $idTeams = [];
            $teamLeaderMap = [];
            
            foreach ($teams_leaders as $teams_leader) {
                $idTeams[] = $teams_leader->member_id;
                $teamLeaderMap[$teams_leader->member_id] = [
                    'leader_id' => $teams_leader->group_leader_id,
                    'is_leader' => true,
                ];
                
                $aliados = UserGroupMember::where('group_leader_id', $teams_leader->member_id)->get();
                foreach ($aliados as $aliado) {
                    $idTeams[] = $aliado->member_id;
                    $teamLeaderMap[$aliado->member_id] = [
                        'leader_id' => $teams_leader->member_id,
                        'is_leader' => false,
                    ];
                }
            }
            
            $properties = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])
            ->leftJoin('states', 'properties.state_id', '=', 'states.id')
            ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
            ->leftJoin('users', 'properties.user_id', '=', 'users.id') 
            ->select(
                'properties.*', 
                'states.name as state_name', 
                'municipalities.name as municipality_name',
                'users.name as user_name' 
            )
            ->whereIn('properties.user_id', $idTeams)
            ->get();
            
            $properties->each(function ($property) use ($teamLeaderMap) {
                $property->team_leader_id = $teamLeaderMap[$property->user_id]['leader_id'];
                $property->is_leader = $teamLeaderMap[$property->user_id]['is_leader'];
            });
            
            $teamLeaders = User::whereIn('id', array_column($teamLeaderMap, 'leader_id'))->pluck('name', 'id');
            
            $properties->each(function ($property) use ($teamLeaders) {
                $property->team_leader_name = $teamLeaders[$property->team_leader_id] ?? 'N/A';
            });
            return response()->json($properties);  

        }else{
            return response()->json([]);   
        }
        
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function allPropertiesPending(Request $request, $page)
    {
        try {
            $categoryProperty = $request->query('categoryProperty');
            $priceProperty = $request->query('priceProperty');
            $typeProperty = $request->query('typeProperty');
            $areaProperty = $request->query('areaProperty');
            $roomsProperty = $request->query('roomsProperty');
            $bathsProperty = $request->query('bathsProperty');

            $properties = Property::with([
                'amenities.amenity',
                'images',
                'category',
                'typeProperty',
                'label',
                'latestApproval.approvalState'
            ])->leftJoin('states', 'properties.state_id', '=', 'states.id')
                ->leftJoin('municipalities', 'properties.municipality_id', '=', 'municipalities.id')
                ->leftJoin('users', 'properties.user_id', '=', 'users.id')
                ->select('properties.*', 'states.name as state_name', 'municipalities.name as municipality_name',  'users.name as user_name')
                ->whereHas('latestApproval.approvalState', function ($query) {
                    $query->where('name', 'Pendiente');
                });

            if ($categoryProperty != 'undefined' && $categoryProperty != "null" && $categoryProperty != null) {
                $properties->whereHas('category', function ($query) use ($categoryProperty) {
                    $query->where('name', $categoryProperty);
                });
            }

            if ($priceProperty != 'undefined' && $priceProperty != "null" && $priceProperty != null) {
                $properties->whereBetween('price', $priceProperty);
            }

            if ($typeProperty != 'undefined' && $typeProperty != "null" && $typeProperty != null) {
                $properties->whereHas('typeProperty', function ($query) use ($typeProperty) {
                    $query->where('name', $typeProperty);
                });
            }
            if ($areaProperty != 'undefined' && $areaProperty != "null" && $areaProperty != null) {
                $properties->whereBetween('square_meters', $areaProperty);
            }
            if ($roomsProperty != 'undefined' && $roomsProperty != "null" && $roomsProperty != null) {
                $properties->where('rooms', $roomsProperty);
            }
            if ($bathsProperty != 'undefined' && $bathsProperty != "null" && $bathsProperty != null) {
                $properties->where('bathroom', $bathsProperty);
            }
            $properties = $properties->paginate(20, ['*'], 'page', $page);
            return response()->json($properties);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener las propiedades del usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function changeStatuysProperty(Request $request){
        try {
            Approval::create([
                'property_id' => $request->id,
                'user_id' => Auth::id(),
                'approval_state_id' => $request->status
            ]);

            if($request->status == 2)
                return response()->json(['message' => 'Se ha aprobado correctamente'], 201);
            elseif($request->status == 3)
                return response()->json(['message' => 'Se ha rechazado correctamente'], 202);
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 400);
        }
    }

    public function getPropertiesByStatus(Request $request){
    try {
        $approval = Approval::with(['approvalState'])
        ->where('property_id', $request->property_id)->latest('id')->first();
        
        return response()->json($approval);

    } catch (\Exception $e) {
        return response()->json(['message' =>  $e->getMessage()], 400);
    }

    }

}
