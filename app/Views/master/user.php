<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data User</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadUser()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addUser()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableUser" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama User</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Access User</h4>
                </div>
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadGroupUsers()"><i class="fas fa-sync"></i></a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addGroupUsers()"><i class="fas fa-plus"> </i> Tambah Data</a>
                <table class="table-sm table-striped" id="tableGroupUsers" width="100%">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Hak Akses</th>
                            <th>Nama User</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formUser" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="id_departemen" class="col-sm-4 col-form-label">Departemen</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="id_departemen" id="id_departemen">
                                <option selected hidden disabled>Pilih Departemen</option>
                                <?php foreach ($departemens as $departemen) : ?>
                                    <option value="<?= $departemen['id_departemen'] ?>"><?= $departemen['nama_departemen'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="nip" class="col-sm-4 col-form-label">NIP</label>
                        <div class="col-sm-8">
                            <input type="text" name="nip" class="form-control form-control-sm" id="nip">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" name="email" class="form-control form-control-sm" id="email">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" class="form-control form-control-sm" id="username">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="password_hash" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password_hash" class="form-control form-control-sm" id="password_hash">
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeUser" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-primary" onclick="saveUser()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalGroupUsers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-group-users" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="formGroupUsers" enctype="multipart/form-data">
                <?php csrf_field(); ?>
                <input type="hidden" name="id_group_users" id="id_group_users">
                <div class="modal-body">
                    <div class="row mb-1">
                        <label for="group_id" class="col-sm-4 col-form-label">Hak Akses</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="group_id" id="group_id">
                                <option selected hidden disabled>Pilih Hak Akses</option>
                                <option value="1">Administator</option>
                                <option value="2">Guest</option>
                                <option value="3">Manager</option>
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <label for="user_id" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <select class="form-control form-control-sm" name="user_id" id="user_id">
                            </select>
                            <small class="help-block text-danger"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeGroupUsers" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submitGroupUsers" class="btn btn-primary" onclick="saveGroupUsers()"></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>