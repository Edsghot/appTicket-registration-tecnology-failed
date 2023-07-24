<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TAdmin;
class AdminController extends Controller
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

            if (TAdmin::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) {
                $listMessage[] = 'El administrador ya fue registrado con anterioridad';
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('admin/insert');
            }

            $tadmin = new TAdmin();
            $tadmin->idAdmin = uniqid();
            $tadmin->code = $request->input('txtCode');
            $tadmin->first_name = $request->input('txtFirstName');
            $tadmin->last_name = $request->input('txtLastName');
            $tadmin->birth_date = $request->input('birthDate');
            $tadmin->occupation = $request->input('txtOccupation');
            $tadmin->password = $request->input('txtPassword');

            $tadmin->save();

            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('admin/insert');
        }


        return view('admin/insert');
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

            if ((TAdmin::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) && TAdmin::whereRaw("(password) = (?)", $request->input('txtPassword'))->first() !== null) {

                $sessionManager->flash('listMessage', ['ingreso correctamente']);
                $sessionManager->flash('typeMessage', 'success');

                //entro adentro
                return redirect('admin/getall');
            } else {
                $listMessage[] = 'Verifique Administrador su contraseña o usuario';
            }

            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');

                return redirect('admin/login');
            }
        }
        return view('admin/login');
    }


    public function actionGetAll()
    {
        $listAdmin = TAdmin::all();

        return view('admin/getall', [
            'listAdmin' => $listAdmin
        ]);
    }

    public function actionDelete($idAdmin, SessionManager $sessionManager)
    {
        $tadmin = TAdmin::find($idAdmin);
        if ($tadmin != null) {
            $tadmin->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('admin/getall');
    }
}
