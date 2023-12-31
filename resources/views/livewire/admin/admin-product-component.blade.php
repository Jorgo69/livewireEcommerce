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
                    <span></span> Les Produits
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
                                        Les Produits
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.products.add')}}" class="btn btn-success float-end"> Ajout de nouveaux Produits </a>
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
                                            <th>Image</th>
                                            <th>Stock</th>
                                            <th>Prix</th>
                                            <th>Categorie</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // $i = 1;
                                            $i = ($products->currentPage() -1) * ($products->perPage());
                                        @endphp
                                        @forelse ($products as $product)
                                        <tr>
                                            <td>{{++ $i}}</td>
                                            <td>{{ $product->name}}</td>
                                            <td><img src="{{ asset('assets/imgs/products')}}/{{$product->image}}" width="60" alt="{{ $product->name}}"></td>
                                            {{-- <td><img src="{{ asset('assets/imgs/shop/product-') }}{{$product-> id}}-1.jpg" width="60" alt="{{ $product->name}}"></td> --}}
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a type="button" href="{{ route('admin.product.edit', ['product_id'=>$product->id])}}" class="text-info">Modifier</a>
                                                <a href="#" onclick="deleteConfirmation({{$product->id}})" class="text-danger mx-2">Supprimer</a>
                                            </td>
                                        </tr>
                                        @empty
                                            Aucun Produits
                                        @endforelse
                                    </tbody>
                                </table>
                                {{$products->links()}}
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
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Supprimer</button>
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
            @this.set('product_id', id);
            $('#deleteConfirmation').modal('show');
        }
        function deleteProduct()
        {
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush