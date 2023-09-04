<div class="tab-pane fade" id="printer" role="tabpanel" aria-labelledby="printer-tab">
    <?= $printer ?>
    <table class="table table-sm table-hover" id="printerTable">
        <thead>
            <th>No</th>
            <th>ID</th>
            <th>Jenis</th>
            <th>Merk</th>
            <th>Model</th>
            <th>MAC/SN</th>
            <th>Plant</th>
            <th>Lokasi</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="modalTambahPrinter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    $('.tambahPrinter').click(function() {
        $('#modalTambahPrinter').modal('show')
    });
    $('#printerTable').dataTable({
        // responsive: true
    });
</script>