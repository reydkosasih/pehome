<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="<?= base_url('assets/'); ?>img/logofine3.png" rel="icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Script JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <style>
        body {
            background-color: #bec5cc;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if ($this->session->flashdata('error_change')) : ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_change'); ?>
            </div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <img src="<?= base_url('assets/') ?>img/curved-images/curved11-small2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Forgot Password</h3>
                        <span>Cara Mengganti Password Aplikasi Mold:</span>
                        <ol>
                            <li>Pilih dan cari username Anda</li>
                            <li>Masukkan Password Baru</li>
                            <li>Simpan dengan klik tombol "Confirm Reset"</li>
                            <li>Hubungi Admin untuk aktivasi kembali akun Anda</li>
                        </ol>
                        <form action="<?= site_url('auth/proses_forgotPass') ?>" method="POST">
                            <div class="mb-3">
                                <label for="select2" class="form-label">Pilih Username Anda:</label>
                                <select class="form-control" id="select2" name="id" required>
                                    <option value="" selected disabled>Cari Disini:</option>
                                    <?php foreach ($userlist as $ul) { ?>
                                        <option value="<?= $ul->id ?>"><?= $ul->username  . ' (' . $ul->nama_lengkap . ')' ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ubah Password</label>
                                <input type="password" class="form-control" name="password" id="passworda" placeholder="Masukkan Password Baru" required>
                                <input type="checkbox" onclick="showPWA()"> Show Password
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm Reset</button>
                            <a href="<?= site_url('auth') ?>" class="btn btn-warning">Kembali ke Login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select2').select2();
        });
    </script>
    <script>
        function showPWA() {
            var x = document.getElementById("passworda");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>