<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\Validation\ValidationInterface;

class AuthController extends Controller
{
    protected $userModel;
    protected $validation;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->validation = \Config\Services::validation();
    }

    public function login()
    {
        return view('evgift/login');
    }

    public function loginSubmit()
    {
        $username = esc($this->request->getPost('username'));
        $password = esc($this->request->getPost('password'));

        // Validasi input
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // Ambil data pengguna berdasarkan username
        $user = $this->userModel->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Username atau password salah.');
        }

        // Menyimpan data pengguna dalam session
        session()->set([
            'user_id' => $user['id_user'],
            'username' => $user['username'],
            'role' => $user['role'],
            'nama_lengkap' => $user['nama_lengkap'],
            'alamat' => $user['alamat'],
            'nomor_hp' => $user['nomor_hp'],
            'email' => $user['email'], // Menyimpan email dalam session
        ]);

        // Arahkan berdasarkan role pengguna
        return redirect()->to($user['role'] == 'admin' ? '/admin/dashboard' : '/home');
    }
//     public function loginSubmit()
// {
//     $email = esc($this->request->getPost('email'));
//     $password = esc($this->request->getPost('password'));

//     // Validasi input
//     if (!$this->validate([
//         'email' => 'required|valid_email',
//         'password' => 'required',
//     ])) {
//         return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
//     }

//     // Ambil data pengguna berdasarkan email
//     $user = $this->userModel->where('email', $email)->first();

//     if (!$user || !password_verify($password, $user['password'])) {
//         return redirect()->to(base_url('login'))->with('message', 'Email atau Password anda salah');
//     }

//     // Simpan data pengguna dalam session
//     session()->set([
//         'user_id' => $user['id_user'],
//         'email' => $user['email'],
//         'username' => $user['username'],
//         'role' => $user['role'],
//         'nama_lengkap' => $user['nama_lengkap'],
//         'alamat' => $user['alamat'],
//         'nomor_hp' => $user['nomor_hp'],
//     ]);

//     // Arahkan berdasarkan role pengguna
//     return redirect()->to($user['role'] == 'admin' ? '/admin/dashboard' : '/home');
// }



public function register()
{
    helper(['form']);

    if ($this->request->getMethod() === 'post') {
        $validationRules = [
            'username'      => 'required|min_length[3]|max_length[50]',
            'email'         => 'required|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[6]',
            'nama_lengkap'  => 'required',
            'nomor_hp'      => 'required|numeric',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $data = [
            'username'      => $this->request->getPost('username'),
            'email'         => $this->request->getPost('email'),
            'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'nomor_hp'      => $this->request->getPost('nomor_hp'),
            'alamat'        => $this->request->getPost('alamat'),
            'role'          => 'user', // Default role
        ];

        try {
            $userModel->insert($data);
            return redirect()->to('/login')->with('success', 'Akun berhasil dibuat! Silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
        
    }

    return view('evgift/register');
}

    public function registerSubmit()
    {
        // Validasi input
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // Simpan data pengguna ke database
        $data = [
            'username' => esc($this->request->getPost('username')),
            'email' => esc($this->request->getPost('email')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => esc($this->request->getPost('nama_lengkap')),
            'alamat' => esc($this->request->getPost('alamat')),
            'nomor_hp' => esc($this->request->getPost('nomor_hp')),
            'role' => 'user'
        ];

        $this->userModel->save($data);

        return redirect()->to(base_url('login'))->with('success', 'Pendaftaran berhasil, silakan login.');
    }

    public function logout()
    {
        // Hapus data session saat logout
        session()->remove(['user_id', 'username', 'role', 'nama_lengkap', 'alamat', 'nomor_hp', 'email']);
        return redirect()->to(base_url('login'))->with('message', 'Anda telah logout.');
    }

    public function profil()
    {
        // Cek apakah pengguna sudah login
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        // Ambil data pengguna dari database
        $user = $this->userModel->find(session()->get('user_id'));
        return view('evgift/profil', compact('user'));
    }

    public function updateProfile()
    {
        // Cek apakah pengguna sudah login
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');

        // Validasi data profil yang diperbarui
        $rules = [
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'email' => 'required|valid_email',
            'nomor_hp' => 'required|numeric',
        ];

        $newPassword = $this->request->getPost('new_password');
        $password = $this->request->getPost('password');

        if ($newPassword) {
            $rules['password'] = 'required';
            $rules['new_password'] = 'min_length[6]|matches[new_password_confirm]';
            $rules['new_password_confirm'] = 'matches[new_password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        // Ambil data pengguna dari database
        $user = $this->userModel->find($userId);
        $data = [
            'nama_lengkap' => esc($this->request->getPost('nama_lengkap')),
            'alamat' => esc($this->request->getPost('alamat')),
            'email' => esc($this->request->getPost('email')),
            'nomor_hp' => esc($this->request->getPost('nomor_hp')),
        ];

        // Perbarui password jika ada
        if ($newPassword) {
            if (!password_verify($password, $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Password lama salah.');
            }
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        // Simpan perubahan ke database
        $this->userModel->update($userId, $data);

        // Update session dengan data terbaru
        session()->set([
            'nama_lengkap' => $data['nama_lengkap'],
            'alamat' => $data['alamat'],
            'email' => $data['email'],
            'nomor_hp' => $data['nomor_hp'],
        ]);

        return redirect()->to('/profil')->with('message', 'Profil berhasil diperbarui.');
    }

    public function updatePassword()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');

        // Ambil data pengguna dari database
        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        if (!$this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min_length[6]|matches[new_password_confirm]',
            'new_password_confirm' => 'matches[new_password]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
        }

        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Password lama salah.');
        }

        // Update password di database
        $this->userModel->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/profil')->with('message', 'Password berhasil diperbarui.');
    }
}
