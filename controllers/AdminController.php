<?php

namespace controllers;

use core\Render;
use core\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class AdminController
{
    public function adminPage()
    {
        $groups = Capsule::table('groups')->select()->get()->toArray();
        return Render::renderURI('Admin', params: [
            'groups' => $groups
        ]);
    }

    public function groups()
    {
        $groupID = Request::getInstance()->getSanitizedData()['id'] ?? false;
        $_SESSION['group_id'] = $groupID;
        if (!$groupID) {
            header("location:/login");
        } else {
            $userIds = Capsule::table('users_groups')->select(['user_id'])->where('group_id', $groupID)
                ->get()->toArray();
            foreach ($userIds as $key => $userId) {
                $userIds[$key] = $userId->user_id;
            }

            $users = [];
            foreach ($userIds as $userId) {
                $users[] = Capsule::table('users')->select()->where('id',$userId)->first();
            }

            return Render::renderURI('group',params: [
                'users' => $users
            ]);
        }
    }

    public function addUser()
    {
        $data = Request::getInstance()->getSanitizedData();
        $username = $data['username'];
        $userId = Capsule::table('users')->select(['id'])->where('username',$username)->first()->id;

        $groupIds = Capsule::table('users_groups')->select(['group_id'])->where('user_id',$userId)->get()->toArray();
        foreach ($groupIds as $key => $groupId) {
            $groupIds[$key] = $groupId->group_id;
        }
        $currentGroupID = $_SESSION['group_id'];
        if (!in_array($currentGroupID,$groupIds)){
            Capsule::table('users_groups')->insert([
                'user_id' => $userId,
                'group_id' => $currentGroupID
            ]);
        }

        header("location:/group?id=$currentGroupID");
    }

    public function addGroup()
    {
        $data = Request::getInstance()->getSanitizedData()['groupName'];
        Capsule::table('groups')->insert([
            'name' => $data
        ]);

        header("location:/admin");
    }
}