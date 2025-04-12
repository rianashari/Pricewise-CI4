<?php 

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\Controller;

class AuthController extends Controller {
    public function __construct() {
        // Call to the parent constructor (important in CodeIgniter 4)
        //parent::__construct();

        // Start the session service
        $this->session = \Config\Services::session();
    }

    public function login() {
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $userModel = new AuthModel();
            $user = $userModel->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                // Set session
                $this->session->set([
                    'username' => $user['username'],
                    'logged_in' => true,
                    'status' => $user['status'] // Menyimpan status user dalam session
                ]);

                if ($user['status'] == 'admin') {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/');
            } 
        } else {
            // Handle invalid login
            $this->session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('login');
            }
        }
        return view('login_page');
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    public function form_register() {
        return view('register_page');
    }

    public function proses_register_user() {
        $data = $this->request->getPost();
          // Check if email is already used
    $existingUser = $this->authModel->where('email', $data['email'])->first();
    if ($existingUser) {
        // Email already exists, redirect back with an error message
        return redirect()->back()->withInput()->with('error', 'Registrasi Gagal karena Email telah digunakan, gunakan email lain, atau gunakan fitur Lupa Password untuk mendapatkan password lama.');
    }
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['status'] = 'admin'; // Assuming this sets the user role or status
            $data['flag'] = 0; // Assuming this is used to track some sort of activation or confirmation status
            $data['token'] = md5('kodepengaman'.$data['email'].'kodepengaman');
           // $data['date_register']= date("Y-m-d H:i:s"); 
        }
        if ($this->authModel->save($data)) {
            // Assuming 'email' is a field in your form and hence in $data
            $this->_sendConfirmationEmail($data['email']);
            // Redirect to login with a success message
            return redirect()->to('/login')->with('message', 'Registration successful! Please check your email for confirmation.');
        } else {
            // Handle failure, e.g., show an error message
            return redirect()->back()->withInput()->with('error', 'Registration failed. Please try again.');
        }
    }
    private function _sendConfirmationEmail($userEmail) {
        $email = \Config\Services::email();
    
        // Configure email settings
        $email->setFrom('moko1@dotsnusa.com', 'Registration Confirmation');
        $email->setTo($userEmail);
        $email->setSubject('Registration Confirmation');
        $email->setMessage('
        
        <h2> Selamat Bergabung, 1 Langkah lagi untuk mengaktifkan akun klik pada link dibawah ini: </h2>
        <br>
        <a href="'.site_url('/activate/'.md5('kodepengaman'.$userEmail.'kodepengaman')).'">Klik Disini</a> ');
    
        if (!$email->send()) {
            // Optionally, log the error or handle it as required
            log_message('error', 'Failed to send confirmation email to: ' . $userEmail);
        }
    }


    public function activate($token) {
        // Attempt to find the record by token
        $user = $this->authModel->where('token', $token)->where('flag', 0)->first();
        // Attempt to find the record by token
        $user2 = $this->authModel->where('token', $token)->where('flag', 1)->first();

    
        if ($user) {
            // Record found, set the activation flag to 1
            $updateData = ['flag' => 1]; // Adjust 'is_activated' to your column name
            $this->authModel->update($user['id'], $updateData);
            echo "<h3> Akun Anda berhasil diaktifkan. <a href=".base_url()."/login> Login Sekarang</a></h3>"; 
        } 
        elseif ($user2)
        {
            echo "
            <h3> Akun Anda Sudah Pernah diaktifkan<a href=".base_url()."/login> Kembali</a></h3>"; 
        }
        else {
            echo "<h3> Akun Anda Gagal diaktifkan<a href=".base_url()."/login> Kembali</a></h3>"; 
            
        }
    }

    public function lupa_password() {
        return view('lupa_password');
    }
    public function proses_lupa_password() {
        $data = $this->request->getPost();
        // Check if the email is registered
        $existingUser = $this->authModel->where('email', $data['email'])->first();
        if (!$existingUser) {
            // Email not registered
            return redirect()->back()->withInput()->with('error', 'Email Anda tidak terdaftar.');
        }
    
        // Generate a new random password
        $newPassword = bin2hex(random_bytes(4)); // Generates a random password, 8 characters long
    
        // Update the user's password in the database (hash the new password)
        $this->authModel->update($existingUser['id'], ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);
    
        // Send the email with the new password
        $this->_sendNewPasswordEmail($data['email'], $existingUser['username'], $newPassword);
    
        return redirect()->to('/login')->with('message', 'Sebuah password baru telah dikirim ke email Anda.');
    }
    

    private function _sendNewPasswordEmail($userEmail, $username, $newPassword) {
        $email = \Config\Services::email();
    
        $email->setFrom('moko1@dotsnusa.com', 'Reset Password');
        $email->setTo($userEmail);
        $email->setSubject('Password Baru Anda');
        
        // Construct the email message
        $message = "Berikut adalah data akun Anda, Gunakan untuk login dan segera ganti password Anda. <br>
        
        Username : {$username} <br>
        Password: {$newPassword}
        
        
        <br> URL Login : <a href=".base_url()."/login> Klik Disini </a>";
        $email->setMessage($message);
    
        if (!$email->send()) {
            // Handle failure to send email
            log_message('error', 'Failed to send new password email to ' . $userEmail);
        }
    }
    




    
    public function ganti_password() {
        // Get the username from the session
        $username = $this->session->get('username');
    
        if (!$username) {
            // Handle case where there's no user logged in or session is expired
            return redirect()->to('/login')->with('error', 'You must be logged in to change your password.');
        }
    
        // Find the user data based on the username
        $user = $this->authModel->where('username', $username)->first();
    
        if (!$user) {
            // Handle case where user is not found (very unlikely if they're logged in)
            return redirect()->to('/login')->with('error', 'User not found.');
        }
    
        // Pass the user data to the view
        $data['user'] = $user;
        return view('edit_password', $data);
    }
    

    public function proses_ganti_password() {
        // Check if the request is POST
        if ($this->request->getMethod() !== 'post') {
            return redirect()->back()->with('error', 'Invalid request method.');
        }
    
        $session = session();
        $username = $session->get('username');
    
        // Retrieve user data based on session username
        $user = $this->authModel->where('username', $username)->first();
        if (!$user) {
            $session->destroy();
            return redirect()->to('/login')->with('error', 'Session invalid. Please log in again.');
        }
    
        // Get POST data
        $current_password = $this->request->getPost('current_password');
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');
    
        // Validate the new password and its confirmation
        if ($new_password !== $confirm_password) {
            return redirect()->back()->withInput()->with('error', 'New password and confirmation do not match.');
        }
    
        // Verify current password
        if (!password_verify($current_password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Current password is incorrect.');
        }
    
        // All checks passed, update password
        $updated = $this->authModel->update($user['id'], [
            'password' => password_hash($new_password, PASSWORD_DEFAULT),
        ]);
    
        if ($updated) {
            return redirect()->to('admin/ganti_password')->with('message', 'Password successfully changed.');
        } else {
            return redirect()->back()->with('error', 'Failed to change password. Please try again.');
        }
    }

}
