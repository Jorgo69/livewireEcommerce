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
                    <span></span> Ajout de Categories
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
                                        Ajout de nouvelles Caegories
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.categories')}}" class="btn btn-success float-end"> Toutes les Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('Admin_message'))
                                    <div class="alert alert-success">{{Session::get('Admin_message') }} </div>
                                @endif
                                <form wire:submit.prevent="storeCategory">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nom de la Categorie</label>
                                        <input type="text" name="name" class="form-control" placeholder="Le nom" wire:model="name" wire:keyup='generateSlug' />
                                        @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="slug" class="form-label">Le Slug</label>
                                        <input type="text" name="slug" class="form-control" placeholder="Le slug" wire:model="slug" disabled />
                                        @error('slug')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Une image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Le image" wire:model="image" />
                                        @if ($image)
                                            <img src="{{$image->temporaryUrl()}}" alt="" width="120">
                                        @endif
                                        @error('image')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="is_popular" class="form-label">Populaire ?</label>
                                        <select class="form-control" name="is_popular" id="" wire:model='is_popular'>
                                            <option value="0" selected> Non </option>
                                            <option value="1"> Oui </option>
                                        </select>
                                        
                                        @error('is_popular')
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
