@extends('layouts.app')
<div id="cover"></div>
@include('layouts.navbar')
@include('form')

@section('home-content')
    
    <div class="container container-style">
        <div class="datadata" id="datadata">
            <a href="javascript:void(0)" class="btn btn-info" id="form1"{{-- onclick="addForm()" --}}><i class="fas fa-pencil-alt mr-2"></i>Tambah</a>
            <a href="javascript:void(0)" class="btn btn-primary" id="form2" {{-- onclick="addForm2()"--}}><i class="fas fa-calculator mr-2"></i>Hitung</a>
            <a href="javascript:void(0)"  id="laporan" class="btn btn-success"><i class="fas fa-calendar-alt mr-2"></i>Laporan</a>
            <form action="{{ route('exportpdfs') }}" id="forminline" class="form-inline" method="GET" target="_blank">
                <a href="javascript:void(0)"  id="tutuplaporan" class="btn btn-danger"><i class="fas fa-times mr-2"></i>Tutup</a>
                <div class="input-group ml-2" id="inputgroup">
                    <input type="date" name="laporanpdf"
                                id="textlaporan"
                                title="Cetak Laporan Harian"
                                class="form-control">
                    <button type="submit" id="btnpdf" title="Cetak Berkas" class="btn">
                        <i class="far fa-file-pdf" id="pdfpend"></i>
                    </button>
                    @if($errors->has('laporanpdf'))
                        <div class="pdfvalidate">
                            <span> {{ $errors->first('laporanpdf') }}  </span>
                        </div>
                    @endif
                </div>
            </form>
        </div>
        <hr>
        <div class="table-responsive-sm">
            <table id="postest-table" class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Roti</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
        <div class="kasir">
            
        </div>

    </div> {{-- end of container --}}

@endsection {{-- end of section home content --}}