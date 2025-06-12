<?php

namespace App\Controllers\Mtsa;

use App\Models\AdminsModel;
use App\Models\TeachersModel;
use App\Models\StudentsModel;

class Login extends BaseController
{
    protected $Admins;
    protected $Teachers;
    protected $Students;
    protected $validation;
    protected $db, $builder;
    public function __construct()
    {
        $this->Admins      = new AdminsModel();
        $this->Teachers    = new TeachersModel();
        $this->Students    = new StudentsModel();

        $this->validation = \Config\Services::validation();
    }

    function dataSiswa()
    {
        return $this->Students->get()->getResult();
    }

    /**
     * --------------------------------------------------------------------------
     * View Login
     * --------------------------------------------------------------------------
     */
    public function index()
    {

        $username   = $this->request->getVar('username');
        $password   = $this->request->getVar('password');

        if (empty($username) && empty($password)) {
            return view('auth/login');
        }
        if ($username && $password) {
            /**
             * --------------------------------------------------------------------------
             * Jika lolos validasi maka samakan username  dari form dan database
             * --------------------------------------------------------------------------
             */

            $Admins  = $this->Admins->find($username);
            $Teachers = $this->Teachers->find($username);
            $Students = $this->Students->find($username);

            /**
             * --------------------------------------------------------------------------
             * Mencari username yang sama dengan username di tabel admins
             * --------------------------------------------------------------------------
             */
            if ($Admins) {

                /**
                 * --------------------------------------------------------------------------
                 * Mencar password yang sama dengan password di database sesuai username
                 * --------------------------------------------------------------------------
                 */

                if (@password_verify($password, $Admins->password)) {

                    // set session
                    $data = [
                        'logged_in' => TRUE,
                        'id'        => $Admins->id,
                        'levelId'   => $Admins->role_id,
                        'data'      => $Admins
                    ];

                    /**
                     * --------------------------------------------------------------------------
                     * Set Session data dan Alert sukses lalu menuju halaman menu
                     * --------------------------------------------------------------------------
                     */
                    $loginAlert = ['loginSukses' => '<li>Login Success.</li>'];

                    session()->set($data);
                    session()->setFlashdata('success', $loginAlert);
                    return view('menu/index', $data);
                } else {
                    /**
                     * --------------------------------------------------------------------------
                     * jika tidak ditemukan password yang sesuai dengan username maka tampilkan error
                     * --------------------------------------------------------------------------
                     */
                    $loginAlert = ['passwordAlert'    => '<li>Password salah dong!</li>'];

                    session()->setFlashdata('error', $loginAlert);
                    return redirect()->back()->withInput();
                }
            } else {
                /**
                 * --------------------------------------------------------------------------
                 * Mencari username yang sama dengan username di tabel teachers
                 * --------------------------------------------------------------------------
                 */
                if ($Teachers) {

                    if (@password_verify($password, $Teachers->password)) {
                        // set session
                        $data = [
                            'logged_in' => TRUE,
                            'id'        => $Teachers->id,
                            'levelId'   => $Teachers->level_id,
                            'data'      => $Teachers
                        ];

                        $loginAlert = ['loginSukses' => '<li>Login Success.</li>'];

                        session()->set($data);
                        session()->setFlashdata('success', $loginAlert);
                        return redirect()->to(base_url('menu'))->withInput();
                    } else {
                        $loginAlert = ['passwordAlert' => '<li>Password salah dong!</li>'];
                        session()->setFlashdata('error', $loginAlert);
                        return redirect()->back()->withInput();
                    }
                } else {
                    /**
                     * --------------------------------------------------------------------------
                     * jika tidak ada username pada tiga tabel maka tampilkan error
                     * --------------------------------------------------------------------------
                     */
                    $loginAlert = ['usernameAlert'    => '<li>User belum terdaftar dong!</li>'];

                    session()->setFlashdata('error', $loginAlert);
                    return redirect()->back()->withInput();
                }
            }
        }
    }




    /**
     * --------------------------------------------------------------------------
     * Method Proses Login
     * --------------------------------------------------------------------------
     */
    // public function proses()
    // {
    //     /**
    //      * --------------------------------------------------------------------------
    //      * Set Validation Rules and Message
    //      * --------------------------------------------------------------------------
    //      */
    //     $valid = $this->validate([
    //         'username' => [
    //             'rules'     => 'required',
    //             'errors'    => [
    //                 'required'  => '<li>Username harus di isi dong!</li>',
    //             ]
    //         ],
    //         'password' => [
    //             'rules'     => 'required',
    //             'errors'    => [
    //                 'required'  => '<li>Password harus di isi dong!</li>',
    //             ]
    //         ],
    //     ]);

    //     /**
    //      * --------------------------------------------------------------------------
    //      * Check Validation
    //      * --------------------------------------------------------------------------
    //      * 
    //      * Jika tidak ada validasi, maka kembali ke halaman login dan tampilkan pesan error
    //      */
    //     if (!$valid) {
    //         /**
    //          * --------------------------------------------------------------------------
    //          * Set session loginAlert
    //          * --------------------------------------------------------------------------
    //          */
    //         $loginAlert = [
    //             'usernameAlert'    => $this->validation->getError('username'),
    //             'passwordAlert'    => $this->validation->getError('password'),
    //         ];

    //         session()->setFlashdata('error', $loginAlert);
    //         return redirect()->back()->withInput();
    //     } else {
    //         /**
    //          * --------------------------------------------------------------------------
    //          * Mengambil username dan password dari form
    //          * --------------------------------------------------------------------------
    //          */
    //         $username   = $this->request->getVar('username');
    //         $password   = $this->request->getVar('password');

    //         if ($valid) {
    //             /**
    //              * --------------------------------------------------------------------------
    //              * Jika lolos validasi maka samakan username  dari form dan database
    //              * --------------------------------------------------------------------------
    //              */

    //             $Admins  = $this->Admins->find($username);
    //             $Teachers = $this->Teachers->find($username);
    //             $Students = $this->Students->find($username);

    //             /**
    //              * --------------------------------------------------------------------------
    //              * Mencari username yang sama dengan username di tabel admins
    //              * --------------------------------------------------------------------------
    //              */
    //             if ($Admins) {

    //                 /**
    //                  * --------------------------------------------------------------------------
    //                  * Mencar password yang sama dengan password di database sesuai username
    //                  * --------------------------------------------------------------------------
    //                  */

    //                 if (@password_verify($password, $Admins->password)) {

    //                     // set session
    //                     $data = [
    //                         'logged_in' => TRUE,
    //                         'id'        => $Admins->id,
    //                         'levelId'   => $Admins->level_id,
    //                         'data'      => $Admins
    //                     ];

    //                     /**
    //                      * --------------------------------------------------------------------------
    //                      * Set Session data dan Alert sukses lalu menuju halaman menu
    //                      * --------------------------------------------------------------------------
    //                      */
    //                     $loginAlert = ['loginSukses' => '<li>Login Success.</li>'];

    //                     session()->set($data);
    //                     session()->setFlashdata('success', $loginAlert);
    //                     return view('menu/index', $data);
    //                 } else {
    //                     /**
    //                      * --------------------------------------------------------------------------
    //                      * jika tidak ditemukan password yang sesuai dengan username maka tampilkan error
    //                      * --------------------------------------------------------------------------
    //                      */
    //                     $loginAlert = ['passwordAlert'    => '<li>Password salah dong!</li>'];

    //                     session()->setFlashdata('error', $loginAlert);
    //                     return redirect()->back()->withInput();
    //                 }
    //             } else {
    //                 /**
    //                  * --------------------------------------------------------------------------
    //                  * Mencari username yang sama dengan username di tabel teachers
    //                  * --------------------------------------------------------------------------
    //                  */
    //                 if ($Teachers) {

    //                     if (@password_verify($password, $Teachers->password)) {
    //                         // set session
    //                         $data = [
    //                             'logged_in' => TRUE,
    //                             'id'        => $Teachers->id,
    //                             'levelId'   => $Teachers->level_id,
    //                             'data'      => $Teachers
    //                         ];

    //                         $loginAlert = ['loginSukses' => '<li>Login Success.</li>'];

    //                         session()->set($data);
    //                         session()->setFlashdata('success', $loginAlert);
    //                         return redirect()->to(base_url('menu'))->withInput();
    //                     } else {
    //                         $loginAlert = ['passwordAlert' => '<li>Password salah dong!</li>'];
    //                         session()->setFlashdata('error', $loginAlert);
    //                         return redirect()->back()->withInput();
    //                     }
    //                 } else {
    //                     /**
    //                      * --------------------------------------------------------------------------
    //                      * Mencari username yang sama dengan username di tabel students
    //                      * --------------------------------------------------------------------------
    //                      */
    //                     if ($Students) {

    //                         if (md5($password) == $Students->password) {
    //                             // set session
    //                             $data = [
    //                                 'logged_in'     => TRUE,
    //                                 'id'            => $Students->id,
    //                                 'levelId'       => $Students->level_id,
    //                                 'username'      => $Students->username,
    //                                 'data'          => $Students,
    //                                 'firstname'     => explode(" ", $Students->fullname),
    //                             ];
    //                             $loginAlert = ['loginSukses' => '<li>Login Success.</li>'];

    //                             session()->set($data);
    //                             session()->setFlashdata('success', $loginAlert);
    //                             return redirect()->to(base_url('menu'))->withInput();
    //                         } else {

    //                             $loginAlert = ['passwordAlert' => '<li>Password salah dong!</li>'];

    //                             session()->setFlashdata('error', $loginAlert);
    //                             return redirect()->back()->withInput();
    //                         }
    //                     } else {
    //                         /**
    //                          * --------------------------------------------------------------------------
    //                          * jika tidak ada username pada tiga tabel maka tampilkan error
    //                          * --------------------------------------------------------------------------
    //                          */
    //                         $loginAlert = ['usernameAlert'    => '<li>User belum terdaftar dong!</li>'];

    //                         session()->setFlashdata('error', $loginAlert);
    //                         return redirect()->back()->withInput();
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }


    /**
     * --------------------------------------------------------------------------
     * Method logout
     * --------------------------------------------------------------------------
     */
    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
