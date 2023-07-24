<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TClassroom;

class ClassroomController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];
    
            $validator = Validator::make(
                $request->all(),
                [
                    'txtCode' => 'required',
                    'txtName' => 'required'
                ],
                [
                    'txtCode.required' => 'El campo "code" es requerido.',
                    'txtName.required' => 'El campo "name" es requerido.',
                ]
            );
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    $listMessage[] = $error;
                }
            }
    
            if (TClassroom::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) {
                $listMessage[] = 'El Salon ya fue registrado con anterioridad';
            }
    
            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('classroom/insert');
            }
    
            $tclassroom = new TClassroom();
            $tclassroom->idClassroom = uniqid();
            $tclassroom->code = uniqid();
            $tclassroom->name = $request->input('txtName');
    
            $tclassroom->save();
    
            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('classroom/insert');
        }
    
        return view('classroom/insert');
    }


    public function actionGetAll()
    {
        $listClassroom = TClassroom::all();

        return view('classroom/getall', [
            'listClassroom' => $listClassroom
        ]);
    }

    public function actionDelete($idClassroom, SessionManager $sessionManager)
    {
        $tclassroom = TClassroom::find($idClassroom);
        if ($tclassroom != null) {
            $tclassroom->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('classroom/getall');
    }
}
