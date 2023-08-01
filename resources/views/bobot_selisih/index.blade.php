@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between py-2" >
        <div class="card p-1 col">
            <h5>Tabel Data Nilai Selisih</h5>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success addButton" data-toggle="modal" data-target="#exampleModalCenter">
        Add
        </button>
    </div>
    <div class="card shadow-sm p-2">
        <table class="table " id="dtHorizontalExample" cellspacing="0"width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nilai Selisih</th>
                    <th>Nilai Bobot</th>
                    <th>Keterangan Nilai Bobot</th>
                    <th>Aksi</th>
                </tr>
            </thead>
           <tbody>
            @foreach($bobot as $b)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->selisih}}</td>
                    <td>{{$b->nilai_pembobotan}}</td>
                    <td>{{$b->ket_nilai_pembobotan}}</td>
                    <td>
                         <button class="btn btn-warning btn-detail open_modal"   value="{{$b->id_pembobotan}}"><i class="bi bi-pencil-square"></i></button>
                         <a href="bobot-selisih/data/hapus/{{$b->id_pembobotan}}" onclick="return confirm('Yakin ingin menghapus data ini ?');" class="btn btn-danger"><i class="bi bi-trash2"></i></a>
                    </td>
                </tr>
            @endforeach
           </tbody>
        </table>


    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
        <button type="button" class="close closebtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="{{ route('bobot-selisih/tambah-data/proses') }}" id="form_modal" method="post">
             {{ csrf_field() }}
             <input type="hidden" class="form-control" name="id_pembobotan" id="id_pembobotan">
            <label for="">Nilai Selisih</label>
            <input type="text" class="form-control" name="selisih" id="selisih">
            <label for="">Nilai Pembobotan</label>
            <input type="text" class="form-control" name="nilai_pembobotan" id="nilai_pembobotan">
            <label for="">Keterangan Nilai Pembobotan</label>
            <input type="text" class="form-control" name="ket_nilai_pembobotan" id="ket_nilai_pembobotan">
            {{-- <button class="btn btn-success">Simpan</button> --}}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary closebtn" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>



<script type="text/javascript">
        $(document).ready(function () {
        $('#dtHorizontalExample').DataTable({
            "scrollX": true
        });
        $('.dataTables_length').addClass('bs-select');
        });
        $(document).ready(function() {
                $('#dtHorizontalExample').DataTable();
            } );
        $(document).on('click','.open_modal',function(){
        var url = "bobot-selisih/get-data";
        var id= $(this).val();
        $.get(url + '?id_pembobotan=' + id, function (data) {
            //success data
            // console.log(data);
            $('#exampleModalCenter').modal('show');
            $('#id_pembobotan').val(data[0].id_pembobotan);
            $('#selisih').val(data[0].selisih);
            $('#nilai_pembobotan').val(data[0].nilai_pembobotan);
            $('#ket_nilai_pembobotan').val(data[0].ket_nilai_pembobotan);
            $('#form_modal').attr('action', '{{ route('bobot-selisih/edit-data/proses') }}');
            $('#exampleModalLongTitle').html('Edit Data')
        }) 
    });
    $(document).on('click','.addButton', function(){
        $('#exampleModalLongTitle').html('Tambah Data')
    });
    $(document).on('click','.closebtn', function(){
        console.log('true')
        $('#form_modal')[0].reset();
    });
</script>



@endsection