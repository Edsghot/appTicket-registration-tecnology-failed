<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TTeacher;

class TeacherController extends Controller
{
    public function actionGetAll(){
        $listTeacher = TTeacher::all();

        dd($listTeacher);
        return '<h1>hola</h1>';
    }
}


