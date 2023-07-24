<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TTeacher;

class TeacherController extends Controller
{

    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                $request->all(),
                [
                    'txtCode' => 'required',
                    'txtFirstName' => 'required',
                    'txtLastName' => 'required',
                    'birthDate' => 'required|date',
                    'txtOccupation' => 'required',
                    'txtPassword' => 'required'
                ],
                [
                    'txtCode.required' => 'El campo "code" es requerido.',
                    'txtFirstName.required' => 'El campo "first_name" es requerido.',
                    'txtLastName.required' => 'El campo "last_name" es requerido.',
                    'birthDate.required' => 'El campo "birth_date" es requerido.',
                    'birthDate.date' => 'El campo "birth_date" debe ser una fecha válida.',
                    'txtOccupation.required' => 'El campo "occupation" es requerido.',
                    'txtPassword.required' => 'El campo "password" es requerido.'
                ]
            );
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    $listMessage[] = $error;
                }
            }

            if (TTeacher::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) {
                $listMessage[] = 'El docente ya fue registrado con anterioridad';
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('teacher/insert');
            }

            $tteacher = new TTeacher();
            $tteacher->idTeacher = uniqid();
            $tteacher->code = $request->input('txtCode');
            $tteacher->first_name = $request->input('txtFirstName');
            $tteacher->last_name = $request->input('txtLastName');
            $tteacher->birth_date = $request->input('birthDate');
            $tteacher->occupation = $request->input('txtOccupation');
            $tteacher->password = $request->input('txtPassword');

            $tteacher->save();

            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('teacher/insert');
        }


        return view('teacher/insert');
    }

    public function actionLogin(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];

            $validator = Validator::make(
                $request->all(),
                [
                    'txtCode' => 'required',
                    'txtPassword' => 'required'
                ],
                [
                    'txtCode.required' => 'El campo "code" es requerido.',
                    'txtPassword.required' => 'El campo "password" es requerido.'
                ]
            );
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    $listMessage[] = $error;
                }
            }

            if ((TTeacher::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) && TTeacher::whereRaw("(password) = (?)", $request->input('txtPassword'))->first() !== null) {

                $sessionManager->flash('listMessage', ['Bienvenido']);
                $sessionManager->flash('typeMessage', 'success');

                //entro adentro
                return redirect('ticket/insert/');
            } else {
                $listMessage[] = 'Verifique Docente su contraseña o usuario';
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('teacher/login');
            }
        }
        return view('teacher/login');
    }


    public function actionGetAll()
    {
        $listTeacher = TTeacher::all();

        return view('teacher/getall', [
            'listTeacher' => $listTeacher
        ]);
    }

    public function actionDelete($idTeacher, SessionManager $sessionManager)
    {
        $tteacher = TTeacher::find($idTeacher);
        if ($tteacher != null) {
            $tteacher->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('teacher/getall');
    }
}