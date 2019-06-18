@extends('master.layout')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Beg</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Admin</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('beg.index') }}">Beg</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Add</strong>
                </li>
            </ol>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('beg.index') }}"
                   class="btn btn-primary">
                    <i class="fa fa-plus-list"></i>
                    List Beg
                </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        <div class="ibox ">
            <div class="ibox-title">
                <h5>Add Beg<small>Create New  Beg</small></h5>
            </div>
            <div class="ibox-content">
                <form method="get">
                   <div class="form-group  row">
\t<label class="col-sm-2 col-form-label">Title</label>\n<div class="col-sm-10">
<inputname="title" id="title" class="form-control" type="text">\n</div>\n</div>\n<div class="hr-line-dashed"></div>
					<div class="form-group  row">
\t<label class="col-sm-2 col-form-label">Status</label>\n<div class="col-sm-10">
<inputname="status" id="status" class="form-control" type="radio">\n</div>\n</div>\n<div class="hr-line-dashed"></div>
					<div class="form-group  row">
\t<label class="col-sm-2 col-form-label">About You</label>\n<div class="col-sm-10">
<textareaname="about_you" id="about_you" class="form-control" value=""></textarea>\n</div>\n</div>\n<div class="hr-line-dashed"></div>

                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
