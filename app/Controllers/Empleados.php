<?php

namespace App\Controllers;
use App\Models\EmpleadoModel;
use App\Models\AreaModel;

class Empleados extends BaseController
{
    public function index(){
        $empleados = new EmpleadoModel();
        
        $db = db_connect();
        $empleados = $db->query('SELECT empleados.id, empleados.name, empleados.birth_date, empleados.email, areas.name as area_name, empleados.area_id FROM empleados JOIN areas ON empleados.area_id = areas.id ORDER BY empleados.name DESC');
       
        $data['empleados'] = $empleados;

        return view('empleados/list', $data);
    }

    public function create(){
        $areas = new AreaModel();
        $data['areas'] = $areas->orderBy('name', 'ASC')->findAll();

        return view('empleados/add', $data);
    }
 
    public function store() {
        $empleados = new EmpleadoModel();
        $area = new AreaModel();
        
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'birth_date'  => $this->request->getVar('birth_date'),
            'area_id'  => $this->request->getVar('area_id'),
        ];
        
        $empleados->insert($data);

        $areaObj = $area->find($this->request->getVar('area_id'));

        $id = $areaObj['id'];
        $nro_empleados = $areaObj['nro_empleados'] + 1;

        $data = [
            'nro_empleados' => $nro_empleados,
        ];
        $area->update($id, $data);

        session()->setFlashdata("success", 'La información ha sido añadida');

        return $this->response->redirect(base_url('/empleados-list'));
    }

    public function singleUser($id = null){
        $empleado = new EmpleadoModel();
        $data['empleado_obj'] = $empleado->where('id', $id)->first();
        $areas = new AreaModel();
        $data['areas'] = $areas->orderBy('name', 'ASC')->findAll();

        return view('empleados/edit', $data);
    }
    
    public function update(){
        $empleado = new EmpleadoModel();
        $area = new AreaModel();

        $id = $this->request->getVar('id');
        $area_id_old = $this->request->getVar('area_id_old');

        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'birth_date'  => $this->request->getVar('birth_date'),
            'area_id'  => $this->request->getVar('area_id'),
        ];

        $empleado->update($id, $data);

        if($area_id_old != $this->request->getVar('area_id')){
            $areaObj = $area->find($area_id_old);

            $id = $areaObj['id'];
            $nro_empleados = $areaObj['nro_empleados'] - 1;

            $data = [
                'nro_empleados' => $nro_empleados,
            ];
            $area->update($id, $data);

            $areaObj = $area->find($this->request->getVar('area_id'));

            $id = $areaObj['id'];
            $nro_empleados = $areaObj['nro_empleados'] + 1;

            $data = [
                'nro_empleados' => $nro_empleados,
            ];
            $area->update($id, $data);
        }
        session()->setFlashdata("success", 'La información ha sido actualizada');

        return $this->response->redirect(base_url('/empleados-list'));
    }
 
    public function delete(){
        $id = $this->request->getVar('empleado_id');
        
        $empleado = new EmpleadoModel();
        $area = new AreaModel();

        $empObj = $empleado->where('id', $id)->first();

        $areaObj = $area->find($empObj['area_id']);

        $area_id = $areaObj['id'];

        $data = [
            'nro_empleados' => $areaObj['nro_empleados'] - 1,
        ];

        $area->update($area_id, $data);

        $empleado->where('id', $id)->delete($id);
        return $this->response->redirect(base_url('/empleados-list'));
    }    

    public function get_email($email)
    {
        $empleado = new EmpleadoModel();

        $email = $empleado->where('email', $email)->first();
        if ($email) {
            return 'true';
        } else {
            return 'false';
        }
    }

}
