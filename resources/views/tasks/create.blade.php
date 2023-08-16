<x-layout page="Criar Tarefa">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf
            
            <x-form.text_input 
            name="title" 
            label="Titulo da Task" 
            placeholder="Digite o Título da Tarefa"
            required="true" 
            />            
           
            <x-form.text_input 
            type="datetime-local"
            name="due_date" 
            label="Data de Realização"
            required="true" 
            />   

            <x-form.select_input 
            name="category_id" 
            label="Categoria" 
            required=true
            >
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
                
            </x-form.select_input>  

            <x-form.textarea_input 
            name="description"
            label="Descrição"
            placeholder="Digite uma descrição para a sua task"
            ></x-form.textarea_input>
            
            <x-form.form_button
            resetTxt="Resetar"
            submitTxt="Criar Tarefa"
            />

        </form>
    </section>
    
</x-layout>