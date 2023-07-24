<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TSchool;

class SchoolController extends Controller
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
    
            if (TSchool::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) {
                $listMessage[] = 'El Salon ya fue registrado con anterioridad';
            }
    
            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('school/insert');
            }
    
            $tschool = new TSchool();
            $tschool->idSchool = uniqid();
            $tschool->code = $request->input('txtCode');
            $tschool->name = $request->input('txtName');
    
            $tschool->save();
    
            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('school/insert');
        }
    
        return view('school/insert');
    }


    public function actionGetAll()
    {
        $listSchool = TSchool::all();

        return view('school/getall', [
            'listSchool' => $listSchool
        ]);
    }

    public function actionDelete($idSchool, SessionManager $sessionManager)
    {
        $tschool = TSchool::find($idSchool);
        if ($tschool != null) {
            $tschool->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('school/getall');
    }
}
