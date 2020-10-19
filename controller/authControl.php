<?php


class authControl
{
    public function __construct()
    {
        $host = "localhost";
        $user = "hanif";
        $pass = "123";
        $dbname = "blog";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registrasi($email, $nama, $password, $confirm)
    {
        // CEK EMAIL 
        $query = "SELECT email FROM user WHERE email = '$email'";
        $get = $this->conn->query($query);

        // jika email ada
        if ($get->fetchAll(PDO::FETCH_ASSOC)) {
            echo "<script>
                alert ('EMAIL SUDAH TERSEDIA !');
                document.location.href='register.php'
             </script>";
            exit;
        }

        // CEK PASSWORD 
        if ($password !== $confirm) {
            echo "<script>
                alert ('KONFIRMASI PASSWORD HARUS SAMA !');
                document.location.href='register.php'
               </script>";
            exit;
        }

        // ENKRIPSI DAN INSERT AKUN
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (nama,email, password) VALUES ('$nama','$email', '$password')";
        $insert = $this->conn->query($query);

        return $insert->rowCount();
    }

    public function login($data)
    {
        $email = $data["email"];
        $password = $data["password"];

        $query = "SELECT * FROM user WHERE email = '$email'";

        $get = $this->conn->query($query);

        $row = $get->fetchAll(PDO::FETCH_ASSOC);

        // CEK KETERSEDIAAN EMAIL 
        if ($get->rowCount() === 1) {

            // CEK PASSWORD 
            if (password_verify($password, $row[0]['password'])) {

                if (isset($data["check"])) {
                    setcookie('id', '123456789', time() + 3600);
                }

                $_SESSION['status'] = true;

                header("Location: admin.php");
            } else {
                echo "<script>
                        alert ('Passaword Salah !');
                        document.location.href='login.php'
                    </script>";
                exit;
            }
        } else {
            echo "<script>
                    alert ('Username Salah!');
                    document.location.href='login.php'
                </script>";
        }
    }
}

$conn = new authControl();
