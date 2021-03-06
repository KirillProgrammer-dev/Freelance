<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendNoticeNewExecutor;

class TaskController extends Controller
{
    public function addService(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->min_price = $request->min_price;
        $task->max_price = $request->max_price;
        $task->img = "";
        $id = User::where("remember_token", $request->token)->get()->first()->id;
        $task->executor = $id;
        $task->tags = "";
        $task->customer = $request->user()->currentAccessToken()->tokenable_id;

        $task->save();
        return response("created", 201);
    }

    public function getUserServices(Request $request)
    {
        $id = $request->user()->currentAccessToken()->tokenable_id;
        $tasks = Task::where("executor", $id)->get();
        return json_encode($tasks);
    }

    public function allServices(Request $request)
    {
        $page = $request->page - 1;
        $pageAmount = ceil(Task::all()->count() / 20);
        $tasks = Task::where("id", ">", $page*20)->take(20)->get();
        return json_encode(array("data" => $tasks, "pages" => $pageAmount));
    }

    public function setExecutorForTask(Request $request)
    {
        $task = Task::where("id", $request->id)->get()->first();
        $task->executor = $request->user()->currentAccessToken()->tokenable_id;
        $recepient = User::where("id", $task->customer)->get()->first();
        $user = User::where("id", $task->executor)->get()->first();
        $task->save();
        $email = array("img_url" => "https://i.ibb.co/8r8H6n8/image.png", "email" => $user->email, "myname" => $recepient->name,"name" => $user->name, "description" => $request->order["description"], "deadline" => $request->order["deadline"], "price" => $request->order["price"], "order_name" => $request->order["title"]);
        Mail::send('email.newExecutor', ["email" => $email], function($message) use($recepient)
        {   
            $message->from("flancesite@gmail.com", "Flance");
            $message->to($recepient->email, $recepient->name)->subject('???? ?????????? ?????? ??????????????????');
        });
        return response("ok", 200);
    }
}
