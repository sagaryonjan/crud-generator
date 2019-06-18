@extends('master.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Big</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('big.index') }}">Big</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('big.create') }}"
                   class="btn btn-primary">
                    <i class="fa fa-plus-circle" ></i>
                    Add Big
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Lists Of Big</h5>
            </div>
            <div class="ibox-content">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
						<th>Status</th>
						<th>About You</th>
						<th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse ($bigs as $big)
                        <tr>
                            <td>{{ $big->title }}</td>
						<td>{{ $big->status }}</td>
						<td>{{ $big->about_you }}</td>
                            <td> Action </td>
                        </tr>
                    @empty
                        <p>No list available of  Big.</p>
                    @endforelse

                    </tbody>
                </table>
                {{ $bigs->links() }}
            </div>
        </div>
    </div>
@endsection