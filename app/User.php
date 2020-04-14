<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Collection return tasks created by authorized user
     */
    public function getTasks() {
        return $this->hasMany(Task::class)->get();
    }

    /**
     * @param $taskId task id
     * @return \Illuminate\Database\Eloquent\Collection return task by  id
     */
    public function getTask($taskId) {
        return $this->hasMany(Task::class)->where("id", $taskId)->get();
    }

    /**
     * @param $taskId task id
     * @param $data data to update
     */
    public function updateTask($taskId, $data) {
        $this->hasMany(Task::class)->where("id", $taskId)->update($data);
    }

    /**
     * @param $taskId task id
     * @return \Illuminate\Database\Eloquent\Collection return task by  id
     */
    public function deleteTask($taskId) {
        $this->hasMany(Task::class)->where("id", $taskId)->delete();
    }
}
