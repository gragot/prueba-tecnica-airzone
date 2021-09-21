<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Gragot\Laravel\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function show($categoria_id) {
        return Category::findOrFail($categoria_id);
    }

    public function store(Request $request)
    {
        $response = ['status' => 'ok'];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'visible' => 'required'
        ]);
        if ($validator->fails()) {
            $response['status'] = 'error';
            $response['msg'] = $validator->errors();
            return $response;
        }

        try {
            $nuevaCategoria = new Category();
            $nuevaCategoria->parent_id = $request->parent_id;
            $nuevaCategoria->name = $request->name;
            $nuevaCategoria->slug = $request->slug;
            $nuevaCategoria->visible = $request->visible;
            $nuevaCategoria->save();
            return $response;
        } catch (\Throwable $e) {
            Log::error($e);
            $response['status'] = 'error';
            return $response;
        }

    }

    public function update($categoria_id, Request $request)
    {
        $response = ['status' => 'ok'];

        try {
            $nuevaCategoria = Category::query()->findOrFail($categoria_id);
            if(!empty($request->parent_id)) {
                $nuevaCategoria->parent_id = $request->parent_id;
            }
            if(!empty($request->name)) {
                $nuevaCategoria->name = $request->name;
            }
            if(!empty($request->slug)) {
                $nuevaCategoria->slug = $request->slug;
            }
            if(!empty($request->visible)) {
                $nuevaCategoria->visible = $request->visible;
            }
            $nuevaCategoria->save();
            return $response;
        } catch (\Throwable $e) {
            Log::error($e);
            $response['status'] = 'error';
            return $response;
        }
    }

    public function destroy($categoria_id)
    {
        $response = ['status' => 'ok'];

        try {
            $nuevaCategoria = Category::query()->findOrFail($categoria_id);
            $nuevaCategoria->delete();
            return $response;
        } catch (\Throwable $e) {
            Log::error($e);
            $response['status'] = 'error';
            return $response;
        }
    }
}
