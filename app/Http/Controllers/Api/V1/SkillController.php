<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillCollection;
use App\Models\Skill;
use App\Http\Resources\V1\SkillResource;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
      return new SkillCollection(Skill::all());
    }


    public function store(StoreSkillRequest $request){

        Skill::create($request->validated());
        return response()->json("Skill Created");
    }

    public function show(Skill $skill){
        return new SkillResource($skill);
    }

    public function update(StoreSkillRequest $request,Skill $skill){

        $skill->update($request->validated());
        return response()->json('updated skill');

    }

    public function destroy(Skill $skill){
        $skill->delete();
        return response()->json("skill delete");
    }
}