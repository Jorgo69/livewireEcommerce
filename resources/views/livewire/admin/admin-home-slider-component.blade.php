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
                    <span></span> Les Diapositions
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
                                        Les Diapositions
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slide.add')}}" class="btn btn-success float-end"> Ajout de nouveau diapo </a>
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
                                            <th>Image</th>
                                            <th>Premier Titre</th>
                                            <th>Titre</th>
                                            <th>Sous Titre</th>
                                            <th>Offre</th>
                                            <th>Lien</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                            // $i = ($slides->currentPage() -1) * ($slides->perPage());
                                        @endphp
                                        @forelse ($slides as $slide)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td><img src="{{asset('assets/imgs/slider')}}/{{ $slide->image}}" width="80" alt="{{$slide->title}}"></td>
                                            <td>{{$slide->top_title}}</td>
                                            <td>{{$slide->title}}</td>
                                            <td>{{$slide->sub_title}}</td>
                                            <td>{{$slide->offer}}</td>
                                            <td>{{$slide->link}}</td>
                                            <td>{{$slide->status === 1 ? 'Active' : 'Inactive'}}</td>
                                            <td>
                                                <a type="button" href="{{ route('admin.home.slide.edit', ['slide_id'=>$slide->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation({{$slide->id}})" class="text-danger mx-2">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucune Categories
                                        @endforelse
                                    </tbody>
                                </table>
                                
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
                        <button type="button" class="btn btn-danger" onclick="deleteSider()">Supprimer</button>
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
            // Ici capte le id qui etait affiche par le JS
            @this.set('slide_id', id);
            $('#deleteConfirmation').modal('show');
        }
        // Ici c'est juste la fonction JS
        function deleteSider()
        {
            // Ici fait appel a la fonction livewire 
            @this.call('deleteSider');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush