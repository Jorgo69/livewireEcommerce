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
                    <span></span> Ajout de Produits
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
                                        Ajout de nouveau Produits
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products')}}" class="btn btn-success float-end"> Toutes les Produits</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('Admin_message'))
                                    <div class="alert alert-success">{{Session::get('Admin_message') }} </div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="mb-3 mt-3">
                                        <label for="name" class="form-label">Nom du Produits</label>
                                        <input type="text" name="name" class="form-control" placeholder="Le nom" wire:model="name" wire:keyup='genrateSlug' />
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
                                        <label for="short_description" class="form-label">Courte Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="Petite Description du produits" id="" cols="30" rows="10" wire:model='short_description'></textarea>
                                        @error('short_description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="description" class="form-label"> Description</label>
                                        <textarea name="description" class="form-control" placeholder="Description du produits" id="" cols="30" rows="10" wire:model='description'></textarea>
                                        @error('description')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="regular_price" class="form-label">Prix Normal</label>
                                        <input type="text" name="regular_price" class="form-control" placeholder="Le prix de vente" wire:model="regular_price" />
                                        @error('regular_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sale_price" class="form-label">Prix habituel</label>
                                        <input type="text" name="sale_price" class="form-control" placeholder="Le prix de promotion" wire:model="sale_price" />
                                        @error('sale_price')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="sku" class="form-label">Unite de Stockage</label>
                                        <input type="text" name="sku" class="form-control" placeholder="Le Stock Keeping Unit" wire:model="sku" />
                                        @error('sku')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="stock_status" class="form-label">Statut de Stockage</label>
                                        <select class="form-control" name="stock_status" id="" wire:model='stock_status'>
                                            <option value="instock">En stock</option>
                                            <option value="outofstock">Rupture de stock</option>
                                        </select>
                                        @error('stock_status')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="featured" class="form-label">Produits mis en avant?</label>
                                        <select class="form-control" name="featured" id="" wire:model='featured'>
                                            <option value="0">Non</option>
                                            <option value="1">Oui</option>
                                        </select>
                                        @error('featured')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="quantity" class="form-label">Quantite</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="La quantite de produits" wire:model="quantity" />
                                        @error('quantity')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" name="image" class="form-control" wire:model="newImage"/>
                                        @if ($newImage)
                                            <img src="{{$newImage->temporaryUrl()}}" width="120"/>
                                        @else
                                        <img src="{{asset('assets/imgs/products')}}/{{$image}}" width="120" />
                                        @endif
                                        @error('newImage')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mt-3">
                                        <label for="category_id" class="form-label">Categorie</label>
                                        <select class="form-control" name="category_id" id="" wire:model="category_id">
                                            <option value="">Choisissez la categorie</option>
                                            @forelse ($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                            @empty
                                                <option value="">Aucune Categories ajouter</option>
                                                <option value=""> <a href="{{ route('admin.category.add')}}">Ajoutez en une</a>  </option>
                                            @endforelse
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary float-end">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
