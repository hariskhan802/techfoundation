<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    //
    public function index() {
        $authUser = \Auth::user();
        $roles = array_column($authUser->roles->toArray(), 'id');
        // return $authUser;
        $data = Student::select(['students.id', 'students.user_id', 'students.is_paid', 'batches.name  as batch_name', 'batches.start_time', 'batches.end_time',])->join('batches', 'students.batch_id', '=', 'batches.id')->where(function($query) use($authUser,$roles) {
            if ($authUser->is_super_admin != env('SUPERADMIN_ROLE')) {
                
                if (in_array(env('TEACHER_ROLE'), $roles)) {
                    
                    $query->where('batches.teacher_id', $authUser->id);
                }
                if (in_array(env('PARENT_ROLE'), $roles)) {
                    
                    $query->where('students.parent_id', $authUser->id);
                }
            }
        })->with(['user:id,name,email,phone,username,cnic,address,picture,dob', 'parent'])->get(); 
        return response()->json(['status' => true, 'records' => $data]);
    }
}
