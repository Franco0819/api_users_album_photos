<?php

namespace App\Http\Controllers\Api;

use App\Relation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RelationController extends Controller
{
    /**
     * @param $albumID
     * @return \Illuminate\Http\JsonResponse
     *
     * This function receives as parameter the ID of an album
     * and returns all the users that have permissions of the album
     */
    public function getUsersAlbum($albumID)
    {
        $client = new \GuzzleHttp\Client();

        $users = Relation::select('relations.user_id')
            ->where('album_id', $albumID)
            ->get()
            ->pluck('user_id')
            ->toArray();

        // controls if the album have users
        if (count($users) == 0) {
            return response()->json(['error' => '404 not found']);
        }

        // request to the external service
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users',
            ['query' => ['id' => $users]]);

        $response = json_decode($response->getBody(), true);

        return response()->json($response);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     *
     * This function receives its parameters by the get method GET
     * and search comment by the name field or by the email field
     */
    public function searchComment()
    {
        $client = new \GuzzleHttp\Client();
        // parameters by method GET
        $name = $_GET['name'] != null ? $_GET['name'] : null;
        $email = $_GET['email'] != null ? $_GET['email'] : null;

        if($name == null && $email == null){
            return response()->json(['error' => '404 not found']);

        } elseif ($name != null && $email != null) {
            $responseOne = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments',
                ['query' => ['name' => $name]
                ]);
            $responseTwo = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments',
                ['query' => ['email' => $email]
                ]);

            $queryName = json_decode($responseOne->getBody(), true);
            $queryEmail = json_decode($responseTwo->getBody(), true);
            if($queryName[0]['id'] == $queryEmail[0]['id'] ){
                return response()->json($queryName);
            } else {
                $response = json_encode(array_merge($queryName,$queryEmail));
                $response = json_decode($response, true);
                return response()->json($response);
            }
        } elseif ($name != null) {
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments',
                ['query' => ['name' => $name]
                ]);
        } else {
            $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/comments',
                ['query' => ['email' => $email]
                ]);
        }

        $response = json_decode($response->getBody(), true);

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * This method saves the relationship between album, user
     * and permissions
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeRelationPermission(Request $request)
    {
        $relation = new Relation();
        $relation->user_id = $request->input('user_id');
        $relation->album_id = $request->album_id;
        $relation->permission_id = $request->permission_id;
        $relation->save();

        return response()->json([
            'message' => 'Permission Relation created successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     * This method receives three parameters because it has
     * a key composite and updates the permission (writing, reading or both)
     *
     * @param  \Illuminate\Http\Request $request
     * @param $albumID
     * @param $userID
     * @param $permissionID
     * @return \Illuminate\Http\Response
     */
    public function updateRelationPermission(Request $request, $albumID, $userID, $permissionID)
    {
        $relationPermission = Relation::where('user_id', $userID)
            ->where('permission_id',$permissionID)
            ->where('album_id', $albumID)
            ->first();

        $relationPermission->permission_id = $request->get('permission_id');

        $relationPermission->save();

        return response()->json([
            'message' => 'Permission Relation updated successfully'
        ]);
    }

    /**
     * this method receives your compound keys and
     * removes the relationship
     *
     * @param $albumID
     * @param $userID
     * @param $permissionID
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyRelationPermission($albumID, $userID, $permissionID){
        $relationPermission = Relation::where('user_id', $userID)
            ->where('permission_id',$permissionID)
            ->where('album_id', $albumID)
            ->first();

        $relationPermission->delete();

        return response()->json([
            'message' => 'Permission Relation destroy successfully'
        ]);
    }

}
