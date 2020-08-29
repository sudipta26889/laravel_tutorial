@extends('layouts.admin-app')

@section('content')
<div class="content-wrapper">
<section class="content-header">
<h1>Customer <small>Control panel</small></h1>
<ol class="breadcrumb">
<li><a href="<?=route('admin.dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Customer</li>
</ol>
</section>
<section class="content">
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Customer List</h3>
<div class="pull-right">
<a href="<?=route('admin.users.add')?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Add Customer</a>
</div>
</div>
<div class="box-body">
@if(session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
{{ session('error') }}
</div>
@endif
<table id="example2" class="table table-bordered table-hover">
<thead>
<tr>
<th>Name</th>
<th>Email Address</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
if(count($products) > 0){
foreach($products as $product){
?>
<tr>
<td><?=$product->name?></td>
<td><?=$product->email?></td>
<td><?=$product->status=='0' ? '<label class="label label-danger">Disabled</label>' : '<label class="label label-success">Enabled</label>'?></td>
<td>
<a href="<?=route('admin.users.edit',$product->id)?>" class="btn btn-primary" title="Edit"><i class="fa fa-pencil"></i></a>
<a href="<?=route('admin.users.delete',$product->id)?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php } } else { ?>
<tr>
<td colspan="4">No Users Found!</td>
</tr>
<?php } ?>
</tbody>
</table>
<div class="pull-right">
<?=$products->links()?>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
@endsection