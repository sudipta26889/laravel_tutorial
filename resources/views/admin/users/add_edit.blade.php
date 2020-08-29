@extends('layouts.admin-app')

@section('content')
<div class="content-wrapper">
<section class="content-header">
<h1><?=Request::segment(3) == 'add' ? 'Add' : 'Edit'?> User <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="<?=route('admin.dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="<?=route('admin.users.list')?>"><i class="fa fa-sitemap"></i> User</a></li>
<li class="active"><?=Request::segment(3) == 'add' ? 'Add' : 'Edit'?></li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"><?=Request::segment(3) == 'add' ? 'Add' : 'Edit'?> Customer</h3>
<p class="pull-right">
<a href="<?=route('admin.users.list')?>" class="btn btn-primary btn-xs"><i class="fa fa-reply"></i> Back</a>
</p>
</div>
</div>
</div>
<form name="category-add-edit" id="category-add-edit" method="post" action="" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="col-xs-8">
<div class="box box-solid">
<div class="box-header with-border">
<i class="fa fa-text-width"></i>
<h3 class="box-title">Information</h3>
</div>
<div class="box-body">
<div class="form-group<?=$errors->has('name') ? ' has-error' : ''?>">
<label for="name">Name</label>
<input type="text" class="form-control" id="name" name="name" autocomplete="off" data-validation-length="5-191" value="<?=$edit==FALSE ? old('name') : $product->name?>" placeholder="Name" data-validation="required" />
@if($errors->has('name'))
<span class="help-block">
<strong>{{ $errors->first('name') }}</strong>
</span>
@endif
</div>
<div class="form-group<?=$errors->has('email') ? ' has-error' : ''?>">
<label for="email">Email</label>
<input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?=$edit==FALSE ? old('email') : $product->email?>" placeholder="Email" data-validation="email" />
@if($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
<div class="form-group<?=$errors->has('password') ? ' has-error' : ''?>">
<label for="password">Password</label>
<input type="password" class="form-control" id="password" name="password" autocomplete="off" value="<?=$edit==FALSE ? old('password') : ''?>" placeholder="Password" <?=Request::segment(3) == 'add' ?'data-validation="required"' : '' ?> />
@if($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>

</div>
</div>

</div>
<div class="col-xs-4">

<div class="box box-solid">
<div class="box-header with-border">
<i class="fa fa-eye"></i>
<h3 class="box-title">Visibility</h3>
</div>
<div class="box-body">
<div class="form-group<?=$errors->has('status') ? ' has-error' : ''?>">
<label for="status">Status</label>
<select class="form-control" id="status" name="status" data-validation="required">
<option value="">Select Visibility</option>
<option value="0"<?=$edit==TRUE && $product->status == '0' ? ' selected=""' : old('status')=='0' ? ' selected=""' : ''?>>Disable</option>
<option value="1"<?=$edit==TRUE && $product->status == '1' ? ' selected=""' : old('status')=='1' ? ' selected=""' : ''?>>Enable</option>
</select>
@if($errors->has('status'))
<span class="help-block">
<strong>{{ $errors->first('status') }}</strong>
</span>
@endif
</div>
</div>
</div>

<div class="box box-solid">
<div class="box-header with-border">
<i class="fa fa-save"></i>
<h3 class="box-title">Save & Publish</h3>
</div>
<div class="box-body">
<div class="form-group">
<a href="" class="btn btn-danger">Cancel</a>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</div>
</div>
</form>
</div>
</section>
</div>
<script type="text/javascript" src="{{ url('public/admin/js/pekeUpload.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
<script>
$(document).ready(function() {
    $('select').select2();
});
</script>
<style>ul.wysihtml5-toolbar li:last-child{display:none;}.select2-container .select2-selection--single {height:34px;}.select2-container {width:100% !important;}</style>
@endsection