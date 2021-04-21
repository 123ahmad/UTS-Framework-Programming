@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Penerimaan Surat </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('surats.create') }}" title="Create a surat "> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat</th>
            <th>Pengirim</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($surats as $surat)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $surat->nomorsurat }}</td>
                <td>{{ $surat->tanggalsurat }}</td>
                <td>{{ $surat->pengirim }}</td>
                <td>{{ date_format($surat->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('surats.destroy', $surat->id) }}" method="POST">

                        <a href="{{ route('surats.show', $surat->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('surats.edit', $surat->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $surats->links() !!}

@endsection
