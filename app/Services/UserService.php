<?php
    namespace app\Services;

    use app\Models\User;

    class UserService
    {
        public function get($id = null)
        {
            if ($id) {
               return User::select($id);
            } else {
                return User::selectAll($id);
            } 
        }

        public function post()
        {
            $data = $_POST;
            return User::insert($data);
        }
        
        public function update()
        {

        }
        
        public function delete()
        {

        }
    }