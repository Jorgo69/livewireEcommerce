<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Accueil</a>                    
                    <span></span> Contactez Nous
                </div>
            </div>
        </div>                
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 m-auto">
                        <div class="contact-from-area padding-20-row-col wow FadeInUp">
                            <h3 class="mb-10 text-center">Écrivez-nous</h3>
                            <p class="text-muted mb-30 text-center font-sm">
                               @if (session('sendMessage'))
                                   <div class="alert alert-success">
                                    {{session('sendMessage')}}
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                   </div>
                               @endif
                            </p>
                            <form class="contact-form-style text-center" id="contact-form" action="{{ route('contact.send')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="name" placeholder="Nom complet **" type="text">
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="email" placeholder="Votre Email **" type="email">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="telephone" placeholder="Numero de telephone" type="tel">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="input-style mb-20">
                                            <input name="subject" placeholder="Sujet **" type="text">
                                            @error('subject')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        
                                        <div class="textarea-style mb-30">
                                            <textarea name="message" placeholder="Message **"></textarea>
                                            @error('message')
                                                <p class="text-danger close" type="button" data-dismiss="alert">{{$message}}</p>
                                            @enderror
                                        </div>                                        
                                        <button class="submit submit-auto-width" type="submit">Envoyez</button>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>