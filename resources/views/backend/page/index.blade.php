@extends('backend.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="row py-2">
        <div class="col-sm-6">
            <h3> {{ $title = 'Pages' }} </h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('pages.create')}}">Add New</a></li>
            </ol>
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
                        <table class="table table-md">
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th></th>
                            </tr>
                            @forelse ($pages as $page)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->slug}}</td>
                                <td>
                                    <div class="">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li><a class="dropdown-item text-center btn"
                                                    href="{{ route('pages.edit', $page) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{ route('pages.destroy', $page) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-center btn form-control" type="submit"
                                                        onclick="return confirm('Are you sure to delete?')">
                                                        Delete
                                                    </button>
                                                </form>
                                            </li>
            
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                
                            @empty
                            <tr>
                                <td>
                                    <div class="text-danger"><i>!! No, Recored Found !!</i></div>
                                </td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.Left col -->
    </div>
@endsection
