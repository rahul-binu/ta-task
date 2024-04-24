<?php

namespace App\Controllers;

use App\Models\CrudModel;
use CodeIgniter\Controller;

class CrudController extends Controller
{
    // Display all items
    public function index()
    {
        // Load the CrudModel
        $model = new CrudModel();

        // Fetch all items from the database
        $data['items'] = $model->findAll();

        // Load the view and pass data
        echo view('crud', $data);
    }

    // Store a newly created item in the database
    public function store()
    {
        // Load the CrudModel
        $model = new CrudModel();

        // Get data from POST request
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ];

        // Insert data into the database
        $model->insert($data);

        // Redirect to the index page
        return redirect()->to('');
    }

    // Update the specified item in the database
    public function update($id)
    {
        // Load the CrudModel
        $model = new CrudModel();
    
        // Get data from POST request
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ];
    
        // Update data in the database
        $model->update($id, $data);
    
        // Redirect to the index page
        return redirect()->to('');
    }
    

    // Remove the specified item from the database
    public function delete($id)
    {
        // Load the CrudModel
        $model = new CrudModel();

        // Delete data from the database
        $model->delete($id);

        // Redirect to the index page
        return redirect()->to('');
    }
}
