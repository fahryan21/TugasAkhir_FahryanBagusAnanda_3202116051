<?php namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function submit()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]',
            'nama_lengkap' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),  // Simpan password tanpa di-hash
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'alamat' => $this->request->getPost('alamat'),
            'role' => 'user'  // Set role otomatis sebagai 'user'
        ]);

        session()->setFlashdata('success', 'Akun berhasil didaftarkan. Silakan login.');
        return redirect()->to(base_url('login'));
    }
}

// <?php namespace App\Controllers;

// use App\Models\UserModel;

// class RegisterController extends BaseController
// {
//     public function index()
//     {
//         return view('register');
//     }

//     public function submit()
//     {
//         $validation = \Config\Services::validation();
//         $rules = [
//             'username' => 'required',
//             'email' => 'required|valid_email|is_unique[users.email]',
//             'password' => 'required|min_length[6]',
//             'password_confirm' => 'required|matches[password]',
//             'nama_lengkap' => 'required',
//             'nomor_hp' => 'required',
//             'alamat' => 'required'
//         ];

//         if (!$this->validate($rules)) {
//             return redirect()->back()->withInput()->with('errors', $validation->getErrors());
//         }

//         $userModel = new UserModel();
//         $userModel->save([
//             'username' => $this->request->getPost('username'),
//             'email' => $this->request->getPost('email'),
//             'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
//             'nama_lengkap' => $this->request->getPost('nama_lengkap'),
//             'nomor_hp' => $this->request->getPost('nomor_hp'),
//             'alamat' => $this->request->getPost('alamat'),
//             'role' => 'user'  // Set role otomatis sebagai 'user'
//         ]);

//         session()->setFlashdata('success', 'Akun berhasil didaftarkan. Silakan login.');
//         return redirect()->to(base_url('login'));
//     }
// }


// // <!-- namespace App\Controllers;

// // use App\Models\UserModel;

// // class RegisterController extends BaseController
// // {
// //     public function index()
// //     {
// //         return view('register');
// //     }

// //     public function submit()
// //     {
// //         $validation =  \Config\Services::validation();
// //         $rules = [
// //             'username' => 'required',
// //             'email' => 'required|valid_email|is_unique[users.email]',
// //             'password' => 'required|min_length[6]',
// //             'password_confirm' => 'required|matches[password]',
// //             'nama_lengkap' => 'required',
// //             'nomor_hp' => 'required',
// //             'alamat' => 'required'
// //         ];

// //         if (!$this->validate($rules)) {
// //             return redirect()->back()->withInput()->with('errors', $validation->getErrors());
// //         }

// //         $userModel = new UserModel();
// //         $userModel->save([
// //             'username' => $this->request->getPost('username'),
// //             'email' => $this->request->getPost('email'),
// //             'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
// //             'nama_lengkap' => $this->request->getPost('nama_lengkap'),
// //             'nomor_hp' => $this->request->getPost('nomor_hp'),
// //             'alamat' => $this->request->getPost('alamat')
// //         ]);

// //         session()->setFlashdata('success', 'Akun berhasil didaftarkan. Silakan login.');
// //         return redirect()->to(base_url('login'));
// //     }
// // } -->
