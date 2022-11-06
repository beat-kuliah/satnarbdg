@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        
    </div>
    <div class="col-md-4">
        <h3 class="text-center">Anggota</h3>
    </div>
</div>
<div class="container" style="margin-top: 20px">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">NRP</th>
                <th scope="col">Nama</th>
                <th scope="col">Pangkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyidik as $sidik)
            <tr>
                <th scope="row">{{ $sidik->nrp }}</th>
                <td>{{ $sidik->name }}</td>
                <td>{{ $sidik->pangkat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection