<div class="tab-pane fade show active" id="computer-two" role="tabpanel" aria-labelledby="computer-tab-two">
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="reloadComputer()"><i class="fas fa-sync"></i></a>
    <a href="javascript:void(0)" class="btn btn-sm btn-primary my-2" onclick="addComputer()"><i class="fas fa-plus"> </i> Tambah Data</a>
    <div class="responsive">
        <table class="table table-sm" id="tableComputer">
            <thead>
                <tr class="ligth">
                    <th>No</th>
                    <th>Nomor Asset</th>
                    <th>Device ID</th>
                    <th>User ID</th>
                    <th>Jenis</th>
                    <th>Serial Number</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    var table;
    var method;
    var url;

    $(document).ready(function() {
        table = $('#tableComputer').dataTable({
            "ajax": {
                "url": '<?= site_url() ?>/asset/computer/read',
                "type": 'GET'
            },
            // "scrollY": 250,
            "deferRender": true,
            // "scroller": true,
            // "responsive": true,
            "serverSide": true,
            "processing": true,
            // "dom": 'Bfrtip',
            // "buttons": [
            //     'pageLength',
            //     'excel',
            //     'print',
            // ]
        });
        $('#close').click(function(){
            $('.help-block').empty(); 
            $('#form')[0].reset();
        })
    });

    
</script>