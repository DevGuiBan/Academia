<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationController extends Controller{
    public function markAsRead($id,$student_id,$personal_id,$training_id){
        $notification = Notification::findOrFail($id);
        $notification->update(['lida' => true]);

        return redirect()->route('personal.selectExercises',['student_id' => $student_id, 'personal_id' => $personal_id, 'training_id' => $training_id]);
    }
}