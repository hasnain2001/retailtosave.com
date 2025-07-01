@extends('admin.layouts.datatable')
@section('title', 'slider List')
@section('content')
<div class="row text-capitalize">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"> slider data Table</h4>
                <p class="text-muted font-13 mb-4">
                    The slider data table displays a list of all sliders in the system. You can view, edit, and delete sliders from this table.
                    <br> You can also add new sliders by clicking the "Add slider" button.
                </p>

                <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3">Add slider</a>
                {{-- <a href="{{ route('admin.store.export') }}" class="btn btn-success mb-3">Export stores</a> --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <strong>Success!</strong> {{ session('success') }}

                </div>
            @endif
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>sub title</th>
                            <th>image</th>
                            <th>status</th>
                            <th>link</th>
                            <th>sort</th>
                            <th>lang</th>
                            <th>Action</th>

                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->subtitle }}</td>
                            <td>
                                @if ($slider->image)
                                  <img src="{{ asset('uploads/slider/' . $slider->image) }}"
                                    class="rounded me-2"
                                    alt="{{ $slider->title }}"
                                    width="40">
                                @else
                                <span class="text-muted"> no image</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $slider->status == '1' ? 'success' : 'danger' }}-subtle text-{{ $slider->status == '1' ? 'success' : 'danger' }}">
                                    {{ $slider->status == '1' ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <span>{{$slider->link}}</span>
                            </td>
                                 <td>
                                <span>{{$slider->sort_order}}</span>
                            </td>

                            <td>
                                <span class="badge bg-info-subtle text-info">{{ $slider->language->name }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick=" return confirm('are you sure to delete  this ') " class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection
