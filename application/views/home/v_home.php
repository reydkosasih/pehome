<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Resume Meeting PE</h6>
                <div class="card-toolbar">
                    <?php if ($this->session->userdata('username') == false) { ?>
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="fa-solid fa-user"></i>
                            Login
                        </button>
                    <?php } else { ?>
                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahModal">
                            <i class="fa-solid fa-plus"></i>
                            Tambah Tugas
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-row-bordered" id="meetingTable">
                        <thead style="vertical-align: middle;">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Mulai</th>
                                <th>Tugas</th>
                                <th>Target Selesai</th>
                                <th>Detail Tugas</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody style="vertical-align: middle;">
                            <?php $i = 1; ?>
                            <?php foreach ($meet as $mt) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($mt->tgl_mulai)) ?></td>
                                    <td><?= $mt->tugas ?></td>
                                    <td><?= date('d-m-Y', strtotime($mt->tgl_selesai)) ?></td>
                                    <td><?= $mt->detail_tugas ?></td>
                                    <td><?= $mt->progress ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= site_url('auth') ?>" method="post" autocomplete="off">
                <div class="modal-header">
                    <h3 class="modal-title">Login Aplikasi</h3>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="mb-5">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" autofocus>
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password1" placeholder="Masukkan Password">
                    </div>
                    <div class="fv-row">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" onclick="showPW()" />
                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Show Password</span>
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="tambahModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('home/proses_addTask') ?>" method="post" autocomplete="off">
                <div class="modal-header">
                    <h3 class="modal-title">Tambahkan Tugas/Project</h3>

                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-5">
                            <label for="tugas" class="form-label required">Tugas</label>
                            <input type="text" class="form-control" name="tugas" id="tugas" required placeholder="Masukkan Tugas" autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-5">
                                <label for="tgl_mulai" class="form-label required">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?= date('Y-m-d') ?>" required placeholder="Masukkan Password">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-5">
                                <label for="tgl_selesai" class="form-label required">Target Penyelesaian</label>
                                <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" required>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>