@extends('layouts.app')

@section('head')
<link href="{{ asset('css/style.css') }}" rel="stylesheet"> 
@endsection
@section('content')
@php
    $result_final = '';
@endphp
<div class="container-fluid bg-white bg-opacity-50 py-0" style="min-height: 95vh">
    <div class="p-2" id="main" style="display: block">
        {{-- <form action="{{ route('hitung/tambah-data/proses') }}" method="post"> --}}
        <form id="myForm" action="javascript:void(0)" method="post">
            {{ csrf_field() }}
        <div class="d-flex justify-content-end ">
            {{-- <a href="{{route('menu')}}" class="btn btn-outline-dark mx-1">Back</a> --}}
            <button class="btn btn-dark" id="btn_sub" type="submit">Hasil</button>
        </div>
            <div class="row p-2">
                 @php
                    $sum = 0;
                @endphp
                {{-- <div class="col-md-12 p-2"> --}}
                    @foreach($kriteria as $key=>$k)
                        {{-- @foreach($k->sub as $s) --}}
                            <div class=" p-2 col-md-3 " >
                               <div >
                                 <label for="" class="fw-bold rounded bg-kuning p-2 ">{{$k->nama_kriteria}} Durian</label>
                               </div>
                                @forEach($k->value as $v)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="{{$v->value}}" name="kode_data[{{$k->kode_kriteria}}]" id="kode_data_{{$k->kode_kriteria}}" 
                                        @if ($v->value == 1) checked="true" @endif>
                                        <label class="form-check-label fw-bold text-dark" for="kode_data_{{$k->kode_kriteria}}">
                                            {{$v->keterangan_value}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        {{-- @endforeach --}}
                        @php
                            $sum = $loop->iteration;
                        @endphp
                    @endforeach
                {{-- </div>   --}}
                 @php
                    $col = (4-($sum%4))*3;
                @endphp
                <div class="col-md-{{$col}} ">
                    <div class="card shadow-sm p-1 text-center fw-bold fs-4 bg-kuning mb-1">HASIL VARIETAS</div>
                    <div style="display: none" id="load" class="loading m-auto">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="card shadow p-2 " id="res" style="display: none">
                        <table class="table " id="dtHorizontalExample " cellspacing="0" width="100%">
                        <thead>
                        </thead>
                        <tbody id="hasil">
                            
                        </tbody>
                        </table>
                    </div> 
                </div>
            </div>  
        </form>     
        
 </div>

 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content bg-opacity-50">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Durian</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-3">
                <img src="" class="w-100 img-responsive img-thumbnail" id="preview" alt="">
            </div>
            <div class="col-md-8">
                <h4 id="title"></h4>
                <div class="" id="keterangan"></div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>




<script type="text/javascript">
$('#btn_back').on('click',function(event){
    $('#res').css("display", "none");
    $('#main').css("display", "block");
});

$('#btn_sub').on('click',function(event){
        $('#load').css("display", "block");
        $('#res').css("display", "none");
          var form=$('#myForm')[0];
            var data=new FormData(form);
            //  console.log(data)
            $.ajax({
            type:'POST',
            url:'{{ route('hitung/tambah-data/proses') }}',
            data:data,
            // dataType:'json',
            cache:false,
              contentType:false,
              processData:false,
            success:function(data){
                $('#myForm')[0].reset();
                // window.location.replace('/result')
                $('#res').css("display", "block");
                $('#load').css("display", "none");
                // $('#main').css("display", "none");
                //  $('.hasil').html(data);
                createRes(data);
              console.log(data);
            },
            error:function(error){
                $('#res').css("display", "block");
                $('#load').css("display", "none");
                // $('#main').css("display", "none");
            $('.hasil').html('Tidak Ada Hasil');
            console.log(error);
            }
          });
        //   }
      }
);

$(document).on('click','.modal_open',function(){
        var url = "hitung/get-data";
        var id= $(this).attr('value');
        // console.log(id);
        $.get(url + '?id_data_uji=' + id, function (data) {
            $('#title').html('');
            $('#keterangan').html('');
            $('#preview').attr('src','');
            //success data
            // console.log(data);
            $('#exampleModal').modal('show');
            $('#title').html(data[0].data_uji.nama_data_uji);
            $('#keterangan').html(data[0].ket_data_uji);
            var link ="{{ URL::asset('public/Image') }}/"+data[0].img;
            $('#preview').attr('src',link);
        }) 
    });


function createRes(data){
     var fieldHtml='';
        var wrapper_hasil=$('#hasil');

        if(Array.isArray(data) && data.length){
            console.log('true');
            for (item in data) {
        
            fieldHtml+='<tr>';
            fieldHtml+='<td><a href="#"  type="button" class="modal_open" value="'+data[item].id_data_uji+'">'+data[item].data_uji.nama_data_uji+'</a></td>';
            fieldHtml+='</tr>';
            }
        }else{
            console.log(false);
            fieldHtml+='<tr>';
            fieldHtml+='<td>Tidak Ada Hasil Yang Sesuai</td>';
            fieldHtml+='</tr>';
        }
        $(wrapper_hasil).html(fieldHtml);
}



       
</script>



@endsection


