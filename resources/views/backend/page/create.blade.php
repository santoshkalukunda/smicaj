@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-sm-6">
            <h3 class="my-2"> {{ $title = 'Page Create' }} </h3>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        {{ $title }}
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <form action="{{ $page->id ? route('pages.update', $page) : route('pages.store') }}" method="post">
                            @csrf
                            @if ($page->id)
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid  @enderror"
                                    value="{{ old('title', $page->title) }}" id="exampleFormControlInput1"
                                    placeholder="Title">
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            @if ($page->id)
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Slug</label>
                                    <input type="text" name="slug"
                                        class="form-control @error('slug') is-invalid  @enderror"
                                        value="{{ old('slug', $page->slug) }}" id="exampleFormControlInput1"
                                        placeholder="Slug">
                                        @error('slug')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea id="summernote" name="content">{!! $page->content !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="{{ $page->id ? 'Update' : 'Save' }}">
                            </div>

                        </form>

                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Type here...',
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endpush
