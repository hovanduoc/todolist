<?php

namespace App\Controllers;

use App\Core\DB;
use App\Models\Task;

/**
 * Class TaskController.
 * @author duochv
 * @package App\Http\Controllers
 */

class TaskController
{

	protected $task;
	public function __construct(){

	}

    public function index()
    {
        $data = DB::get('db')->selectAll('tasks', Task::class);
        return view('task.index', compact('data'));
    }

    public function create(){
        
         return view('task.add');
    }

    public function store(){
    	try {
            DB::get('db')->insert('tasks', $_REQUEST);
        } catch (Exception $e) {
            return view('errors.500');
        }
        return redirect('');
    }

    public function edit(){
        if(!empty($_GET['id'])){
            $data = DB::get('db')->find('tasks', $_GET['id']);
            if($data){
                return view('task.edit', compact('data'));
            } else {
                return view('errors.500');
            }
        }
        
        return redirect('');
    }

    public function update(){
        try {
            DB::get('db')->update('tasks', $_REQUEST, $_GET['id']);
        } catch (Exception $e) {
            return view('errors.500');
        }
        return redirect('');
    }

    public function delete(){   
    	try {
            DB::get('db')->delete('tasks', $_GET['id']);
        } catch (Exception $e) {
            return view('errors.500');
        }

        return redirect('');
    }
}