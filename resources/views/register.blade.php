<x-layout page="B7Web Todo - Register">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Registrar-se</h1>

        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li> {{$error}} </li>                    
                @endforeach
            </ul>            
        @endif

        <form method="POST" action="{{route('user.register_action')}}">
            @csrf
            
            <x-form.text_input 
            name="name" 
            label="Seu nome" 
            placeholder="Seu nome"
            required=true
            />            
           
            <x-form.text_input 
            type="email"
            name="email" 
            label="Seu email"
            placeholder="Seu email"
            required=true
            />   

            <x-form.text_input 
            type="password"
            name="password" 
            label="Sua senha"
            placeholder="Sua senha"
            required=true 
            />     
            
            <x-form.text_input 
            type="password"
            name="password_confirmation" 
            label="Confirme sua Senha"
            placeholder="Confirme sua Senha"
            required=true 
            />  
            
            <x-form.form_button
            resetTxt="Limpar"
            submitTxt="Registrar-se"
            />

        </form>
    </section>
    
</x-layout>