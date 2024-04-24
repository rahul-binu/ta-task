<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DuplicateCountModel;
use CodeIgniter\Controller;

class Task1 extends Controller
{
    public function index()
    {
        return view('bulk_insert');
    }

    public function uploadFile()
    {
        if ($this->request->getFile('csv_file')) {
            $csvFile = $this->request->getFile('csv_file');

            if ($csvFile->isValid() && $csvFile->getExtension() === 'csv') {
                $inserted = 0;
                $duplicateCount = 0;
                $model = new UserModel();

                $csvData = array_map('str_getcsv', file($csvFile->getTempName()));

                foreach ($csvData as $data) {
                    $userData = [
                        'id' => $data[0],
                        'first_name' => $data[1],
                        'last_name' => $data[2],
                        'email' => $data[3]
                    ];

                    // email already exists check
                    $existingUser = $model->where('email', $userData['email'])->first();

                    if ($existingUser) {
                        //
                        $duplicateModel = new DuplicateCountModel();
                        $existingCount = $duplicateModel->where('email', $userData['email'])->first();

                        if ($existingCount) {
                            $duplicateModel->update($existingCount['id'], ['count' => $existingCount['count'] + 1]);
                        } else {
                            $duplicateModel->insert(['email' => $userData['email'], 'count' => 1]);
                        }

                        $duplicateCount++;
                    } else {
                        // Insert in to db
                        $model->insert($userData);
                        $inserted++;
                    }

                }

                $message = "Inserted: $inserted records, Duplicate Count: $duplicateCount";
            } else {
                $message = "Upload a valid CSV file";
            }
        } else {
            $message = "Upload a file";
        }

        return view('bulk_insert', ['message' => $message]);
    }

}
