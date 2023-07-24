<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TTicket;

class TicketController extends Controller
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
    
            if (TTicket::whereRaw("replace(code,' ','') = replace(?,' ','')", $request->input('txtCode'))->first() !== null) {
                $listMessage[] = 'El ticket ya fue registrado con anterioridad';
            }
    
            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('ticket/insert');
            }
    
            $tticket = new TTicket();
            $tticket->idTicket = uniqid();
            $tticket->code = $request->input('txtCode');
            $tticket->title = $request->input('txtTitle');
            $tticket->details = $request->input('txtDetails');
            $tticket->teacher_id = $request->input('txtTeacherId');
            $tticket->date = $request->input('txtDate');
            $tticket->school_id = $request->input('txtSchoolId');
    
            // Puedes cambiar el valor predeterminado del campo "status" aquí si es necesario
            $tticket->status = false;
    
            $tticket->save();
    
            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('ticket/insert');
        }
    
        return view('ticket/insert');
    }


    public function actionGetAll()
    {
        $listTicket = TTicket::all();

        return view('ticket/getall', [
            'listTicket' => $listTicket
        ]);
    }

    public function actionDelete($idTicket, SessionManager $sessionManager)
    {
        $tticket = TTicket::find($idTicket);
        if ($tticket != null) {
            $tticket->delete();
        }

        $sessionManager->flash('listMessage', ['Registro eliminado correctamente']);
        $sessionManager->flash('typeMessage', 'success');

        return redirect('ticket/getall');
    }
}
