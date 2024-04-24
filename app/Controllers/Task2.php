<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Firebase\JWT\JWT;

class Task2 extends BaseController
{
    use ResponseTrait;

    // Secret key for JWT token
    private $key = 'qwertyuioplkjhgfdsazxcvbnm';

    // Load the Task 2 view
    public function index()
    {
        return view('task2');
    }

    // JWT token API
    public function generateToken()
    {
        $expiration = time() + 3600;

        // Token payload
        $tokenData = [
            'username' => 'admin', // from fe
            'exp' => $expiration
        ];

        $token = JWT::encode($tokenData, $this->key, 'HS256');

        // Return the token
        return $this->respond(['token' => $token]);
    }

    // Fetch user details API
    public function getUserDetails()
    {
        // the page number and search variable need to send form the frontend
        $page = $this->request->getVar('page') ?? 2;
        $perPage = $this->request->getVar('per_page') ?? 10;
        $search = $this->request->getVar('search') ?? '';

        $model = new UserModel();

        if (!empty($search)) {
            $model->like('first_name', $search)->orLike('last_name', $search)->orLike('email', $search);
        }

        // count of records
        $totalCount = $model->countAllResults(false);

        // pagination
        $model->limit($perPage, ($page - 1) * $perPage);

        $users = $model->findAll();

        return $this->respond([
            'users' => $users,
            'total_count' => $totalCount,
            'current_page' => $page,
            'per_page' => $perPage
        ]);
    }


    // duplicate records percentage API
    public function getDuplicatePercentage()
    {
        $model = new UserModel();

        // total count of records
        $totalCount = $model->countAllResults();

        // to count duplicate records
        $duplicateCount = $model->groupBy('email')->having('COUNT(*) >', 1)->countAllResults();

        $percentage = ($duplicateCount / $totalCount) * 100;

        return $this->respond([
            'total_records' => $totalCount,
            'duplicate_percentage' => $percentage
        ]);
    }
}
