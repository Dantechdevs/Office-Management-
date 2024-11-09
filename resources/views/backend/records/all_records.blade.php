@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.records') }}" class="btn btn-info">All Records</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">TinyMCE</h4>
                    <p class="text-muted mb-3">Read the <a href="https://www.tiny.cloud/docs/" target="_blank"> Official TinyMCE Documentation </a> for a full list of instructions and other options.</p>
                    <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">EasyMDE</h4>
                    <p class="text-muted mb-3">Read the <a href="https://easy-markdown-editor.tk/" target="_blank"> Official EasyMDE Documentation </a> for a full list of instructions and other options.</p>
                    <textarea class="form-control" name="easyMDE" id="easyMdeExample" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ace Editor</h4>
                    <p class="text-muted mb-3">Read the <a href="https://ace.c9.io/" target="_blank"> Official Ace Editor Documentation </a> for a full list of instructions and other options.</p>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <h5 class="card-subtitle mb-2">HTML Mode</h5>
                            <textarea id="ace_html" class="ace-editor w-100"></textarea>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <h5 class="card-subtitle mb-2">SCSS Mode</h5>
                            <textarea id="ace_scss" class="ace-editor w-100"></textarea>
                        </div>
                        <div class="col-md-12">
                            <h5 class="card-subtitle mb-2">Javascript Mode</h5>
                            <textarea id="ace_javaScript" class="ace-editor w-100"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
