<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TTicket;
use App\Models\TClassroom;
use Carbon\Carbon;


class TicketController extends Controller
{
    public function actionInsert(Request $request, SessionManager $sessionManager)
    {
        if ($request->isMethod('post')) {
            $listMessage = [];
    
            $validator = Validator::make(
                $request->all(),
                [
                    'txtTitle' => 'required',
                    'txtDetails' => 'required',
                    'txtNameClassroom' => 'required'
                ],
                [
                    'txtTitle.required' => 'El campo "first_name" es requerido.',
                    'txtDetails.required' => 'El campo "last_name" es requerido.',
                    'txtNameClassroom.required' => 'El campo "birth_date" es requerido.',
                ]
            );
    
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    $listMessage[] = $error;
                }
            }
    
            if (count($listMessage) > 0) {
                $sessionManager->flash('listMessage', $listMessage);
                $sessionManager->flash('typeMessage', 'error');
    
                return redirect('ticket/insert/');
            }
    
            $tticket = new TTicket();
            $tticket->idTicket = uniqid();
            $tticket->code = uniqid();
            $tticket->title = $request->input('txtTitle');
            $tticket->details = $request->input('txtDetails');
            $tticket->teacher_id = '64bed03a811e3';
            $tticket->date = Carbon::now();
            $tticket->nameClassroom = $request->input('txtNameClassroom');
            $tticket->status = false;
            
            $tticket->save();
    
            $sessionManager->flash('listMessage', ['Registro realizado correctamente']);
            $sessionManager->flash('typeMessage', 'success');
            return redirect('ticket/insert');
        }
        $listTClassroom = TClassroom::all();
    
        return view('ticket/insert',[
            'listTClassroom' => $listTClassroom
        ]);
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
