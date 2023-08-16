<div class="inputArea">
    <label for="{{ $name }}">
        {{ $label ?? '' }}
    </label>
    
    <select 
    id="{{ $name }}" name="{{ $name }}" 
    {{ empty($required) ? '' : 'required' }}
    >
        <option value="" selected disabled>Selecione uma Opção</option>
        {{ $slot }}
    </select>
</div>
