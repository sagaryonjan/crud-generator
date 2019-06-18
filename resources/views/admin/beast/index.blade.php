@extends('master.layout')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beast</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('beast.index') }}">Beast</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>List</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('beast.create') }}"
                   class="btn btn-primary">
                    <i class="fa fa-plus-circle" ></i>
                    Add Beast
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Lists Of Beast</h5>
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

                    @forelse ($beasts as $beast)
                        <tr>
                            <td>{{ $beast->title }}</td>
						<td>{{ $beast->status }}</td>
						<td>{{ $beast->about_you }}</td>
                            <td> Action </td>
                        </tr>
                    @empty
                        <p>No list available of  Beast.</p>
                    @endforelse

                    </tbody>
                </table>
                {{ $beasts->links() }}
            </div>
        </div>
    </div>
@endsection