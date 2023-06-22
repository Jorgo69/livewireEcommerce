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
                                Les Categories
                            </div>
                            <div class="card-body">
                                <table class="table-striped">
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
                                            $i = 1;
                                        @endphp
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{$i ++}}</td>
                                            <td>{{ $category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td></td>
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
