@extends('layouts.main')

@section('content')
	@include('errors.errors_message')
	<div class="row">
		<div class="col-md-6">
			<form action="{{ route('product.update', $product->id) }}" method="POST">
				{{ method_field('PUT') }}
				@csrf
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						<option value="">--Please Select--</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : null }}>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" value="{{ $product->name }}" placeholder="Enter category name">
				</div>
				<div class="form-group">
					<label>Stock</label>
					<input type="number" class="form-control" name="stock" value="{{ $product->stock }}" placeholder="eg: 10">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="description">{{ $product->description }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection
