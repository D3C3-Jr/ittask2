<div class="tab-pane fade show active" id="computer" role="tabpanel" aria-labelledby="computer-tab">
    <?= $computer ?>
    <table class="table table-sm table-hover" id="computerTable">
        <thead>
            <th>No</th>
            <th>ID</th>
            <th>Login User</th>
            <th>User</th>
            <th>Jenis</th>
            <th>Nama Produk</th>
            <th>Serial Number</th>
            <th>Processor</th>
            <th>RAM</th>
            <th>ROM</th>
        </thead>
        <tbody>
        </tbody>
    </table>


</div>


<!-- Modal -->
<div class="modal fade" id="modalTambahComputer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.tambahComputer').click(function() {
        $('#modalTambahComputer').modal('show')
    });
    $('#computerTable').dataTable({
        // responsive: true
    });
</script>