<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-2">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal"
                data-bs-target="#formModal">
                Tambah data Pengguna
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= BASEURL ?>/user/cari" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari Pengguna..."
                        aria-label="Recipient’s username" aria-describedby="button-addon2 " name="keyword" id="keyword"
                        autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <!-- Button trigger modal -->

            <br>
            <h3>Daftar Pengguna</h3>
            <ul class="list-group">
                <?php foreach ($data['usr'] as $usr): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $usr['name']; ?>
                        <div>
                            <a href="<?= BASEURL; ?>/user/detail/<?= $usr['id']; ?>"
                                class="badge text-bg-primary me-1">Detail</a>
                            <a href="<?= BASEURL; ?>/user/ubah/<?= $usr['id']; ?>"
                                class="badge text-bg-warning me-1 tampilModalUbah" data-bs-toggle="modal"
                                data-bs-target="#formModal" data-id="<?= $usr['id']; ?>">Ubah</a>
                            <a href="<?= BASEURL; ?>/user/hapus/<?= $usr['id']; ?>" class="badge text-bg-danger"
                                onclick="return confirm('Yakin?')">Hapus</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalLabel">Tambah Data user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/user/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>