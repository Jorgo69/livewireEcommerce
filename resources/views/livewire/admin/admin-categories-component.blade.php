<div>
    <style>
            nav svg{
        height: 30px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home.index')}}" rel="nofollow">Accueil</a>
                    <span></span> Les Categories
                    {{-- <span></span> Your Cart --}}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        Les Categories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.category.add')}}" class="btn btn-success float-end"> Ajout de nouvelles Caegories </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('Admin_message'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ Session::get('Admin_message')}}
                                    </div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // $i = 1;
                                            $i = ($categories->currentPage() -1) * ($categories->perPage());
                                        @endphp
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td>{{ $category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a type="button" href="{{ route('admin.category.edit', ['category_id'=>$category->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation({{$category->id}})" class="text-danger">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucune Categories
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$categories->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Voudrez vous vraiment y continuer?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Annuler </button>
                        <button type="button" class="btn btn-danger float-end" onclick="deleteCategory()">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('category_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteCategory()
        {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush