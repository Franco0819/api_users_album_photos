<?php

namespace App\Http\Controllers\Api;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * this method store the new permission
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->type= $request->type;

        $permission->save();

        return response()->json([
            'message' => 'Permission created successfully'
        ]);
    }


    /**
     * This method return all the permissions.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $permissions = Permission::all();

        return response()->json($permissions);
    }

    /**
     * This method update an permission
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $permissionID)
    {
        $permission = Permission::where('id',$permissionID)->first();

        $permission->type = $request->get('type');

        $permission->save();

        return response()->json([
            'message' => 'Permission updated successfully'
        ]);
    }

    /**
     * this method will logically eliminate the permission and
     * its relations with this permission
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // search the ID permission
        $permission = Permission::findOrFail($id);

        $relations = $permission->relations;

        // remove the relationships
        foreach($relations as $value){
            $value->delete();
        }

        $permission->delete();

        return response()->json([
            'message' => 'Permission removed successfully'
        ]);
    }
}
