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
                    <span></span> Ajout de Diapositions
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
                                        Ajout de nouvelles Diapositions
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slider')}}" class="btn btn-success float-end"> Toutes les Diapositions</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('Admin_message'))
                                    <div class="alert alert-success">{{Session::get('Admin_message') }} </div>
                                @endif
                                <form wire:submit.prevent="addSlide">
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Une Image" wire:model="image"/>
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl()}}" alt="" width="100">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="top_title" class="form-label">Premier Titre</label>
                                        <input type="text" name="top_title" class="form-control" placeholder="Le Premier Titre" wire:model="top_title"  />
                                        @error('top_title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="title" class="form-label">Titre</label>
                                        <input type="text" name="title" class="form-control" placeholder="Le Titre" wire:model="title"  />
                                        @error('title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="sub_title" class="form-label">Sous Titre</label>
                                        <input type="text" name="sub_title" class="form-control" placeholder="Le Sous Titre" wire:model="sub_title"  />
                                        @error('sub_title')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="offer" class="form-label">Offre</label>
                                        <input type="text" name="offer" class="form-control" placeholder="L'Offre" wire:model="offer"  />
                                        @error('offer')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="link" class="form-label">Lien</label>
                                        <input type="text" name="link" class="form-control" placeholder="Le Lien" wire:model="link"  />
                                        @error('link')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" id="" wire:model='status' class="form-select">
                                            <option value="0" active>Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        @error('status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Creer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
