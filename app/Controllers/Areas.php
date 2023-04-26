<?php

namespace App\Controllers;
use App\Models\EmpleadoModel;
use App\Models\AreaModel;

class Areas extends BaseController
{
    public function index(){
        $areas = new AreaModel();
        
        $data['areas'] = $areas->orderBy('name', 'ASC')->findAll();

        return view('areas/list', $data);
    }

    public function create(){
        return view('areas/add');
    }
 
    public function store() {
        $area = new AreaModel();
        
        $data = [
            'name' => $this->request->getVar('name'),
            'nro_empleados'  => 0,
        ];
        
        $area->insert($data);

        session()->setFlashdata("success", 'La información ha sido añadida');

        return $this->response->redirect(base_url('areas-list'));
    }

    public function singleArea($id = null){
        $area = new AreaModel();
        $data['area_obj'] = $area->where('id', $id)->first();

        return view('areas/edit', $data);
    }

    public function update(){
        $area = new AreaModel();

        $id = $this->request->getVar('id');

        $data = [
            'name' => $this->request->getVar('name'),
        ];

        $area->update($id, $data);

        session()->setFlashdata("success", 'La información ha sido actualizada');

        return $this->response->redirect(base_url('/areas-list'));
    }
 
    public function delete(){
        $id = $this->request->getVar('area_id');
        
        $empleado = new EmpleadoModel();
        $area = new AreaModel();

        $empObj = $empleado->where('area_id', $id)->first();

        if(isset($empObj)){
            session()->setFlashdata("warning", 'La información no ha podido ser eliminada');
            return $this->response->redirect(base_url('/areas-list'));
        }else{
            $area->where('id', $id)->delete($id);
            
            session()->setFlashdata("success", 'La información ha sido eliminada');
            return $this->response->redirect(base_url('/areas-list'));
        }
    }    
}
