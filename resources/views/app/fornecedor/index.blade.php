<h3>Fornecedor</h3>

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}   
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }} 
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if($loop->first)
            Primeira iteração do Loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
        @if($loop->last)
            Ultima iteração do Loop
            
        @endif
        <hr>   
    @empty    
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset


