{{ $slot }}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" valeu="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" valeu="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email"  valeu="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
   
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato )
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>            
        @endforeach
    </select>
    <br>
    
    <textarea name="mensagem" class="{{ $classe }}">
    @if (old('mensagem') != '')
        value="{{ old('mensagem') }}"
    @else
        Preencha aqui a sua mensagem      
    @endif
        
    </textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>